<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Navbar -->
  <header class="bg-[#556B2F] py-4 px-8 flex items-center justify-between shadow-md text-white">
    <div class="flex items-center gap-3">
      <img src="img/logo/Matrix_Icon_Square_Logo_White.png" alt="Logo Matrix" class="w-10 h-10 object-contain" />
      <span class="text-xl font-bold tracking-wide">MATRIX</span>
    </div>
    <nav class="hidden md:flex gap-6 text-sm font-medium">
      <a href="#" class="hover:text-gray-200 transition">Home</a>
      <a href="#" class="hover:text-gray-200 transition">Spesifikasi</a>
      <a href="#" class="hover:text-gray-200 transition">Rekomendasi</a>
      <a href="#" class="hover:text-gray-200 transition">Tentang</a>
    </nav>
    <div class="flex items-center gap-4 text-xl">
      <button><i class="fas fa-user"></i></button>
      <button><i class="fas fa-cog"></i></button>
    </div>
  </header>

  <!-- Login Section -->
  <main class="flex justify-center items-center min-h-screen px-4 py-12 bg-gray-100">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl flex flex-col md:flex-row overflow-hidden">

      <!-- Form Login -->
      <div class="md:w-1/2 w-full p-10 flex flex-col justify-center text-center">
        <h2 class="text-3xl font-bold text-[#556B2F] mb-6">MASUK</h2>
        <input type="text" placeholder="Masukkan username" class="w-full mb-4 px-5 py-3 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#556B2F]" />
        <input type="password" placeholder="Masukkan password" class="w-full mb-4 px-5 py-3 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#556B2F]" />
        <div class="flex items-center justify-center mb-4 text-sm">
          <input type="checkbox" id="ingat" class="mr-2" />
          <label for="ingat">Ingat saya</label>
        </div>
        <button class="w-full bg-[#556B2F] hover:bg-[#6e8239] text-white font-semibold py-3 rounded-full transition duration-300">
          MASUK
        </button>
        <p class="text-sm mt-4 text-gray-600">Belum punya akun? <a href="#" class="font-semibold text-[#556B2F] hover:underline">Daftar</a></p>
      </div>

      <!-- Welcome Panel -->
      <div class="md:w-1/2 w-full flex flex-col justify-center items-center p-10 text-white bg-gradient-to-b from-[#3b4e20] via-[#556B2F] to-[#a3b67e]">
        <img src="ilustrasi.png" alt="Welcome" class="w-24 h-24 mb-4 object-contain animate-pulse" />
        <h3 class="text-2xl font-bold mb-2 text-center">Selamat Datang di Matrix</h3>
        <p class="text-sm text-center">Warnet lebih praktis, internetan jadi asik</p>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-200 mt-16 text-gray-800">
    <div class="grid md:grid-cols-5 gap-8 p-8 text-sm">
      <div class="col-span-1">
        <img src="your-logo.png" alt="Logo" class="h-8 mb-2">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p class="mt-2 text-gray-500">Matrix, 2025</p>
      </div>
      <div>
        <h4 class="font-bold mb-2 text-[#556B2F]">Jelajahi Kami</h4>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Tentang Kami</a></li>
          <li><a href="#" class="hover:underline">Kontak</a></li>
          <li><a href="#" class="hover:underline">Bantuan</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-2 text-[#556B2F]">Pembayaran</h4>
        <img src="bri-logo.png" alt="BRI" class="h-5 mb-2">
        <img src="mastercard-logo.png" alt="Mastercard" class="h-5">
      </div>
      <div>
        <h4 class="font-bold mb-2 text-[#556B2F]">Ikuti Kami</h4>
        <ul class="space-y-1">
          <li>Facebook</li>
          <li>Twitter</li>
          <li>Instagram</li>
          <li>Youtube</li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-2 text-[#556B2F]">Mitra Kami</h4>
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
    <div class="text-center py-4 text-sm bg-[#556B2F] text-white">&copy;2025 Matrix, All Rights Reserved</div>
  </footer>

</body>
</html>
