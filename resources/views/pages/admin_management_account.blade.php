@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<!-- Cropper.js CSS -->
<link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>

@if (session('success'))
  <div id="toast-success-update" class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
      <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
          </svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="ms-3 text-sm font-normal">{{ session('success.message') }}</div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success-update" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
      </button>
  </div>
@endif

@if (session('error'))
  <div id="toast-danger-update" class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
      <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
          </svg>
          <span class="sr-only">Error icon</span>
      </div>
      <div class="ms-3 text-sm font-normal">{{ session('error.message') }}</div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger-update" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
      </button>
  </div>
@endif

<!-- Main Content -->
<div class="flex-1 px-8 py-10">
  <section id="title">
    <h1 class="text-3xl font-bold mb-6">
      <span class="text-slate-900">Managament Account</span>
    </h1>
  </section>

  <section id="admin-tools" class="flex flex-row flex-wrap gap-4 p-4 bg-gray-300 rounded-xl mb-10">
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

  <section id="product-table" class="bg-white p-6 rounded-2xl border-4 border-slate-800 shadow-xl">
    <table id="filter-table" class="text-left border-separate border-spacing-y-3">
      <thead>
        <tr class="bg-gray-200 text-sm text-gray-700">
          @php
            $headers = ['ID', 'Username', 'Email', 'Telepon', 'Last Online', 'Action'];
          @endphp
          @foreach($headers as $i => $h)
            <th class="p-3 {{ $i==0?'rounded-l-lg':'' }} {{ $i==count($headers)-1?'rounded-r-lg':'' }}">
              <span class="flex items-center">
                {{ $h }}
                <svg class="w-4 h-4 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/></svg>
              </span>
            </th>
          @endforeach 
        </tr>
      </thead>

      <tbody>
        @foreach ($users as $user)
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3">{{ $user->id }}</td>

            <td class="p-3">{{ $user->username }}</td>

            <td class="p-3">{{ $user->email }}</td>

            <td class="p-3">{{ $user->phone }}</td>

            <td class="p-3 capitalize">{{ $user->formatted_last_online }}</td>

            <td class="p-3 gap-4 flex">
              <button  data-modal-target="edit-modal-{{ $user->id }}"
                    data-modal-toggle="edit-modal-{{ $user->id }}"
                    class="inline-block bg-emerald-700 px-3 py-2 text-white rounded-md shadow transform transition-transform active:scale-85">EDIT
              </button>

              <button data-modal-target="delete-modal-{{ $user->id }}"
                      data-modal-toggle="delete-modal-{{ $user->id }}"
                      class="inline-block bg-red-800 px-3 py-2 text-white rounded-md shadow transform transition-transform active:scale-85">
                HAPUS
              </button>

              @if (!$user->is_block == true)
                <button data-modal-target="ban-modal-{{ $user->id }}"
                        data-modal-toggle="ban-modal-{{ $user->id }}"
                        class="inline-block bg-orange-800 px-3 py-2 text-white rounded-md shadow transform transition-transform active:scale-85">
                  BAN
                </button>
              @else
                <button data-modal-target="unban-modal-{{ $user->id }}"
                        data-modal-toggle="unban-modal-{{ $user->id }}"
                        class="inline-block bg-blue-800 px-3 py-2 text-white rounded-md shadow transform transition-transform active:scale-85">
                  UNBAN
                </button>
              @endif
              
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Paginate link --}}
    <div class="mt-4">{{ $users->links() }}</div>

  </section>

  <section id="modal">
    <!-- Top Up Modal -->
    <div id="topup-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Tambah Data Komputer
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="topup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5 space-y-4">

            {{-- Form Add User --}}

            <div class="flex flex-row gap-8">
              <div class="w-1/2">
                <form action="{{ route('admin.tambahUser') }}" class="space-y-4 flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
        
                <label for="name" class="font-medium">Username / Email:</label>
                <input type="text" name="login" placeholder="Username atau Email Akun Pengguna" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ old('login') }}" />

                <label for="qty_token" class="font-medium">Jumlah Token:</label>
                <input type="number" name="qty_token" placeholder="Jumlah Token yang Ditopup" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ old('qty_token') }}" />

                <label for="qty_bill" class="font-medium">Biaya Total:</label>
                <input type="number" name="qty_bill" placeholder="Biaya Total yang dibayarkan pengguna" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ old('qty_bill') }}" />

                <!-- Input Payment Method -->
                <label for="payment_method" class="font-medium">Metode Pembayaran:</label>
                <select id="payment_method"
                        name="payment_method"
                        placeholder="Metode Pembayaran digunakan"
                        value="{{ old('payment_method') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition"
                        required>
                <option disabled selected>Metode Pembayaran digunakan</option>
                <option value="cash">Cash (Uang Tunai)</option>
                <option value="transfer">Transfer (Qris, Transfer Bank dll)</option>
                <option value="cuopon">Kupon (Vocher, Promo dll)</option>
                </select>

              </div>
  
              <div class="w-1/2 items-center my-auto gap-4 flex flex-col p-8">
                <p class="text-lg text-center text-gray-500 mb-2 font-bold">Bukti Pembayaran</p>
                <div class="w-auto mb-2">
                  <img id="preview-image1"
                      src="{{ asset('img/ad/placeholder2.png') }}"
                      alt="Preview 1"
                      class="object-cover w-full h-full aspect-square border rounded-2xl border-gray-300 shadow-sm">

                  <label for="image1" class="block text-sm text-center my-4 font-medium text-gray-700">Format: PNG, JPG, JPEG dan WEBP</label>
                  <input type="file"
                        name="image1"
                        id="image1"
                        accept=".jpg,.jpeg,.png,.webp"
                        onchange="previewImage(event, 1)"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:slate-blue-500"
                        required>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button type="submit" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Tambah</button>
              <input data-modal-hide="topup-modal" type="reset" value="Batal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete All Modal -->
    <div id="delete-all-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Konfirmasi Hapus SEMUA Data Komputer
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-all-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Perlu sangat anda perhatikan, bahwa data SELURUH data komputer warnet anda yang akan dihapus <span class='font-bold'>TIDAK DAPAT DIKEMBALIKAN</span>. Konfirmasi kembali apakah data komputer ini dapat dihapus semuanya.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form action="{{ route('products.deleteAll') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">HAPUS</button>
                    </form>
                    <button data-modal-hide="delete-all-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="add-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Tambah/Daftar Akun Pengguna
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5 space-y-4">

            {{-- Form Add User --}}

            @if ($errors->any())
                <div id="toast-danger" class="flex items-center w-full p-4 mb-8 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif

            <div class="flex flex-row gap-8">
              <div class="w-1/2">
                <form action="{{ route('admin.tambahUser') }}" class="space-y-4 flex flex-col" method="POST" enctype="multipart/form-data">
                @csrf
    
                <label for="name" class="font-medium">Nama Pengguna:</label>
                <input type="text" name="name" placeholder="Nama Pengguna" autofocus required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ old('name') }}" />
    
                <label for="name" class="font-medium">Username:</label>
                <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ old('username') }}" />
    
                <label for="name" class="font-medium">Email:</label>
                <div class="relative">
                  <button id="emailGuest" type="button" class="absolute right-5 top-2.5 px-2 py-1 shadow-md rounded-lg border-slate-600 bg-slate-400 text-white transform transition-transform active:scale-80">
                    Guest
                  </button>
                  <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ old('email') }}" />
                  <p class="text-xs mt-2 text-gray-400" id="alertEmailGuest">Email Default Tamu</p>
                </div>
                
                <label for="phone" class="font-medium">Nomor Telepon:</label>
                <div class="relative">
                  <button id="phoneGuest" type="button" class="absolute right-5 top-2.5 px-2 py-1 shadow-md rounded-lg border-slate-600 bg-slate-400 text-white transform transition-transform active:scale-80">
                    Guest
                  </button>
                  <input type="tel" name="phone" placeholder="No Telepon" required minlength="9" maxlength="14" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ old('phone') }}" />
                  <p class="text-xs mt-2 text-gray-400" id="alertPhoneGuest">Nomor Telepon Default Tamu</p>
                </div>
                
                <label for="name" class="font-medium">Kata Sandi:</label>
                <div class="mb-4 relative">
                    <input id="password" type="password" name="password" placeholder="Kata Sandi" minlength="8" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" />
                    <button type="button" 
                        class="absolute inset-y-0 right-3 flex items-center px-2 text-gray-600 hover:text-gray-900"
                        onclick="togglePasswordVisibility('password', 'eye-icon-password')"
                        aria-label="Toggle password visibility"
                    >
                        <svg id="eye-icon-password" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </button>
                </div>
    
                <div class="mb-4 relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" minlength="8" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" />
                    <button type="button" 
                        class="absolute inset-y-0 right-3 flex items-center px-2 text-gray-600 hover:text-gray-900"
                        onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-confirmation')"
                        aria-label="Toggle password visibility"
                    >
                        <svg id="eye-icon-confirmation" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </button>
                </div>
              </div>
  
              <div class="w-1/2 items-center my-auto gap-4 flex flex-col p-8">
                <img id="profilePhoto" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/ad/placeholder2.png') }}"
                class="w-full h-auto aspect-square rounded-xl border-4 border-slate-400 object-cover" alt="Foto Profil" />
                <p class="text-xs text-center text-gray-500">*Opsional <br />Format: PNG, JPG, JPEG, GIF<br />Rekomendasi: 1000x1000 px</p>

                <input type="file" id="photoInput" accept="image/*" class="hidden" />
                <button type="button" onclick="document.getElementById('photoInput').click()"
                    class="px-4 py-2 bg-slate-400 text-white rounded shadow hover:bg-slate-800 transition">Upload File</button>

                <!-- Input tersembunyi untuk gambar yang sudah di-crop -->
                <input type="hidden" name="cropped_image" id="croppedImageData" />

              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button type="submit" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Tambah/Daftar</button>
              <input data-modal-hide="add-modal" type="reset" value="Batal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              </form>
          </div>
        </div>
      </div>
    </div>

    @foreach ($users as $user)

    <!-- Delete Modal -->
    <div id="delete-modal-{{ $user->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Konfirmasi Hapus Akun {{ $user->name }}
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal-{{ $user->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Perlu anda perhatikan, bahwa data akun pengguna {{ $user->name }} yang telah dihapus <span class='font-bold'>TIDAK DAPAT DIKEMBALIKAN</span>. Konfirmasi kembali apakah data akun ini dapat dihapus.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form action="{{ route('products.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">HAPUS</button>
                    </form>
                    <button data-modal-hide="delete-modal-{{ $user->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Ban Modal -->
    <div id="ban-modal-{{ $user->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Konfirmasi Ban/Block Akun {{ $user->name }}
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ban-modal-{{ $user->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Perlu anda perhatikan, bahwa akun pengguna {{ $user->name }} yang telah diblock/diban/dibatasi aksesnya <span class='font-bold'>TIDAK DAPAT LOGIN MATRIX</span>. Konfirmasi kembali apakah akun ini dapat diban.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form action="{{ route('account.ban', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-orange-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">BAN</button>
                    </form>
                    <button data-modal-hide="ban-modal-{{ $user->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Unban Modal -->
    <div id="unban-modal-{{ $user->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Konfirmasi Unban/Membebaskan Akun {{ $user->name }}
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="unban-modal-{{ $user->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Perlu anda perhatikan, bahwa akun pengguna {{ $user->name }} yang telah diunban / dibebaskan aksesnya <span class='font-bold'>DAPAT LOGIN MATRIX</span>. Konfirmasi kembali apakah akun ini dapat diunban.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form action="{{ route('account.unban', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-white bg-orange-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">UNBAN</button>
                    </form>
                    <button data-modal-hide="unban-modal-{{ $user->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="edit-modal-{{ $user->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Data Akun {{ $user->name }}
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-modal-{{ $user->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">

                  {{-- Form Add User --}}

                  @if ($errors->any())
                      <div id="toast-danger" class="flex items-center w-full p-4 mb-8 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                          <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                              </svg>
                              <span class="sr-only">Error icon</span>
                          </div>
                          <div class="ms-3 text-sm font-normal">
                              @foreach ($errors->all() as $error)
                                  {{ $error }}<br>
                              @endforeach
                          </div>
                          <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                              <span class="sr-only">Close</span>
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                          </button>
                      </div>
                  @endif

                  <div class="flex flex-row gap-8">
                    <div class="w-1/2">
                      <form action="{{ route('admin.tambahUser') }}" class="space-y-4 flex flex-col" method="POST" enctype="multipart/form-data">
                      @csrf
          
                      <label for="name" class="font-medium">Nama Pengguna:</label>
                      <input type="text" name="name" placeholder="Nama Pengguna" autofocus required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ $user->name }}" />
          
                      <label for="name" class="font-medium">Username:</label>
                      <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ $user->username }}" />
          
                      <label for="name" class="font-medium">Email:</label>
                      <div class="relative">
                        <button id="emailGuest" type="button" class="absolute right-5 top-2.5 px-2 py-1 shadow-md rounded-lg border-slate-600 bg-slate-400 text-white transform transition-transform active:scale-80">
                          Guest
                        </button>
                        <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ $user->email }}" />
                        <p class="text-xs mt-2 text-gray-400" id="alertEmailGuest">Email Default Tamu</p>
                      </div>
                      
                      <label for="phone" class="font-medium">Nomor Telepon:</label>
                      <div class="relative">
                        <button id="phoneGuest" type="button" class="absolute right-5 top-2.5 px-2 py-1 shadow-md rounded-lg border-slate-600 bg-slate-400 text-white transform transition-transform active:scale-80">
                          Guest
                        </button>
                        <input type="tel" name="phone" placeholder="No Telepon" required minlength="9" maxlength="14" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ $user->phone }}" />
                        <p class="text-xs mt-2 text-gray-400" id="alertPhoneGuest">Nomor Telepon Default Tamu</p>
                      </div>
                      
                      <label for="name" class="font-medium">Kata Sandi:</label>
                      <div class="mb-4 relative">
                          <input id="password" type="password" name="password" placeholder="Kata Sandi" minlength="8" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" value="{{ $user->password }}" />
                          <button type="button" 
                              class="absolute inset-y-0 right-3 flex items-center px-2 text-gray-600 hover:text-gray-900"
                              onclick="togglePasswordVisibility('password', 'eye-icon-password')"
                              aria-label="Toggle password visibility"
                          >
                              <svg id="eye-icon-password" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                  </path>
                              </svg>
                          </button>
                      </div>
          
                      <div class="mb-4 relative">
                          <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" minlength="8" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-600 transition" />
                          <button type="button" 
                              class="absolute inset-y-0 right-3 flex items-center px-2 text-gray-600 hover:text-gray-900"
                              onclick="togglePasswordVisibility('password_confirmation', 'eye-icon-confirmation')"
                              aria-label="Toggle password visibility"
                          >
                              <svg id="eye-icon-confirmation" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                  </path>
                              </svg>
                          </button>
                      </div>
                    </div>
        
                    <div class="w-1/2 items-center my-auto gap-4 flex flex-col p-8">
                      <img id="profilePhoto" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/ad/placeholder2.png') }}"
                      class="w-full h-auto aspect-square rounded-xl border-4 border-slate-400 object-cover" alt="Foto Profil" />
                      <p class="text-xs text-center text-gray-500">*Opsional <br />Format: PNG, JPG, JPEG, GIF<br />Rekomendasi: 1000x1000 px</p>

                      <input type="file" id="photoInput" accept="image/*" class="hidden" />
                      <button type="button" onclick="document.getElementById('photoInput').click()"
                          class="px-4 py-2 bg-slate-400 text-white rounded shadow hover:bg-slate-800 transition">Upload File</button>

                      <!-- Input tersembunyi untuk gambar yang sudah di-crop -->
                      <input type="hidden" name="cropped_image" id="croppedImageData" />

                    </div>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Update</button>
                    <input data-modal-hide="edit-modal-{{ $user->id }}" type="reset" value="Batal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <!-- Loading Modal -->
    <div id="loadingModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
      <div class="bg-white rounded-lg p-6 w-96 text-center shadow">
        <h3 class="mb-4 text-lg font-semibold text-gray-700">Meng-upload data…</h3>

        <!-- progress wrapper -->
        <div class="w-full bg-gray-200 rounded-full h-3 mb-4">
          <div id="progressBar"
              class="bg-blue-600 h-3 rounded-full transition-all duration-200"
              style="width:0%"></div>
        </div>

        <p id="progressText" class="text-sm text-gray-500">0 %</p>
      </div>
    </div>

    <!-- Modal Cropper -->
    <div id="cropperModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 bg-gray-700/25 flex justify-center items-start pt-24 overflow-auto z-50">
        <div class="bg-white rounded-lg w-11/12 max-w-3xl p-4 relative">
            <h3 class="text-lg font-semibold mb-4">Sesuaikan Foto Profil Anda</h3>
            <div class="max-h-[500px] overflow-hidden">
                <img id="imageToCrop" class="max-w-full rounded-lg" src="" alt="Image to crop"/>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <button id="cancelCropBtn" type="button" class="px-4 py-2 bg-gray-500 rounded hover:bg-gray-600 text-white">Batal</button>
                <button id="cropBtn" type="button" class="px-4 py-2 bg-slate-400 rounded hover:bg-[#445522] text-white">Crop & Simpan</button>
            </div>
        </div>
    </div>
  </section>
  
</div>

<script>
  document.getElementById('emailGuest').addEventListener('click', function(e) {
    e.preventDefault(); // Mencegah submit form jika tombol di dalam form
    document.querySelector('input[name="email"]').value = 'guest@matrix.com';
  });

  document.getElementById('phoneGuest').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('input[name="phone"]').value = '1234567890';
  });

  const guestEmail = "guest@matrix.com";
  const guestPhone = "1234567890";

  const emailInput = document.querySelector('input[name="email"]');
  const phoneInput = document.querySelector('input[name="phone"]');

  const emailGuestBtn = document.getElementById('emailGuest');
  const phoneGuestBtn = document.getElementById('phoneGuest');

  const alertEmail = document.getElementById('alertEmailGuest');
  const alertPhone = document.getElementById('alertPhoneGuest');

  // Sembunyikan alert saat awal load
  alertEmail.style.display = "none";
  alertPhone.style.display = "none";

  emailGuestBtn.addEventListener('click', function (e) {
    e.preventDefault();
    emailInput.value = guestEmail;
    alertEmail.style.display = "block";
  });

  phoneGuestBtn.addEventListener('click', function (e) {
    e.preventDefault();
    phoneInput.value = guestPhone;
    alertPhone.style.display = "block";
  });

  // Event untuk menyembunyikan alert saat field diubah
  emailInput.addEventListener('input', function () {
    if (emailInput.value !== guestEmail) {
      alertEmail.style.display = "none";
    }
  });

  phoneInput.addEventListener('input', function () {
    if (phoneInput.value !== guestPhone) {
      alertPhone.style.display = "none";
    }
  });
</script>

<!-- Cropper.js JS -->
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>


@endsection
