@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<!-- Main Content -->
<div class="flex-1 px-8 py-10">
  <section id="title">
    <h1 class="text-3xl font-bold mb-6">
      <span class="text-slate-900">Managament Account</span>
    </h1>
  </section>

  <section id="product-tools" class="flex flex-row flex-wrap gap-4 p-4 bg-gray-300 rounded-xl mb-10">
    <div class="p-4 bg-gray-50 border-2 border-gray-300 shadow-lg rounded-2xl min-w-1/7 justify-center align-middle">
      <div data-modal-target="add-modal" data-modal-toggle="add-modal" class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
        <div class="inline-block relative scale-90 bg-gray-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-gray-50 z-10">
          <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
          </svg>
        </div>
        <div class="-mt-10 bg-gray-400 p-4 w-auto rounded-lg z-0 justify-center">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            TAMBAH
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap max-w-36 mt-4">
            Tambahkan Akun Pengguna baru.
          </div>
        </div>
      </div>
    </div>
    <div data-modal-target="topup-modal" data-modal-toggle="topup-modal" class="p-4 bg-slate-50 border-2 border-slate-300 shadow-lg rounded-2xl min-w-1/7 justify-center align-middle">
      <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
        <div class="inline-block relative scale-90 bg-slate-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-slate-50 z-10">
          <img src="{{ asset('../img/icon/Matrix_Token_Icon_White.svg') }}" class="w-8 h-8">
        </div>
        <div class="-mt-10 bg-slate-400 p-4 w-auto rounded-lg z-0 justify-center">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            TOP UP
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap max-w-40 mt-4">
            Top Up MaxCoin Pembayaran Di Tempat.
          </div>
        </div>
      </div>
    </div>
    <a href="#editButton" class="p-4 bg-emerald-50 border-2 border-emerald-300 shadow-lg rounded-2xl min-w-1/7 justify-center align-middle">
      <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
        <div class="inline-block relative scale-90 bg-emerald-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-emerald-50 z-10">
          <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
          </svg>
        </div>
        <div class="-mt-10 bg-emerald-400 p-4 w-auto rounded-lg z-0 justify-center">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            EDIT
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap max-w-36 mt-4">
            Edit data akun Pengguna.
          </div>
        </div>
      </div>
    </a>
    <a href="#banButton" class="p-4 bg-orange-50 border-2 border-orange-300 shadow-lg rounded-2xl min-w-1/7 justify-center align-middle">
      <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
        <div class="inline-block relative scale-90 bg-orange-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-orange-50 z-10">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
        </svg>
        </div>
        <div class="-mt-10 bg-orange-400 p-4 w-auto rounded-lg z-0 justify-center">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            BAN
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap max-w-36 mt-4">
            Ban atau Blokir akun pengguna.
          </div>
        </div>
      </div>
    </a>
    <a href="#deleteButton" class="p-4 bg-rose-50 border-2 border-rose-300 shadow-lg rounded-2xl min-w-1/7 justify-center align-middle">
      <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
        <div class="inline-block relative scale-90 bg-rose-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-rose-50 z-10">
          <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
          </svg>
        </div>
        <div class="-mt-10 bg-rose-400 p-4 w-auto rounded-lg z-0 justify-center">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            HAPUS
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap max-w-36 mt-4">
            Hapus data akun pengguna.
          </div>
        </div>
      </div>
    </a>
    <div class="p-4 bg-red-50 border-2 border-red-300 shadow-lg rounded-2xl min-w-1/7 justify-center align-middle">
      <div data-modal-target="delete-all-modal" data-modal-toggle="delete-all-modal" class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
        <div class="inline-block relative scale-90 bg-red-800 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-red-50 z-10">
          <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
          </svg>
        </div>
        <div class="-mt-10 bg-red-800 p-4 w-auto rounded-lg z-0 justify-center">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            HAPUS SEMUA
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap max-w-36 mt-4 place-self-center">
            Hapus SELURUH data akun pengguna Matrix.
          </div>
        </div>
      </div>
    </div>      
  </section>

  <section id="table-user">

  </section>

  {{-- <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
    <!-- Search & Add -->
    <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
      <input type="text" placeholder="Search User"
        class="w-full md:w-1/2 px-4 py-2 rounded-xl border border-gray-300 bg-purple-50 focus:outline-none focus:ring-2 focus:ring-[#556B2F]" />
      <button class="bg-purple-50 border border-gray-300 px-4 py-2 rounded-xl text-sm flex items-center gap-2 hover:bg-purple-100 transition">
        <span class="text-xl font-bold">+</span> Add User
      </button>
    </div>

    <!-- Table -->
    <table class="min-w-full text-left border-separate border-spacing-y-3">
      <thead>
        <tr class="bg-gray-200 text-sm text-gray-700">
          <th class="p-3 rounded-l-lg">Nama</th>
          <th class="p-3">Username</th>
          <th class="p-3 rounded-1-lg">Email</th>
          <th class="p-3">Nomor Telepon</th>
          <th class="p-3 rounded-1-lg">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-gray-100 rounded-xl">
            <td class="p-3 flex items-center space-x-3">
              <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
              <span>Salsa Putri</span>
            </td>
            <td class="p-3">salsaajry</td>
            <td class="p-3">salsaajry@gmail.com</td>
            <td class="p-3">089378376279</td>
            <td class="p-3">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">Online</span>
            </td>
          </tr>
          </tr>
        <tr class="bg-gray-100 rounded-xl">
          <td class="p-3 flex items-center space-x-3">
            <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
            <span>Arabella</span>
          </td>
          <td class="p-3">araa</td>
          <td class="p-3">arabella@gmail.com</td>
          <td class="p-3">0892736547898</td>
          <td class="p-3">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">offline</span>
          </td>
        </tr>
        <tr class="bg-gray-100 rounded-xl">
          <td class="p-3 flex items-center space-x-3">
            <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
            <span>Nasrul</span>
          </td>
          <td class="p-3">achul</td>
          <td class="p-3">achul@gmail.com</td>
          <td class="p-3">081376542543</td>
          <td class="p-3">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">available</span>
          </td>
        </tr>
        <tr class="bg-gray-100 rounded-xl">
          <td class="p-3 flex items-center space-x-3">
            <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
            <span>Putri</span>
          </td>
          <td class="p-3">putrirawr</td>
          <td class="p-3">putri@gmail.com</td>
          <td class="p-3">09377653567</td>
          <td class="p-3">
          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">online</span>
          </td>
        </tr>
        <tr class="bg-gray-100 rounded-xl">
          <td class="p-3 flex items-center space-x-3">
            <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
            <span>Nabila Maya</span>
            <td class="p-3">nbilamaya</td>
            <td class="p-3">nabilamaya@gmail.com</td>
            <td class="p-3">081372653675</td>
            <td class="p-3">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">offline</span>
              </td>
      </tbody>
    </table>
  </div> --}}
</div>

@endsection
