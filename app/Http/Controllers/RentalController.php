<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rental;
use App\Models\ActivationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class RentalController extends Controller
{

    public function rentComputer(Request $request, Product $product)
    {
        // Mulai log transaksi
        Log::channel('rentals')->info('Memulai proses penyewaan', [
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'request_data' => $request->all()
        ]);

        $request->validate([
            'booked_start' => 'required|date',
            'booked_end' => 'required|date|after:booked_start',
        ]);

        // Pastikan komputer tersedia
        if ($product->status !== 'available') {
            Log::channel('rentals')->warning('Komputer tidak tersedia', [
                'product_status' => $product->status
            ]);
            return back()->with('error', 'Komputer tidak tersedia untuk disewa');
        }

        $user = Auth::user();
        $bookedStart = Carbon::parse($request->booked_start);
        $bookedEnd = Carbon::parse($request->booked_end);
        
        // Hitung durasi dalam jam
        $duration = $bookedStart->diffInHours($bookedEnd);
        $totalPrice = $duration * $product->price;

        // Validasi penabrakan jadwal
        $conflict = Rental::where('product_id', $product->id)
            ->where(function ($query) use ($bookedStart, $bookedEnd) {
                $query->whereBetween('booked_start', [$bookedStart, $bookedEnd])
                      ->orWhereBetween('booked_end', [$bookedStart, $bookedEnd])
                      ->orWhere(function ($q) use ($bookedStart, $bookedEnd) {
                          $q->where('booked_start', '<', $bookedStart)
                            ->where('booked_end', '>', $bookedEnd);
                      });
            })
            ->whereIn('status', ['pending', 'active'])
            ->exists();
        
        if ($conflict) {
            Log::channel('rentals')->warning('Konflik jadwal penyewaan', [
                'booked_start' => $bookedStart,
                'booked_end' => $bookedEnd
            ]);
            return back()->with('error', 'Komputer sudah dipesan pada waktu tersebut');
        }

        // Pastikan user memiliki cukup token
        if ($user->token < $totalPrice) {
            Log::channel('rentals')->warning('Token tidak cukup', [
                'user_token' => $user->token,
                'required_token' => $totalPrice
            ]);
            return back()->with('error', 'Token tidak cukup');
        }

        // Mulai transaction untuk atomic operation
        DB::beginTransaction();

        try {
            // Generate kode aktivasi unik 6 digit
            $activationCode = $this->generateUniqueActivationCode();
            
            // Buat rental
            $rental = Rental::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'booked_start' => $bookedStart,
                'booked_end' => $bookedEnd,
                'duration' => $duration,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'activation_code' => $activationCode,
            ]);

            Log::channel('rentals')->info('Rental berhasil dibuat', [
                'rental_id' => $rental->id,
                'activation_code' => $activationCode
            ]);

            // Update status komputer
            $product->update(['status' => 'prepare']);
            Log::channel('rentals')->info('Status produk diupdate', [
                'product_status' => 'prepare'
            ]);


            $user->decrement('token', $totalPrice);

            // Log token setelah dikurangi. 
            // Kita perlu mengambil ulang data user untuk mendapatkan nilai token terbaru.
            $user->refresh();
            Log::channel('rentals')->info('Token user dikurangi', [
                'new_token_balance' => $user->token
            ]);

            DB::commit();

            Log::channel('rentals')->info('Penyewaan berhasil diproses');
            return redirect()->route('user.rental.confirmation', $rental->id)
                ->with('success', 'Penyewaan berhasil! Silakan gunakan kode aktivasi di warnet');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // Log error detail
            Log::channel('rentals')->error('Gagal memproses penyewaan', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ]);
            
            return back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi admin.');
        }
    }
    
    private function generateUniqueActivationCode()
    {
        do {
            // Generate kode 6 digit alfanumerik
            $code = Str::upper(Str::random(6));
        } while (Rental::where('activation_code', $code)->exists());
        
        return $code;
    }
    
    public function showConfirmation(Rental $rental)
    {
        // Pastikan rental milik user yang login
        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('pages.rental_confirmation', compact('rental'));
    }
    
    public function activateComputer(Request $request)
    {
        $request->validate([
            'activation_code' => 'required|string|size:6',
        ]);
        
        // Cari rental berdasarkan kode aktivasi
        $rental = Rental::where('activation_code', $request->activation_code)
                        ->where('status', 'pending') // Lebih baik cek status rental utama
                        ->first();
        
        if (!$rental) {
            return back()->with('error', 'Kode aktivasi tidak valid atau sudah digunakan');
        }
        
        // Pastikan waktu sewa sudah dimulai
        if (Carbon::now()->lt($rental->booked_start)) {
            return back()->with('error', 'Belum waktunya untuk aktivasi');
        }
        
        // Pastikan waktu sewa belum berakhir
        if (Carbon::now()->gt($rental->booked_end)) {
            $rental->update(['status' => 'expired']);
            return back()->with('error', 'Waktu sewa sudah berakhir');
        }
        
        // Update status rental
        $rental->update([
            'activated_at' => Carbon::now(),
            'status' => 'active'
        ]);
        
        // Update status komputer
        $rental->product->update(['status' => 'online']);
        
        // Catat log aktivasi
        ActivationLog::create([
            'rental_id' => $rental->id,
            'product_id' => $rental->product_id,
            'user_id' => $rental->user_id,
            'activated_at' => Carbon::now(),
            'ip_address' => $request->ip(),
            'device_info' => $request->header('User-Agent')
        ]);
        
        return redirect()->route('activation.success')
            ->with('success', 'Komputer berhasil diaktifkan! Selamat menggunakan.')
            ->with('computer', $rental->product);
    }
    
    public function activationSuccess()
    {
        if (!session('success')) {
            return redirect('/');
        }
        
        return view('pages.activation_success');
    }
}
