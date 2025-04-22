<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Produk - Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Navbar -->
  <nav class="bg-[#556B2F] text-white px-6 py-4 flex justify-between items-center shadow-md">
    <div class="flex items-center gap-3">
      <img src="img/logo/Matrix_Icon_Square_Logo_White.png" alt="Logo" class="w-10 h-10 object-contain" />
      <span class="text-xl font-bold tracking-wide">MATRIX</span>
    </div>
    <div class="hidden md:flex items-center gap-6 text-sm font-medium">
      <a href="#" class="hover:text-gray-200 transition">Home</a>
      <a href="#" class="hover:text-gray-200 transition">Produk</a>
      <a href="#" class="hover:text-gray-200 transition">Tentang</a>
    </div>
    <div class="flex items-center gap-4 text-white text-xl">
      <button><img src="/path-to-user-icon.png" alt="User" class="w-6 h-6"></button>
      <button><img src="/path-to-add-icon.png" alt="Add" class="w-6 h-6"></button>
    </div>
  </nav>

  <!-- Produk Detail Section -->
  <main class="max-w-5xl mx-auto p-8 mt-6 bg-white rounded-2xl shadow-lg grid md:grid-cols-2 gap-10">
    
<!-- Gambar -->
<div>
  <!-- Gambar Utama -->
  <div class="bg-gray-200 h-80 rounded-xl overflow-hidden mb-4 flex items-center justify-center">
    <img src="/images/produk/utama.png" alt="Gambar Produk Utama" class="object-cover h-full w-full" />
  </div>

  <!-- Gambar Thumbnail -->
  <div class="grid grid-cols-3 gap-3">
    <img src="/images/produk/thumb1.png" alt="Thumbnail 1" class="h-20 w-full rounded-xl object-cover cursor-pointer hover:opacity-80 transition" />
    <img src="/images/produk/thumb2.png" alt="Thumbnail 2" class="h-20 w-full rounded-xl object-cover cursor-pointer hover:opacity-80 transition" />
    <img src="/images/produk/thumb3.png" alt="Thumbnail 3" class="h-20 w-full rounded-xl object-cover cursor-pointer hover:opacity-80 transition" />
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
            <img src="/path-to-token-icon.png" class="w-4 h-4" />
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
          <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
          <div>
            <p class="font-semibold">Ara gamers sejati</p>
            <p class="italic text-sm text-gray-600">"ASUS ROG A1 di sini bener-bener worth it! Performa mantap, nggak ada lag sama sekali. 3 token tapi serasa pake PC puluhan juta"</p>
            <div class="text-yellow-500 mt-1 text-sm">★★★★★</div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-200 mt-16 text-gray-800 text-sm">
    <div class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-2 md:grid-cols-5 gap-6">
      <div>
        <img src="/path-to-logo.png" alt="Logo" class="w-20 mb-2">
        <p class="text-gray-600 text-sm">Matrix Warnet</p>
      </div>
      <div>
        <h4 class="font-semibold mb-2 text-[#556B2F]">Jelajahi Kami</h4>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Tentang Kami</a></li>
          <li><a href="#" class="hover:underline">Kontak</a></li>
          <li><a href="#" class="hover:underline">Bantuan</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2 text-[#556B2F]">Hubungi Kami</h4>
        <p>+62 81234567</p>
        <p>Polibatam</p>
      </div>
      <div>
        <h4 class="font-semibold mb-2 text-[#556B2F]">Ikuti Kami</h4>
        <div class="flex space-x-3">
          <img src="/path-to-fb.png" class="w-5">
          <img src="/path-to-yt.png" class="w-5">
          <img src="/path-to-ig.png" class="w-5">
        </div>
      </div>
      <div>
        <h4 class="font-semibold mb-2 text-[#556B2F]">Mitra Kami</h4>
        <ul class="space-y-1">
          <li>ASUS</li>
          <li>ACER</li>
          <li>LENOVO</li>
          <li>NVIDIA</li>
          <li>AMD</li>
          <li>INTEL</li>
          <li>POLIBATAM</li>
        </ul>
      </div>
    </div>
    <div class="bg-[#556B2F] text-center py-3 text-white font-medium">
      ©2025 Matrix, All Rights Reserved
    </div>
  </footer>

</body>
</html>
