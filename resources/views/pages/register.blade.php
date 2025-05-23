@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

  <!-- Main Section -->
  <main class="flex justify-center items-center min-h-screen px-4 py-12">
    <div class="flex flex-col md:flex-row bg-white shadow-2xl rounded-2xl overflow-hidden max-w-5xl w-full">
      <!-- Form Section -->
      <div class="p-8 md:w-[500px]">
        <h2 class="text-center text-3xl font-bold text-[#556B2F] mb-4">DAFTAR</h2>

        {{-- Notification Succes --}}

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

      <form action="/simpanuser" class="space-y-4" method="POST">
          @csrf
          <input type="text" name="name" placeholder="Nama Lengkap" autofocus required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" value="{{ old('name') }}" />

          <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" value="{{ old('username') }}" />

          <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" value="{{ old('email') }}" />
          
          <input type="tel" name="phone" placeholder="No Telepon" required minlength="9" maxlength="14" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" value="{{ old('phone') }}" />
          
            <div class="mb-4 relative">
                <input id="password" type="password" name="password" placeholder="Kata Sandi" minlength="8" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
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

            <div class="mb-4 relative">
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" minlength="8" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#556B2F] transition" />
                <button type="button" 
                    class="absolute inset-y-0 right-3 flex items-center px-2 text-gray-600 hover:text-gray-900"
                    onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-confirmation')"
                    aria-label="Toggle password visibility"
                >
                    <svg id="eye-icon-confirmation" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </button>
            </div>

            {{-- reCAPTCHA widget dengan callback --}}
            <div class="g-recaptcha flex justify-center" 
                data-sitekey="{{ config('app.nocaptcha.sitekey') }}" 
                data-callback="recaptchaCallback"
                data-expired-callback="recaptchaExpired">
            </div>

            @error('g-recaptcha-response')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <button type="submit" id="submitBtn" disabled class="w-full py-3 bg-gray-400 cursor-not-allowed text-white font-bold rounded-xl shadow-md transition duration-300">
                DAFTAR
            </button>

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

{!! NoCaptcha::renderJs() !!}

<script>
    function recaptchaCallback() {
        // Aktifkan tombol submit saat captcha berhasil
        document.getElementById('submitBtn').disabled = false;
        document.getElementById('submitBtn').classList.remove('bg-gray-400', 'cursor-not-allowed');
        document.getElementById('submitBtn').classList.add('bg-[#556B2F]', 'cursor-pointer');
    }

    function recaptchaExpired() {
        // Nonaktifkan tombol submit saat captcha expired
        document.getElementById('submitBtn').disabled = true;
        document.getElementById('submitBtn').classList.add('bg-gray-400', 'cursor-not-allowed');
        document.getElementById('submitBtn').classList.remove('bg-[#556B2F]', 'cursor-pointer');
    }
</script>

@endsection