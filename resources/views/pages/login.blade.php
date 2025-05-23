@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

  <!-- Login Section -->
  <main class="flex justify-center items-center min-h-screen px-4 py-12 bg-white">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl flex flex-col md:flex-row overflow-hidden">

      <!-- Form Login -->
      <div class="md:w-1/2 w-full p-10 flex flex-col justify-center text-center">

      <form action="/authenticate" method="POST">
          @csrf

          <h2 class="text-3xl font-bold text-[#556B2F] mb-6">MASUK</h2>

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

          <input type="text" name="login" autofocus required placeholder="Email atau Username" class="w-full mb-4 px-5 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#556B2F]" value="{{ old('login') }}" />
          
            <div class="mb-4 relative">
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
                <button type="button" 
                    class="absolute inset-y-0 right-3 flex items-center px-2 text-gray-600 hover:text-gray-900"
                    onclick="togglePasswordVisibility('password', 'eye-icon-password')"
                    aria-label="Toggle password visibility"
                >
                    <svg id="eye-icon-password" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </button>
            </div>
          
          <div class="flex items-center justify-center mb-4 text-sm">
                <input type="checkbox" name="remember" id="remember" class="mr-2" />
              <label for="ingat">Ingat saya</label>
          </div>

          <input type="submit" value="MASUK" class="w-full bg-[#556B2F] hover:bg-[#6e8239] text-white font-semibold py-3 rounded-full transition duration-300">
          
          <p class="text-sm mt-4 text-gray-600">Belum punya akun? <a href="/register" class="font-semibold text-[#556B2F] hover:underline">Daftar</a></p>
          
          <a href="/admin">
              <p class="text-xs mt-4 text-gray-400 hover:underline hover:text-lime-900 hover:opacity-50">Login Sebagai Admin.</p>
          </a>
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