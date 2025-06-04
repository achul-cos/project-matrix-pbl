@extends('layout.admin')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="container mx-auto px-4 py-30">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- Left side - Login Form -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-bold mb-8 text-center">MASUK</h2>

                @if (session('success'))
                    <div id="toast-success" class="flex mx-auto items-center w-full p-4 mb-8 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div id="toast-danger" class="flex items-center w-full p-4 mb-8 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                            </svg>
                            <span class="sr-only">Error icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- <form action="/admin/login" method="POST">
                    @csrf <!-- Tambahkan token CSRF -->
                    <div class="mb-4">
                        <input type="text" name="username" placeholder="Masukkan username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500" required>
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Masukkan password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500" required>
                    </div>
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" id="ingat" class="mr-2">
                        <label for="ingat" class="text-sm">Ingat saya</label>
                    </div>
                    <button type="submit" class="w-full bg-slate-500 text-white py-2 rounded-lg hover:bg-slate-900 transition duration-300">MASUK</button>
                    <div class="text-center mt-4">
                        <a href="/login" class="text-sm text-slate-800 hover:underline">Login Sebagai User?</a>
                    </div>
                </form> --}}

                <form method="POST" action="/admin/login">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="login" class="block text-sm font-medium text-gray-700 mb-2">Email atau Nama</label>
                        <input type="text" id="login" name="login" value="{{ old('login') }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-slate-500 @error('email') border-red-500 @enderror"
                            required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" id="password" name="password" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-slate-500 @error('password') border-red-500 @enderror"
                            required>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-slate-600 shadow-sm focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <button type="submit" 
                            class="w-full bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition duration-200">
                        Login
                    </button>
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