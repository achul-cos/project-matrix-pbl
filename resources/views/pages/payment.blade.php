@extends('layout.app')

@section('title', 'Matrix - Pembayaran Token')

@section('content')
<section class="py-16 px-6 bg-gradient-to-br from-white to-lime-50 min-h-screen">
  <div class="max-w-xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-gray-100">
    <h2 class="text-2xl font-bold text-center text-lime-700 mb-8">Konfirmasi Pembayaran</h2>

    <div class="space-y-4 text-gray-700">
      <div class="flex justify-between border-b pb-2">
        <span class="font-medium">Jumlah Token</span>
        <span id="tokenDisplay" class="font-semibold text-lime-700">0</span>
      </div>
      <div class="flex justify-between border-b pb-2">
        <span class="font-medium">Harga per Token</span>
        <span>Rp 2.000</span>
      </div>
      <div class="flex justify-between text-lg font-bold border-t pt-4">
        <span>Total Bayar</span>
        <span id="totalPrice" class="text-lime-800">Rp 0</span>
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
      <a href="/" class="inline-block mt-4 bg-lime-600 hover:bg-lime-700 text-white px-6 py-3 rounded-lg shadow-md transition">
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
