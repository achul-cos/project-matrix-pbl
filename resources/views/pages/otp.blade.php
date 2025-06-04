@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class=" bg-cover bg-center bg-no-repeat bg-fixed">
    <div class="w-full min-h-screen flex items-center justify-center min-h-center py-12 px-4 mt-20">
        <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Verifikasi OTP</h1>
                <p class="text-gray-600 mt-2">Masukkan kode verifikasi yang matrix kirim ke</p>
                <p class="font-medium">matrix@gmail.com</p>
            </div>

            <!-- OTP Input Fields -->
            <div class="flex justify-between mb-8">
                <input type="text" maxlength="1" class="w-12 h-12 text-2xl text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" pattern="\d*">
                <input type="text" maxlength="1" class="w-12 h-12 text-2xl text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" pattern="\d*">
                <input type="text" maxlength="1" class="w-12 h-12 text-2xl text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" pattern="\d*">
                <input type="text" maxlength="1" class="w-12 h-12 text-2xl text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" pattern="\d*">
                <input type="text" maxlength="1" class="w-12 h-12 text-2xl text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" pattern="\d*">
                <input type="text" maxlength="1" class="w-12 h-12 text-2xl text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" pattern="\d*">
            </div>

            <!-- Verify Button -->
            <button class="w-full bg-[#556B2F] hover:bg-green-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200">
                Verifikasi
            </button>

            <!-- Resend OTP Link -->
            <div class="text-center mt-6">
                <p class="text-gray-600">Tidak menerima kode? <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Kirim ulang</a></p>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto focus and move between OTP inputs
    const inputs = document.querySelectorAll('input[type="text"]');
    
    inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            if (e.target.value.length === 1) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            }
        });
        
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && e.target.value.length === 0) {
                if (index > 0) {
                    inputs[index - 1].focus();
                }
            }
        });
    });
</script>

@endsection