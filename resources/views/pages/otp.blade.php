@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
<div class="bg-cover bg-center bg-no-repeat bg-fixed">
    <div class="w-full min-h-screen flex items-center justify-center py-12 px-4 mt-20">
        <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Verifikasi OTP</h1>
                <p class="text-gray-600 mt-2 dark:text-gray-300">Masukkan kode verifikasi yang dikirim ke</p>
                <p class="font-medium dark:text-gray-100">{{ session('email') }}</p>
            </div>

            <!-- OTP Form -->
            <form method="POST" action="{{ route('verify.otp') }}">
                @csrf
                <input type="hidden" name="email" value="{{ session('email') }}">

                <input
                    type="text"
                    name="otp_code"
                    placeholder="Masukkan Kode OTP"
                    required
                    class="w-full p-2 mt-2 border border-gray-300 rounded focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                />

                <button type="submit" class="w-full mt-4 bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg">
                    Verifikasi
                </button>
            </form>

            <!-- Countdown Timer -->
<div id="countdown" class="text-center text-sm text-gray-600 mb-4">
    Kode OTP akan kedaluwarsa dalam <span id="timer">60</span> detik.
</div>

<div id="expired-message" class="text-center text-red-600 font-medium hidden">
    Waktu habis! Silakan kirim ulang kode OTP.
</div>

         <!-- Resend OTP -->
<div class="text-center mt-5">
    <form action="{{ route('resend.otp') }}" method="POST" class="inline-block ml-1" style="display: inline;">
            @csrf
    <p class="text-gray-600 dark:text-gray-300"> Tidak menerima kode?
            <button type="submit" class="text-blue-600 hover:text-blue-800 font-medium bg-transparent border-none p-0 m-0 underline">
                Kirim ulang
            </button>
        </form>
    </p>
</div>



            <!-- WhatsApp Button (jika pernah digunakan sebelumnya) -->
            @if (session('whatsapp_url'))
                <div class="text-center mt-4">
                    <a href="{{ session('whatsapp_url') }}" target="_blank"
                        class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg">
                        Buka WhatsApp
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>



@if (session('success'))
    <div class="text-green-500 mb-2">
        {{ session('success') }}
    </div>
@endif

<script>
    // Untuk navigasi input OTP jika pakai input digit per digit nanti
    const inputs = document.querySelectorAll('input[type="text"]');
    inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            if (e.target.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && e.target.value.length === 0 && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });

    let timer = 60;
    const timerSpan = document.getElementById('timer');
    const countdown = document.getElementById('countdown');
    const expired = document.getElementById('expired-message');

    const interval = setInterval(() => {
        timer--;
        timerSpan.textContent = timer;

        if (timer <= 0) {
            clearInterval(interval);
            countdown.style.display = 'none';
            expired.classList.remove('hidden');
        }
    }, 1000);
</script>


</script>
@endsection
