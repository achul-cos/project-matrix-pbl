@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6 animate__animated animate__fadeIn">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Sistem Manajemen Warnet</h1>
    
    <!-- Status Warnet -->
    <div class="mb-8 p-4 border rounded-lg bg-gray-50">
        <h2 class="text-xl font-semibold mb-4">Status Warnet</h2>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600">Status saat ini:</p>
                <p id="warnet-status-text" class="text-lg font-semibold {{ $setting->is_open ? 'text-green-600' : 'text-red-600' }}">
                    {{ $setting->is_open ? 'Sedang Buka' : 'Sedang Tutup' }}
                </p>
                <p id="warnet-hours" class="text-sm text-gray-500 mt-1">Jam operasional: 08:00 - 22:00</p>
            </div>

            <form action="{{ route('admin.management_warnet.status') }}" method="POST">
                @csrf
                <input type="hidden" name="is_open" value="{{ $setting->is_open ? 0 : 1 }}">
                <button type="submit"
                    class="px-4 py-2 {{ $setting->is_open ? 'bg-red-700 hover:bg-red-800' : 'bg-green-700 hover:bg-green-800' }} text-white rounded-lg transition">
                    {{ $setting->is_open ? 'Tutup Warnet' : 'Buka Warnet' }}
                </button>
            </form>
        </div>
    </div>

    
    <!-- Pengaturan Website -->
    <div class="p-4 border rounded-lg bg-gray-50">
        <h2 class="text-xl font-semibold mb-4"> Website</h2>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">Status Website:</p>
                    <p id="website-status-text" class="text-lg font-semibold text-green-600">Online</p>
                    <p id="website-status-desc" class="text-sm text-gray-500 mt-1">Pengunjung dapat mengakses website kapanpun dan dimanapun</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Manajemen Warnet -->
<div class="flex">
    <section class="flex-1 px-8 py-10">

      <!-- form untuk update komputer -->
      <form method="POST" action="{{ route('admin.management_warnet.update')}}">
        @csrf

        @php
            // urutkan berdasarkan code secara natural: A1, A2, ..., A10
            $products = $products->sortBy(function ($product) {
                preg_match('/([A-Z])(\d+)/', $product->code, $match);
                return [$match[1], (int) $match[2]];
            });

            $grouped = $products->groupBy('floor');

            $floorLabels = ['1' => 'Lantai 1', '2' => 'Lantai 2', '3' => 'Lantai 3', '4' => 'Lantai 4'];
        @endphp

        @php
            $grouped = $products->groupBy('floor');
            $floorLabels = ['1' => 'Lantai 1', '2' => 'Lantai 2', '3' => 'Lantai 3', '4' => 'Lantai 4'];
        @endphp

        <div class="bg-white p-6 rounded-2xl border-4 border-[#565885] shadow-xl">
            <!-- Tombol Aksi -->
            <div class="flex space-x-3 mb-7">
                <button id="checkAll" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Semua Tersedia
                </button>
                <button id="uncheckAll" class="px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Tidak Tersedia
                </button>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Header Tabel -->
                <div class="grid grid-cols-4 bg-gray-100 p-4 border-b">
                    <div class="font-semibold text-gray-700">Lantai 1</div>
                    <div class="font-semibold text-gray-700">Lantai 2</div>
                    <div class="font-semibold text-gray-700">Lantai 3</div>
                    <div class="font-semibold text-gray-700">Lantai 4</div>
                </div>
                    <!-- Baris Checkbox -->
                @for ($i = 0; $i < 10; $i++)
                    <div class="grid grid-cols-4 p-4 border-b">
                        @foreach (['1','2','3','4'] as $floor)
                            <div class="flex items-center">
                                @php
                                    $product = $grouped[$floor][$i] ?? null;
                                @endphp
                                @if ($product)
                                    <input type="checkbox" name="available_computers[]" value="{{ $product->id }}"
                                        id="product-{{ $product->id }}"
                                        class="mr-2 h-5 w-5 text-green-600"
                                        {{ in_array($product->id, $checkedProductIds) ? 'checked' : '' }}>
                                    <label for="product-{{ $product->id }}" class="text-gray-800">{{ $product->code }}</label>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endfor

                <div class="m-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600">
                        Simpan Perubahan
                    </button>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    
    // Centang semua
    document.getElementById('checkAll').addEventListener('click', function () {
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = true);
    });

    // Uncentang semua
    document.getElementById('uncheckAll').addEventListener('click', function () {
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    });
</script>

@endsection