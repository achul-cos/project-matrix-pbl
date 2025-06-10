<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function productPage(Request $request)
    {
        // Ambil semua produk dengan urutan lantai dan kode
        $allProducts = Product::orderBy('floor')
            ->orderByRaw("CAST(SUBSTRING(code,2) AS UNSIGNED)")
            ->get();

        // Bentuk ulang menjadi format untuk komponen monitor
        $monitors = $allProducts->map(function ($p) {
            return [
                'id_komputer'     => $p->id,
                'nama_komputer'   => $p->name,
                'kode_komputer'   => $p->code,
                'cpu_komputer'    => $p->cpu,
                'gpu_komputer'    => $p->gpu,
                'ram_komputer'    => $p->ram,
                'lantai_komputer' => $p->floor,
                'room_komputer'   => $p->room,
                'biaya_komputer'  => $p->price,
                'status_komputer' => $p->status,
                'jam_awal_booking_komputer'  => optional($p->activeBooking)->book_start?->format('H:i') ?? '-',
                'jam_akhir_booking_komputer' => optional($p->activeBooking)->book_end?->format('H:i')   ?? '-',
            ];
        });

        // Kirim hanya data monitors ke view
        return view('pages.product', compact('monitors'));
    }
    public function monitoringComputer(Request $request)
    {
        /* ───────────────────────────────
        1. Query dasar produk sekali saja
        ─────────────────────────────── */
        $baseQuery = Product::orderBy('floor')
            ->orderByRaw("CAST(SUBSTRING(code,2) AS UNSIGNED)");

        /* ── a. Data lengkap (untuk layout) ───────────────────────── */
        $allProducts = $baseQuery->get();

        $monitors = $allProducts->map(function ($p) {
            return [
                'id_komputer'     => $p->id,
                'nama_komputer'   => $p->name,
                'kode_komputer'   => $p->code,
                'cpu_komputer'    => $p->cpu,
                'gpu_komputer'    => $p->gpu,
                'ram_komputer'    => $p->ram,
                'lantai_komputer' => $p->floor,
                'room_komputer'   => $p->room,
                'biaya_komputer'  => $p->price,
                'status_komputer' => $p->status,
                'jam_awal_booking_komputer'  => optional($p->activeBooking)->book_start?->format('H:i') ?? '-',
                'jam_akhir_booking_komputer' => optional($p->activeBooking)->book_end?->format('H:i')   ?? '-',
            ];
        });


        /* ── b. Data paginated (untuk tabel) ──────────────────────── */
        // kita kloning query agar tidak bentrok dengan get() di atas
        $products = (clone $baseQuery)->latest('id')->paginate(25);

        /* ── c. Warna badge status (untuk tabel) ─────────────────── */
        $statusColorMap = [
            'available'   => 'bg-lime-200 text-lime-800',
            'online'      => 'bg-orange-200 text-orange-800',
            'offline'     => 'bg-red-200 text-red-800',
            'maintenance' => 'bg-indigo-200 text-indigo-800',
            'prepare'     => 'bg-yellow-200 text-yellow-800',
            'undefined'   => 'bg-gray-200 text-gray-800',
        ];

        /* ───────────────────────────────
        2. Kirim ke view tunggal
        ─────────────────────────────── */
        return view('pages.admin_monitoring_computer', [
            'products'        => $products,   // untuk tabel
            'monitors'        => $monitors,   // untuk layout visual
            'statusColorMap'  => $statusColorMap,
        ]);
    }
    public function readProductManagement()
    {
        $products = Product::latest()->paginate(25);

        // Peta warna status → badge
        $statusColorMap = [
            'available' => 'bg-lime-200 text-lime-800',
            'online' => 'bg-orange-200 text-orange-800',
            'offline' => 'bg-red-200 text-red-800',
            'maintenance' => 'bg-indigo-200 text-indigo-800',
            'prepare' => 'bg-yellow-200 text-yellow-800',
            'undefined' => 'bg-gray-200 text-gray-800'
        ];

        return view('pages.admin_management_computer', compact('products', 'statusColorMap'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'name'      => 'required|string|max:255',
                'cpu'       => 'required|string|max:255',
                'gpu'       => 'required|string|max:255',
                'ram'       => 'required|integer|min:1',
                'floor'     => 'required|integer|min:1|max:4',
                'price'     => 'required|integer|min:1',
                'rating'    => 'nullable|integer|min:1|max:5',
                'room'      => 'required|in:public,private',
                'status'    => 'maintenance',
                'book_start'=> 'nullable|date',
                'book_end'  => 'nullable|date|after_or_equal:book_start',
                'image1'    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'image2'    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'image3'    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'image4'    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'desc'      => 'required|string',
                'rent'      => 'nullable|integer|min:0',
            ]);

            // Generate kode produk berdasarkan lantai dan urutan
            $floor = (int) $validated['floor'];
            $letter = chr(64 + $floor); // 65 = A, 66 = B, dst

            // Cari nomor urut terkecil yang belum dipakai untuk lantai ini
            $existingCodes = Product::where('floor', $floor)->pluck('code')->toArray();

            $nextNumber = 1;
            while (in_array($letter . $nextNumber, $existingCodes)) {
                $nextNumber++;
            }
            $validated['code'] = $letter . $nextNumber;
            $validated['rent'] = $validated['rent'] ?? 0;

            // Proses upload dan konversi gambar ke JPEG
            foreach (['image1', 'image2', 'image3', 'image4'] as $img) {
                $image = $request->file($img);
                $filename = uniqid() . '.jpg';
                $path = public_path('products/' . $filename);

                // Pastikan folder products ada
                if (!file_exists(public_path('products'))) {
                    mkdir(public_path('products'), 0755, true);
                }

                // Konversi dan simpan gambar ke JPEG
                Image::make($image)->encode('jpg', 90)->save($path);

                // Simpan path relatif ke validated data (misal: products/abc123.jpg)
                $validated[$img] = 'products/' . $filename;
            }

            Product::create($validated);
            DB::commit();

            // return redirect()->route('admin.management_computer')->with('success', 'Data berhasil ditambahkan!');

            if ($request->ajax()) {
                return response()->json(['redirect' => route('admin.management_computer')]);
            }

            return redirect()->route('admin.management_computer')->with('success', 'Data berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Gagal menyimpan produk: ' . $e->getMessage());

            if ($request->ajax()) {
                return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
            }

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function deleteAll()
    {
        try {
            DB::beginTransaction();

            // Hapus semua data dan reset AUTO_INCREMENT
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Product::query()->delete(); // lebih aman daripada truncate
            DB::statement('ALTER TABLE products AUTO_INCREMENT = 1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            DB::commit();

            return redirect()->back()->with('success', 'Semua data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleteAll: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'ram'    => 'required|integer|min:1',
            'cpu'    => 'required|string|max:255',
            'gpu'    => 'required|string|max:255',
            'floor'  => 'required|integer|min:1|max:4',
            'price'  => 'required|integer|min:1',
            'room'   => 'required|in:public,private',
            'desc'   => 'required|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|in:available,online,offline,maintenance,prepare, undifined',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                $p         = Product::findOrFail($id);
                $oldFloor  = $p->floor;
                $oldNum    = intval(substr($p->code, 1));  // A4 → 4
                $newFloor  = (int) $request->floor;

                // Update field umum
                $p->fill($request->only([
                    'name', 'ram', 'cpu', 'gpu', 'price', 'room', 'desc', 'floor', 'status'
                ]));

                // Jika pindah lantai, ubah kode dan geser kode lama
                if ($oldFloor !== $newFloor) {
                    // 1️⃣ Buat kode baru di lantai tujuan
                    $letter = chr(64 + $newFloor); // 1=A, 2=B, dst
                    $maxNum = Product::where('floor', $newFloor)
                        ->selectRaw("MAX(CAST(SUBSTRING(code, 2) AS UNSIGNED)) as max")
                        ->value('max') ?? 0;

                    $p->code = $letter . ($maxNum + 1);

                    // 2️⃣ Geser kode di lantai asal
                    $affected = Product::where('floor', $oldFloor)
                        ->whereRaw("CAST(SUBSTRING(code,2) AS UNSIGNED) > ?", [$oldNum])
                        ->orderByRaw("CAST(SUBSTRING(code,2) AS UNSIGNED)")
                        ->get();

                    foreach ($affected as $item) {
                        $num        = intval(substr($item->code, 1)) - 1;
                        $item->code = chr(64 + $oldFloor) . $num;
                        $item->save();
                    }
                }

                // Upload gambar jika ada
                foreach (['image1', 'image2', 'image3', 'image4'] as $img) {
                    if ($request->hasFile($img)) {
                        $p->$img = $request->file($img)->store('products', 'public');
                    }
                }

                $p->save();
            });

            return back()->with('success', [
                'type' => 'success',
                'message' => 'Produk berhasil diperbarui dan kode diperbarui otomatis!',
            ]);

        } catch (\Exception $e) {
            return back()->with('error', [
                'type' => 'error',
                'message' => 'Gagal memperbarui produk. Silakan coba lagi.',
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $floor = $product->floor;
            $oldNum = intval(substr($product->code, 1));
            $product->delete();

            // Geser ulang kode di lantai tersebut
            $affected = Product::where('floor', $floor)
                        ->whereRaw("CAST(SUBSTRING(code,2) AS UNSIGNED) > ?", [$oldNum])
                        ->orderByRaw("CAST(SUBSTRING(code,2) AS UNSIGNED)")
                        ->get();

            foreach ($affected as $item) {
                $num = intval(substr($item->code, 1)) - 1;
                $item->code = chr(64 + $floor) . $num;
                $item->save();
            }

            return back()->with('toast', [
                'type' => 'success',
                'message' => 'Produk berhasil dihapus dan kode tersisa diperbarui!',
            ]);
        } catch (\Exception $e) {
            return back()->with('toast', [
                'type' => 'error',
                'message' => 'Gagal menghapus produk. Silakan coba lagi.',
            ]);
        }
    }

}
