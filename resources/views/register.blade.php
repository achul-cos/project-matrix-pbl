<!DOCTYPE html> 
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f5f5] font-sans">
  <!-- Navbar -->
  <nav class="bg-[#556B2F] text-white px-6 py-4 flex justify-between items-center shadow-md">
    <div class="flex items-center gap-3">
      <img src="/path-to-logo.png" alt="Logo" class="w-10 h-10 object-contain" />
      <span class="text-xl font-bold tracking-wide">MATRIX</span>
    </div>
    <div class="hidden md:flex items-center gap-6 text-sm font-medium">
      <a href="#" class="hover:text-gray-200 transition">Home</a>
      <a href="#" class="hover:text-gray-200 transition">Spesifikasi</a>
      <a href="#" class="hover:text-gray-200 transition">Rekomendasi</a>
      <a href="#" class="hover:text-gray-200 transition">Tentang</a>
    </div>
    <div class="flex items-center gap-4 text-white text-xl">
      <button><img src="/path-to-user-icon.png" alt="User" class="w-6 h-6"></button>
      <button><img src="/path-to-add-icon.png" alt="Add" class="w-6 h-6"></button>
    </div>
  </nav>

  <!-- Main Section -->
  <main class="flex justify-center items-center min-h-screen px-4 py-12">
    <div class="flex flex-col md:flex-row bg-white shadow-2xl rounded-2xl overflow-hidden max-w-5xl w-full">
      <!-- Form Section -->
      <div class="p-8 md:w-[500px]">
        <h2 class="text-center text-3xl font-bold text-[#556B2F] mb-6">DAFTAR</h2>
        <form class="space-y-4">
          <input type="text" placeholder="Nama Lengkap" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
          <input type="text" placeholder="Username" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
          <input type="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
          <div class="flex space-x-3">
            <input type="password" placeholder="Kata Sandi" class="w-1/2 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
            <input type="password" placeholder="Konfirmasi Kata Sandi" class="w-1/2 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
          </div>
          <input type="text" placeholder="No Telepon" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
          <button type="submit" class="w-full py-3 bg-[#556B2F] hover:bg-[#6e8239] text-white font-bold rounded-xl shadow-md transition duration-300">DAFTAR</button>
        </form>
        <p class="text-center mt-4 text-sm">Sudah punya akun? <a href="#" class="text-[#556B2F] font-semibold hover:underline">Masuk</a></p>
      </div>

      <!-- Welcome Section -->
      <div class="bg-gradient-to-b from-[#3e4f1c] to-[#a4bf6b] flex-1 flex flex-col justify-center items-center p-8 text-white">
        <img src="/path-to-logo.png" alt="Matrix Logo" class="w-20 mb-6">
        <h3 class="text-xl font-semibold mb-2">Selamat Datang di Matrix</h3>
        <p class="text-sm text-center leading-relaxed">Warnet lebih praktis,<br>internetan jadi asik!</p>
      </div>
    </div>
  </main>

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