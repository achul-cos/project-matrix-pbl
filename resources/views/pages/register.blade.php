@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

  <!-- Main Section -->
  <main class="flex justify-center items-center min-h-screen px-4 py-12">
    <div class="flex flex-col md:flex-row bg-white shadow-2xl rounded-2xl overflow-hidden max-w-5xl w-full">
      <!-- Form Section -->
      <div class="p-8 md:w-[500px]">
        <h2 class="text-center text-3xl font-bold text-[#556B2F] mb-6">DAFTAR</h2>
        <form action="/login" class="space-y-4">
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
        <p class="text-center mt-4 text-sm">Sudah punya akun? <a href="/login" class="text-[#556B2F] font-semibold hover:underline">Masuk</a></p>
      </div>

      <!-- Welcome Section -->
      <div class="bg-gradient-to-b from-[#3e4f1c] to-[#a4bf6b] flex-1 flex flex-col justify-center items-center p-8 text-white">
        <img src="img/logo/Matrix_Icon_Square_Logo_White.png" alt="Matrix Logo" class="w-20 mb-6">
        <h3 class="text-xl font-semibold mb-2">Selamat Datang di Matrix</h3>
        <p class="text-sm text-center leading-relaxed">Warnet lebih praktis,<br>internetan jadi asik!</p>
      </div>
    </div>
  </main>

@endsection