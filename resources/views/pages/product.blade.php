@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

  <!-- Produk Detail Section -->
  <main class="max-w-5xl mx-auto p-8 mt-6 bg-white rounded-2xl shadow-lg grid md:grid-cols-2 gap-10">
    
    <!-- Gambar -->
    <div>
      <!-- Gambar Utama -->
      <div class="bg-gray-200 h-80 rounded-xl overflow-hidden mb-4 flex items-center justify-center">
        <img src="/img/ad/placeholder1.png" alt="Gambar Produk Utama" class="object-cover h-full w-full" />
      </div>
    
      <!-- Gambar Thumbnail -->
      <div class="grid grid-cols-3 gap-3">
        <img src="/img/ad/placeholder1.png" alt="Thumbnail 1" class="h-20 w-full rounded-xl object-cover cursor-pointer hover:opacity-80 transition" />
        <img src="/img/ad/placeholder1.png" alt="Thumbnail 2" class="h-20 w-full rounded-xl object-cover cursor-pointer hover:opacity-80 transition" />
        <img src="/img/ad/placeholder1.png" alt="Thumbnail 3" class="h-20 w-full rounded-xl object-cover cursor-pointer hover:opacity-80 transition" />
      </div>
    </div>
    
        <!-- Info -->
        <div class="flex flex-col justify-between">
          <div>
            <h1 class="text-3xl font-bold text-[#556B2F] mb-2">ASUS ROG A1</h1>
            <p class="text-sm text-gray-500">Inclusive deal of the day</p>
            <p class="text-sm font-medium text-blue-600">BY ASUS</p>
            
            <div class="grid grid-cols-2 gap-3 mt-4 text-sm">
              <p><strong>Processor:</strong> <span class="inline-block px-2 py-1 border rounded">AMD</span></p>
              <p><strong>Ruangan:</strong> <span class="inline-block px-2 py-1 border rounded">PRIVATE ROOM</span></p>
              <p><strong>GPU:</strong> <span class="inline-block px-2 py-1 border rounded">RTX</span></p>
              <p><strong>Lantai:</strong> <span class="inline-block px-2 py-1 border rounded">1</span></p>
              <p><strong>RAM:</strong> <span class="inline-block px-2 py-1 border rounded">8 GB</span></p>
            </div>
    
            <p class="mt-4 text-sm text-gray-700 leading-relaxed">
              ASUS ROG A1 hadir dengan prosesor AMD dan GPU RTX untuk pengalaman gaming dan kerja super lancar. Cukup 3 token, nikmati performa tinggi di Private Room lantai 1 yang nyaman dan eksklusif!
            </p>
    
            <div class="flex items-center space-x-4 mt-6">
              <div class="flex items-center space-x-2 bg-[#d7e7a1] text-[#556B2F] font-semibold px-3 py-1 rounded-full">
                <img src="img/icon/Matrix_Token_Icon_Green.svg" class="w-4 h-4 brightness-50" />
                <span>2 TOKEN / JAM</span>
              </div>
              <button class="bg-[#556B2F] hover:bg-[#6e8239] text-white font-bold px-6 py-2 rounded-full shadow-md transition duration-300">
                MULAI SEWA
              </button>
            </div>
          </div>
    
          <!-- Review -->
          <div class="mt-8 border-t pt-4">
            <div class="flex items-start space-x-4">
              <div class=""><img src="/img/ad/placeholder1.png" alt="" class="object-cover w-20 h-auto rounded-full aspect-square"></div>
              <div>
                <p class="font-semibold">Ara gamers sejati</p>
                <p class="italic text-sm text-gray-600">"ASUS ROG A1 di sini bener-bener worth it! Performa mantap, nggak ada lag sama sekali. 3 token tapi serasa pake PC puluhan juta"</p>
                <div class="text-yellow-500 mt-1 text-sm">★★★★★</div>
              </div>
            </div>
          </div>
        </div>
      </main>

@endsection