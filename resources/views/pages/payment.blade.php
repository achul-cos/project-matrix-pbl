@extends('layout.app')

@section('title', 'Matrix - Pembayaran Token')

@section('content')
<section class="py-16 px-6 bg-white min-h-screen">
  <div class="max-w-xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-[#E0F0CC]">
    <h2 class="text-2xl font-bold text-center text-[#2F5F00] mb-8">Konfirmasi Pembayaran</h2>

    <div class="space-y-4 text-gray-700">
      <div class="flex justify-between border-b pb-2">
        <span class="font-medium text-[#2F5F00]">Jumlah Token</span>
        <span id="tokenDisplay" class="font-semibold text-[#2F5F00]">0</span>
      </div>
      <div class="flex justify-between border-b pb-2">
        <span class="font-medium text-[#2F5F00]">Harga per Token</span>
        <span class="text-[#2F5F00]">Rp 2.000</span>
      </div>
      <div class="flex justify-between text-lg font-bold border-t pt-4">
        <span class="text-[#2F5F00]">Total Bayar</span>
        <span id="totalPrice" class="text-[#2F5F00]">Rp 0</span>
      </div>
    </div>

    <!-- QRIS Dummy -->
    <div class="mt-10">
      <h3 class="text-center font-medium text-gray-600 mb-2">Silakan Scan QRIS berikut</h3>
      <div class="flex justify-center">
        <img src="{{ asset('img/qris-dummy.png') }}" alt="QRIS Dummy" class="w-48 h-48 border rounded-lg shadow-md">
      </div>
    </div>

    <div class="text-center mt-8">
      <a href="/home" class="inline-block mt-4 bg-[#2F5F00] hover:bg-[#497F00] active:bg-[#3B6A00] text-white px-6 py-3 rounded-lg shadow-md transition hover:scale-105">
        Kembali ke Beranda
      </a>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const token = parseInt(urlParams.get('token') || urlParams.get('customToken')) || 0;

    const tokenDisplay = document.getElementById('tokenDisplay');
    const totalPrice = document.getElementById('totalPrice');

    const pricePerToken = 2000;
    const total = token * pricePerToken;

    tokenDisplay.textContent = token;
    totalPrice.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total);
  });
</script>
@endsection
