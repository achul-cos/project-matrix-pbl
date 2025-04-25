<form action="/product" method="GET">
    <button type="submit">
        <div class="rounded-xl shadow-2xl w-64 transform transition-transform hover:scale-105" id="card">
        <img src="{{ $foto_produk ?? '../img/ad/placeholder1.png' }}" alt="" class="object-cover rounded-t-xl aspect-square h-75 w-auto">
            <div class="bg-lime-800 text-white flex py-2 px-2 justify-center">
                <p class="font-bold">{{ $nama_produk ?? 'Lorem Ipsum' }}</p>
            </div>
            <div class="p-4 pb-8">
                <div class="flex flex-wrap gap-y-2">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                        Intel
                    </span>
                    <span class="bg-red-100 text-red-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                        AMD
                    </span>
                    <span class="bg-green-900 text-white text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                        RTX
                    </span>
                    <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                        GTX
                    </span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                    Public Room
                    </span>
                    <span class="bg-gray-800 text-gray-50 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                    Private Room
                    </span>
                    <span class="bg-red-800 text-red-50 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                    Lantai 1
                    </span>
                    <span class="bg-yellow-800 text-yellow-50 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                    Lantai 2
                    </span>
                    <span class="bg-blue-800 text-blue-50 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                    Lantai 3
                    </span>
                    <span class="bg-orange-800 text-orange-50 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm">
                    Lantai 4
                    </span>     
                </div>
            </div>
                <div class="group relative block">
                <!-- Elemen default (muncul saat tidak di-hover) -->
                <div class="transition-all duration-300 ease-in-out group-hover:opacity-0">
                    <div class="bg-gray-50 text-lime-700 border-t border-lime-700 flex py-2 px-2 justify-center rounded-b-xl gap-2">
                        <img src="../img/icon/Matrix_Token_Icon_Green.svg" alt="" class="w-4 h-auto brightness-50">
                        <p class="font-bold">{{ $harga_sewa ?? '99' }} Token / Jam</p>
                    </div>
                </div>
                
                <!-- Elemen muncul saat hover -->
                <div class="absolute inset-0 opacity-0 transition-all duration-300 ease-in-out pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto">
                    <div class="bg-lime-700 text-gray-50 border-t border-lime-700 flex py-2 px-2 justify-center rounded-b-xl gap-2">
                        <img src="../img/icon/Matrix_Token_Icon_White.svg" alt="" class="w-4 h-auto">
                        <p class="font-bold">{{ $harga_sewa ?? '99' }} Token / Jam</p>
                    </div>
                </div>
                </div>
        </div>
    </button>
</form>