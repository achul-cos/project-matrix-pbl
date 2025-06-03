@extends('layout.app')

@section('title', 'Matrix - Invoice PC')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white bg-opacity-90 rounded-2xl shadow-xl text-sm font-sans print:p-2 print:border-0 print:shadow-none print:bg-white text-black">
  <!-- Header -->
  <div class="text-center mb-6">
    <h1 class="text-2xl font-extrabold uppercase border-b-2 border-black pb-3 text-black tracking-wide">Invoice Pembayaran Sewa PC</h1>
    <p class="text-xs text-gray-500">Tanggal Cetak: {{ now()->format('d M Y, H:i') }}</p>
  </div>

  <!-- Informasi Umum -->
  <div class="mb-4 space-y-1">
    <p><span class="font-semibold">Nama Perusahaan:</span> {{ $companyName ?? 'Matrix Komputer' }}</p>
    <p><span class="font-semibold">Kode Pembayaran:</span> {{ $invoiceCode ?? 'xn12o4' }}</p>
  </div>

  <!-- Informasi Penyewa -->
  <div class="border-t border-b border-black py-3 mb-4 space-y-1">
    <p><span class="font-semibold">Nama Penyewa:</span> {{ $customerName ?? '-' }}</p>
    <p><span class="font-semibold">Tanggal Sewa:</span> {{ $startDate ?? '-' }}</p>
    <p><span class="font-semibold">Durasi:</span> {{ $duration ?? '-' }}</p>
    <p><span class="font-semibold">Metode Pembayaran:</span> {{ $paymentMethod ?? '-' }}</p>
  </div>

  <!-- Tabel Transaksi -->
  <div class="mb-4 overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="border-b border-black bg-gray-100 text-black">
          <th class="py-2 border-t border-black">Deskripsi</th>
          <th class="py-2 text-center border-t border-black">Jumlah</th>
          <th class="py-2 text-right border-t border-black">Harga Satuan</th>
          <th class="py-2 text-right border-t border-black">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b border-black">
          <td class="py-2">Sewa PC ({{ $unitCount ?? 0 }} unit)</td>
          <td class="text-center">{{ $unitCount ?? 0 }}</td>
          <td class="text-right">Rp {{ number_format($unitPrice ?? 0, 0, ',', '.') }}</td>
          <td class="text-right">Rp {{ number_format(($unitCount ?? 0) * ($unitPrice ?? 0), 0, ',', '.') }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Total Bayar -->
  <div class="text-right mb-6 border-t border-black pt-3">
    <p class="font-semibold text-base">
      TOTAL BAYAR:
      <span class="text-black">Rp {{ number_format(($unitCount ?? 0) * ($unitPrice ?? 0), 0, ',', '.') }}</span>
    </p>
  </div>

  <!-- QRIS -->
  <div class="text-center">
    <p class="mb-2">Silakan scan QRIS berikut untuk melakukan pembayaran:</p>
    <img src="{{ asset('images/qris.png') }}" alt="QRIS" class="mx-auto w-40 h-40 object-contain border-2 border-black rounded" />
  </div>

  <!-- Footer -->
  <div class="text-center mt-6 text-xs text-gray-500 border-t border-black pt-2">
    Terima kasih telah menggunakan layanan kami.
  </div>
</div>
@endsection
