@extends('layout.app')

@section('title', 'Matrix - Top Up Token')

@section('content')

<!-- Notification -->
<div id="notification" class="fixed top-6 right-6 bg-white shadow-lg rounded-lg p-4 hidden z-50 transition-all duration-300">
  <div class="flex items-center">
    <div class="bg-lime-600 text-white p-2 rounded-full mr-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
      </svg>
    </div>
    <div>
      <p class="font-bold">Berhasil Diverifikasi</p>
      <p class="text-sm text-gray-600">Token valid, sedang diarahkan ke pembayaran...</p>
    </div>
    <button onclick="closeNotification()" class="ml-4 text-gray-400 hover:text-gray-600">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>
</div>

<section class="py-14 px-6 bg-gradient-to-br from-lime-50 to-white min-h-screen">
  <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-lime-100">
    <h1 class="text-3xl font-bold text-center text-lime-700 mb-10">Top Up Token Komputer</h1>

    <form id="tokenForm" method="GET">
      <!-- Manual Token Input -->
      <div class="mb-8">
        <label for="customToken" class="block mb-2 font-medium text-lime-800">Masukkan Jumlah Token</label>
        <input type="number" name="customToken" id="customToken" min="1" placeholder="Contoh: 5" class="w-full p-3 border border-lime-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-lime-500">
      </div>

      <!-- Quick Token Buttons -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
        @foreach ([2, 4, 6, 8, 10, 12, 14, 16] as $value)
          <a href="{{ url('/payment') }}?token={{ $value }}" class="block text-center bg-lime-100 hover:bg-lime-300 text-lime-800 font-semibold py-2 rounded-xl shadow-sm transition hover:scale-105">
            {{ $value }} Token
          </a>
        @endforeach
      </div>

      <!-- Submit Manual -->
      <div class="flex justify-center">
        <button type="submit" class="bg-lime-600 hover:bg-lime-700 text-white font-bold py-3 px-8 rounded-xl shadow-md transition hover:scale-105">
          Lanjutkan Pembayaran
        </button>
      </div>
    </form>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('tokenForm');
    const customToken = document.getElementById('customToken');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const tokenValue = parseInt(customToken.value);
      if (!tokenValue || isNaN(tokenValue) || tokenValue <= 0) {
        alert("Jumlah token harus angka lebih dari 0 ya {{ Auth::user()->username ?? 'Kak' }}");
        return;
      }

      // Tampilkan notif & redirect ke halaman pembayaran
      showNotification();
      setTimeout(() => {
        const url = `/payment?customToken=${tokenValue}`;
        window.location.href = url;
      }, 2000);
    });
  });

  function showNotification() {
    const notif = document.getElementById('notification');
    notif.classList.remove('hidden');
    setTimeout(() => notif.classList.add('hidden'), 4000);
  }

  function closeNotification() {
    document.getElementById('notification').classList.add('hidden');
  }
</script>

@endsection
