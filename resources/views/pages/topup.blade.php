@extends('layout.app')

@section('title', 'Matrix - Top Up Token')

@section('content')

<!-- Notification -->
<div id="notification" class="fixed top-6 right-6 bg-white shadow-lg rounded-lg p-4 hidden z-50 transition-all duration-300">
  <div class="flex items-center">
    <div class="bg-[#2F5F00] text-white p-2 rounded-full mr-3">
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

<section class="py-14 px-6 bg-white min-h-screen">
  <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-[#E0F0CC]">
    <h1 class="text-3xl font-bold text-center text-[#2F5F00] mb-10">Top Up Token Komputer</h1>

    <form id="tokenForm" method="GET">
      <!-- Manual Token Input -->
      <div class="mb-8">
        <label for="customToken" class="block mb-2 font-medium text-[#2F5F00]">Masukkan Jumlah Token</label>
        <input type="number" name="customToken" id="customToken" min="1" placeholder="Contoh: 5"
               class="w-full p-3 border border-[#A3C57C] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#497F00]">
      </div>

      <!-- Quick Token Buttons -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
        @foreach ([2, 4, 6, 8, 10, 12, 14, 16] as $value)
          <a href="{{ url('/payment') }}?token={{ $value }}"
             class="block text-center bg-[#D8EBC0] hover:bg-[#C7DEA9] text-[#2F5F00] font-semibold py-2 rounded-xl shadow-sm transition hover:scale-105">
            {{ $value }} Token
          </a>
        @endforeach
      </div>

      <!-- Submit Manual -->
      <div class="flex justify-center">
        <button type="submit"
                class="bg-[#2F5F00] hover:bg-[#497F00] active:bg-[#3B6A00] text-white font-bold py-3 px-8 rounded-xl shadow-md transition hover:scale-105">
          Lanjutkan Pembayaran
        </button>
      </div>
    </form>
  </div>

  <div class="max-w-3xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-[#E0F0CC] mt-10">
    <div class="mb-5 flex justify-center">
      <p class="text-xl font-bold text-center bg-[#2F5F00] text-white px-3 py-2 inline-block">Redeem Kode Kupon atau Vocher</p>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
      <div class="mb-6 text-green-800 bg-green-100 border border-green-300 p-4 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    {{-- Notifikasi error --}}
    @if($errors->any())
      <div class="mb-6 text-red-800 bg-red-100 border border-red-300 p-4 rounded-lg">
        <ul class="list-disc pl-5">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form id="couponForm" method="POST" action="{{ route('user.redeem-coupon') }}">
      @csrf
      <!-- Coupon Input -->
      <div class="mb-8">
        <input type="text" name="coupon" id="coupon" min="1" placeholder="Contoh: PROMOMATRIX"
               class="w-full p-3 px-5 border border-[#A3C57C] rounded-full focus:outline-none focus:ring-2 focus:ring-[#497F00]">
      </div>

      <!-- Submit Manual -->
      <div class="flex justify-center">
        <button type="submit"
                class="border-[#2F5F00] hover:border-[#497F00] active:border-[#3B6A00] text-[#2F5F00] font-bold py-3 px-8 rounded-xl border-2 shadow-md transition hover:scale-105">
          Lanjutkan Pembayaran
        </button>
      </div>
    </form>
  </div>
</section>

<script>
  document.getElementById('tokenForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const tokenInput = document.getElementById('customToken');
    const tokenValue = parseInt(tokenInput.value);

    if (!isNaN(tokenValue) && tokenValue > 0) {
      showNotification();

      setTimeout(function() {
        window.location.href = '/payment?token=' + tokenValue;
      }, 2000);
    } else {
      alert("Masukkan jumlah token yang valid (minimal 1)");
    }
  });

  function showNotification() {
    const notif = document.getElementById('notification');
    notif.classList.remove('hidden');
  }

  function closeNotification() {
    const notif = document.getElementById('notification');
    notif.classList.add('hidden');
  }
</script>

@endsection
