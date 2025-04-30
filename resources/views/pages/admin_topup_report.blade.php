@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

{{-- Tempat Kode Frontend halaman Topup Report --}}

<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Topup Report </span>
      </h1>

      <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
        <!-- Search & Add -->
        <div class="flex flex-col md:flex-row justify-between gap-2 mb-6">
          <input type="text" placeholder="Search User"
            class="w-full md:w-1/2 px-4 py-2 rounded-xl border border-gray-300 bg-purple-50 focus:outline-none focus:ring-2 focus:ring-[#556B2F]" />
          <button class="bg-purple-50 border border-gray-300 px-4 py-2 rounded-xl text-sm flex items-center gap-2 hover:bg-purple-100 transition">
            <span class="text-xl font-bold">+</span> Filter By Date
          </button>
          <button class="bg-[#8F2D2D] border text-white border-gray-300 px-4 py-2 rounded-xl text-sm flex items-center gap-2 hover:bg-purple-100 transition">
            <span class="text-xl font-bold">+</span> Export to PDF
          </button>
        </div>

        <!-- Table -->
        <table class="min-w-full text-left border-separate border-spacing-y-3">
          <thead>
            <tr class="bg-gray-200 text-sm text-gray-700">
              <th class="p-3 rounded-l-lg">Nama</th>
              <th class="p-3">Jumlah Token</th>
              <th class="p-3">Nominal Harga</th>
              <th class="p-3">Metode Pembayaran</th>
              <th class="p-3 rounded-r-lg">Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Arabella</span>
              </td>
              <td class="p-3">2 Token</td>
              <td class="p-3">Rp. 4.000</td>
              <td class="p-3">Gopay Saldo</td>
              <td class="p-3">Sabtu, 5 Maret 2025</td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Arabella</span>
              </td>
              <td class="p-3">2 Token</td>
              <td class="p-3">Rp. 4.000</td>
              <td class="p-3">Gopay Saldo</td>
              <td class="p-3">Sabtu, 5 Maret 2025</td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Arabella</span>
              </td>
              <td class="p-3">2 Token</td>
              <td class="p-3">Rp. 4.000</td>
              <td class="p-3">Gopay Saldo</td>
              <td class="p-3">Sabtu, 5 Maret 2025</td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Arabella</span>
              </td>
              <td class="p-3">2 Token</td>
              <td class="p-3">Rp. 4.000</td>
              <td class="p-3">Gopay Saldo</td>
              <td class="p-3">Sabtu, 5 Maret 2025</td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Arabella</span>
              </td>
              <td class="p-3">2 Token</td>
              <td class="p-3">Rp. 4.000</td>
              <td class="p-3">Gopay Saldo</td>
              <td class="p-3">Sabtu, 5 Maret 2025</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>


@endsection