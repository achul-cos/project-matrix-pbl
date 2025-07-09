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
use App\Events\RentalStatusChanged;

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

        // Validasi dengan buffer waktu
        $bufferStart = Carbon::parse($request->booked_start)->subHour();
        $bufferEnd = Carbon::parse($request->booked_end)->addHour();
        
        // Hitung durasi dalam jam
        $duration = $bookedStart->diffInHours($bookedEnd);
        $totalPrice = $duration * $product->price;

        // Validasi penabrakan jadwal
        $conflict = Rental::where('product_id', $product->id)
            ->where(function ($query) use ($bufferStart, $bufferEnd, $bookedStart, $bookedEnd) {
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

            $product->increment('rent');
            Log::channel('rentals')->info('Jumlah penyewaan produk diperbarui', [
                'product_id' => $product->id,
                'new_rent_count' => $product->rent
            ]);

            // Update status komputer
            // $product->update(['status' => 'prepare']);
            // Log::channel('rentals')->info('Status produk diupdate', [
            //     'product_status' => 'prepare'
            // ]);

            // Trigger event
            event(new RentalStatusChanged($product->id));

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

public function rentalHistory(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    
    $rentals = Rental::where('user_id', $user->id)
        ->with('product')
        ->when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('activation_code', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%')
                  ->orWhereHas('product', function ($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('code', 'like', '%' . $search . '%');
                  });
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(5)
        ->appends(['search' => $search]);

    return view('pages.history_rent', compact('rentals'));
}

public function rentReport()
{
    // Ambil semua data rental tanpa filter status
    $rentals = Rental::with('product')->orderBy('booked_start', 'desc')->get();

    // Hitung jumlah rental per hari
    $rentCounts = [];
    foreach ($rentals as $rental) {
        $tanggalKey = $rental->booked_start->format('Y-m-d');
        $rentCounts[$tanggalKey] = ($rentCounts[$tanggalKey] ?? 0) + 1;
    }

    // Urutkan berdasarkan tanggal
    ksort($rentCounts);

    $categories = [];
    $data = [];
    foreach ($rentCounts as $tanggalKey => $jumlah) {
        $categories[] = Carbon::parse($tanggalKey)->format('d F');
        $data[] = $jumlah;
    }

    // Hitung periode bulan ini
    $startDate = Carbon::now()->subMonth()->format('Y-m-d');
    $endDate = Carbon::now()->format('Y-m-d');

    // Hitung total sewa bulan ini (semua status)
    $totalSewaSebulanTerakhir = Rental::whereBetween('booked_start', [$startDate, $endDate])
        ->count();

    // Hitung sewa bulan sebelumnya
    $prevStartDate = Carbon::now()->subMonths(2)->format('Y-m-d');
    $prevEndDate = Carbon::now()->subMonth()->format('Y-m-d');

    $totalSewaSebulanSebelumnya = Rental::whereBetween('booked_start', [$prevStartDate, $prevEndDate])
        ->count();

    // Hitung persentase perubahan
    $persentasePerubahan = null;
    if ($totalSewaSebulanSebelumnya > 0) {
        $persentasePerubahan = (($totalSewaSebulanTerakhir - $totalSewaSebulanSebelumnya) / $totalSewaSebulanSebelumnya) * 100;
    }

    $textColor = 'gray-600';
    if ($persentasePerubahan > 0) {
        $textColor = 'green-600';
    } elseif ($persentasePerubahan < 0) {
        $textColor = 'red-600';
    }

    // Format tanggal
    $fmt = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
    $startDateFormatted = $fmt->format(Carbon::parse($startDate));
    $endDateFormatted = $fmt->format(Carbon::parse($endDate));

    // Analisis produk populer (semua status)
    $produkPopulerSepanjangMasa = Product::withCount('rentals')
        ->orderByDesc('rentals_count')
        ->take(5)
        ->get();

    $produkPopulerBulanIni = Product::withCount(['rentals' => function($query) use ($startDate, $endDate) {
            $query->whereBetween('booked_start', [$startDate, $endDate]);
        }])
        ->orderByDesc('rentals_count')
        ->take(5)
        ->get();

    // Analisis berdasarkan spesifikasi (semua status)
    $spesifikasiCounts = DB::table('rentals')
        ->join('products', 'rentals.product_id', '=', 'products.id')
        ->select(
            DB::raw('COUNT(*) as total'),
            'products.cpu',
            'products.gpu',
            'products.ram'
        )
        ->groupBy('products.cpu', 'products.gpu', 'products.ram')
        ->get();

    $cpuCounts = [];
    $gpuCounts = [];
    $ramCounts = [];

    foreach ($spesifikasiCounts as $item) {
        // Group CPU by brand
        $cpuBrand = 'Lainnya';
        if (stripos($item->cpu, 'Intel') !== false) $cpuBrand = 'Intel';
        elseif (stripos($item->cpu, 'AMD') !== false) $cpuBrand = 'AMD';
        elseif (stripos($item->cpu, 'Apple') !== false) $cpuBrand = 'Apple';
        
        $cpuCounts[$cpuBrand] = ($cpuCounts[$cpuBrand] ?? 0) + $item->total;
        
        // Group GPU by series
        $gpuSeries = 'Lainnya';
        if (stripos($item->gpu, 'RTX') !== false) $gpuSeries = 'RTX';
        elseif (stripos($item->gpu, 'GTX') !== false) $gpuSeries = 'GTX';
        elseif (stripos($item->gpu, 'Radeon') !== false) $gpuSeries = 'Radeon';
        
        $gpuCounts[$gpuSeries] = ($gpuCounts[$gpuSeries] ?? 0) + $item->total;
        
        // RAM groups
        $ramGroup = $item->ram . ' GB';
        $ramCounts[$ramGroup] = ($ramCounts[$ramGroup] ?? 0) + $item->total;
    }

    return view('pages.admin_rent_report', compact(
        'rentals',
        'categories',
        'data',
        'totalSewaSebulanTerakhir',
        'persentasePerubahan',
        'textColor',
        'startDateFormatted',
        'endDateFormatted',
        'produkPopulerSepanjangMasa',
        'produkPopulerBulanIni',
        'cpuCounts',
        'gpuCounts',
        'ramCounts'
    ));
}
}
