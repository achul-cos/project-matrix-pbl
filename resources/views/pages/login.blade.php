@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

  <!-- Login Section -->
  <main class="flex justify-center items-center min-h-screen px-4 py-12 bg-white">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl flex flex-col md:flex-row overflow-hidden">

      <!-- Form Login -->
      <div class="md:w-1/2 w-full p-10 flex flex-col justify-center text-center">
        <form action="/home" method="GET" class="">
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
          <p class="text-sm mt-4 text-gray-600">Belum punya akun? <a href="/register" class="font-semibold text-[#556B2F] hover:underline">Daftar</a></p>
          <a href="/admin"><p class="text-xs mt-4 text-gray-400 hover:underline hover:text-lime-900 hover:opacity-50">Login Sebagai Admin.</p></a>
        </form>
      </div>

      <!-- Welcome Panel -->
      <div class="md:w-1/2 w-full flex flex-col justify-center items-center p-10 text-white bg-gradient-to-b from-[#3b4e20] via-[#556B2F] to-[#a3b67e]">
        <img src="img/logo/Matrix_Icon_Square_Logo_White.png" alt="Welcome" class="w-24 h-24 mb-4 object-contain animate-pulse" />
        <h3 class="text-2xl font-bold mb-2 text-center">Selamat Datang di Matrix</h3>
        <p class="text-sm text-center">Warnet lebih praktis, internetan jadi asik</p>
      </div>

    </div>
  </main>

@endsection