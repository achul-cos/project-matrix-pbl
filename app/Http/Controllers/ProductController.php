<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(15);

        // Peta warna status → badge
        $statusColorMap = [
            'available'   => 'bg-green-100 text-green-700',
            'online'      => 'bg-blue-100 text-blue-700',
            'offline'     => 'bg-gray-200 text-gray-700',
            'maintenance' => 'bg-yellow-100 text-yellow-700',
            'prepare'     => 'bg-amber-100 text-amber-700',
            'undifined'   => 'bg-red-100 text-red-700',
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


}
