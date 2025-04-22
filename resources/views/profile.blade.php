<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna - Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f5f5] font-sans text-sm">

<div class="min-h-screen bg-white">
  <!-- Navbar -->
  <header class="bg-[#556B2F] text-white px-6 py-4 flex justify-between items-center">
    <div class="flex items-center gap-4">
      <img src="/logo.svg" alt="Logo" class="h-8 w-8" />
      <input type="text" placeholder="Cari..." class="rounded-full px-4 py-1 w-60 text-black" />
    </div>
    <div class="flex items-center gap-2">
      <span>Arabella Ginting</span>
      <svg class="w-6 h-6 fill-white" viewBox="0 0 24 24"><!-- Icon user --></svg>
    </div>
  </header>

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">
    
    <!-- Sidebar -->
    <div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-4">
      <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F]"></div>
      <h2 class="text-[#556B2F] font-bold text-lg">Achul</h2>
      <ul class="space-y-2 w-full text-center text-sm">
        <li>Riwayat Penyewaan</li>
        <li>Riwayat Top Up</li>
        <li>Pengaturan Akun</li>
        <li>Ganti Password</li>
        <li class="text-red-600 font-semibold">Keluar Akun</li>
        <li class="text-red-700 font-bold">Hapus Akun</li>
      </ul>
    </div>

    <!-- Profile Form -->
    <div class="w-full md:w-2/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-6 space-y-4">
      <div class="grid grid-cols-1 gap-4 text-sm text-black">
        <div class="flex justify-between">
          <span class="font-semibold">Nama Lengkap :</span>
          <span>Nama Lengkap Tidak Dapat Diubah</span>
        </div>
        <div class="flex justify-between items-center">
          <label>Username :</label>
          <input type="text" class="border border-[#556B2F] px-3 py-1 rounded transition hover:border-[#334422] focus:outline-none" />
        </div>
        <div class="flex justify-between items-center">
          <label>Email :</label>
          <input type="email" class="border border-[#556B2F] px-3 py-1 rounded transition hover:border-[#334422] focus:outline-none" />
        </div>
        <div class="flex justify-between items-center">
          <label>Nomor Telepon :</label>
          <input type="text" class="border border-[#556B2F] px-3 py-1 rounded transition hover:border-[#334422] focus:outline-none" />
        </div>
        <div class="flex justify-between items-center">
          <label>Kata Sandi :</label>
          <input type="password" placeholder="Min. 8 karakter" class="border border-[#556B2F] px-3 py-1 rounded" />
        </div>
        <div class="flex justify-between items-center">
          <label>Konfirmasi Kata Sandi :</label>
          <input type="password" class="border border-[#556B2F] px-3 py-1 rounded" />
        </div>
      </div>
      <button class="mt-4 px-4 py-2 bg-[#556B2F] text-white rounded shadow hover:bg-[#445522] transition">Simpan</button>
    </div>

    <!-- Upload Foto -->
    <div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-2">
      <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F]"></div>
      <p class="text-xs text-center">Format: PNG, JPG, JPEG, GIF<br />Rekomendasi: 1000x1000 px</p>
      <button class="px-4 py-2 bg-[#556B2F] text-white rounded shadow hover:bg-[#445522] transition">Upload File</button>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-200 mt-12 text-gray-800 text-sm">
    <div class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-2 md:grid-cols-5 gap-6">
      <div>
        <img src="/your-logo.png" alt="Logo" class="w-20 mb-2">
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
        <h4 class="font-semibold mb-2 text-[#556B2F]">Pembayaran</h4>
        <img src="bri-logo.png" alt="BRI" class="h-5 mb-1">
        <img src="mastercard-logo.png" alt="Mastercard" class="h-5">
      </div>
      <div>
        <h4 class="font-semibold mb-2 text-[#556B2F]">Ikuti Kami</h4>
        <ul>
          <li>Facebook</li>
          <li>Twitter</li>
          <li>Instagram</li>
          <li>Youtube</li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2 text-[#556B2F]">Mitra Kami</h4>
        <ul>
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
      &copy;2025 Matrix, All Rights Reserved
    </div>
  </footer>
</body>
</html>