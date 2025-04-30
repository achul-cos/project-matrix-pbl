@extends('layout.admin')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="container mx-auto px-4 py-30">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- Left side - Login Form -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-bold mb-8 text-center">MASUK</h2>
                <form action="/admin/management_computer">
                    <div class="mb-4">
                        <input type="text" placeholder="Masukkan username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500">
                    </div>
                    <div class="mb-4">
                        <input type="password" placeholder="Masukkan password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500">
                    </div>
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" id="ingat" class="mr-2">
                        <label for="ingat" class="text-sm">Ingat saya</label>
                    </div>
                    <button type="submit" class="w-full bg-slate-500 text-white py-2 rounded-lg hover:bg-slate-900 transition duration-300">MASUK</button>
                    <div class="text-center mt-4">
                        <a href="#" class="text-sm text-slate-800 hover:underline">Belum ada pengguna baru?</a>
                    </div>
                </form>
            </div>
            
            <!-- Right side - Welcome Message -->
            <div class="w-full md:w-1/2 bg-gradient-to-br bg-slate-500 p-8 text-white flex flex-col justify-center items-center">
                <img src="img/logo/Matrix_Icon_Square_Logo_White.png" alt="Logo Matrix" class="h-16 mb-8">
                <h2 class="text-xl font-bold mb-2">Selamat Datang di Matrix</h2>
                <p class="text-center">Website untuk praktis, memudahkan jadi asik</p>
            </div>
        </div>
    </div>
  </div>

@endsection