@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

  <!-- Notification -->
  <div id="notification" class="fixed top-4 right-4 bg-white shadow-lg rounded-lg p-4 hidden z-50 transform transition-transform duration-300 translate-y-0">
    <div class="flex items-center">
      <div class="bg-lime-700 text-white p-2 rounded-full mr-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
      </div>
      <div>
        <p class="font-bold">Melanjutkan ke Pembayaran</p>
        <p class="text-sm text-gray-600">Anda akan diarahkan ke halaman pembayaran</p>
      </div>
      <button onclick="closeNotification()" class="ml-4 text-gray-400 hover:text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  </div>

  <!-- Main Section -->
  <section class="py-12 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-lg">
      <h1 class="text-2xl font-black text-center text-lime-700 mb-6">Top Up Token</h1>
      <!-- Token Input -->
      <div class="mb-6">
        <label for="token" class="block mb-2 font-semibold">Jumlah Token</label>
        <input type="text" id="token" placeholder="Masukkan jumlah token" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-lime-700" />
      </div>
      <!-- Quick Select Token Buttons -->
      <div class="grid grid-cols-3 gap-4 mb-8">
        <button class="tokenButton bg-lime-700 hover:bg-lime-700/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="2">2 Token</button>
        <button class="tokenButton bg-lime-700 hover:bg-lime-700/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="4">4 Token</button>
        <button class="tokenButton bg-lime-700 hover:bg-lime-700/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="6">6 Token</button>
        <button class="tokenButton bg-lime-700 hover:bg-lime-700/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="8">8 Token</button>
        <button class="tokenButton bg-lime-700 hover:bg-lime-700/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="10">10 Token</button>
        <button class="tokenButton bg-lime-700 hover:bg-lime-700/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="12">12 Token</button>
      </div>
      <button id="paymentButton" class="w-full bg-black text-white py-3 rounded-lg font-bold hover:bg-gray-800 transition duration-200 active:bg-gray-900 active:scale-[0.99]">
        Lanjutkan Pembayaran
      </button>
    </div>
  </section>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const tokenInput = document.getElementById("token");
      const tokenButtons = document.querySelectorAll(".tokenButton");

      tokenButtons.forEach(button => {
        button.addEventListener("click", function () {
          const tokenValue = this.getAttribute("data-value");
          tokenInput.value = tokenValue;
        });
      });
    });
  </script>

@endsection
