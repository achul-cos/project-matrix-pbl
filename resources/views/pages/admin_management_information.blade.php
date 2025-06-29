@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div id="toast-success" class="hidden fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-50" link="alert">
  <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>
  </div>
  <div id="toast-success-text" class="ms-3 text-sm font-normal">Data berhasil ditambahkan!</div>
  <button type="button" onclick="hideToast()" class="ms-auto -mx-1.5 -my-1.5 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
  </button>
</div>

@if (session('success'))
  <div id="toast-success-update" class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" link="alert">
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
  <div id="toast-danger-update" class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" link="alert">
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

<div class="flex-1 px-8 py-10">
  <section id="title">
    <h1 class="text-3xl font-bold mb-6">
      <span class="text-slate-900">Managament Information</span>
    </h1>
  </section>

  <section id="product-tools" class="flex flex-row flex-wrap gap-2 p-4 bg-gray-300 rounded-xl mb-10">
    <div data-modal-target="add-modal" data-modal-toggle="add-modal" class="p-4 bg-gray-50 border-2 border-gray-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
      <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
        <div class="inline-block relative scale-90 bg-gray-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-gray-50 z-10">
          <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
          </svg>
        </div>
        <div class="-mt-10 bg-gray-400 p-4 w-auto rounded-lg z-0 justify-center min-w-48">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            TAMBAH
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap mt-4">
            Tambahkan data info
          </div>
        </div>
      </div>
    </div>

   <a href="#editButton" class="p-4 bg-emerald-50 border-2 border-emerald-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
      <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2 min-w-48">
        <div class="inline-block relative scale-90 bg-emerald-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-emerald-50 z-10">
          <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
          </svg>
        </div>
        <div class="-mt-10 bg-emerald-400 p-4 w-auto rounded-lg z-0 justify-center min-w-48">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            EDIT
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap mt-4">
            Edit data info
          </div>
        </div>
      </div>
    </a>
     <a href="#deleteButton" class="p-4 bg-rose-50 border-2 border-rose-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
      <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2 min-w-48">
        <div class="inline-block relative scale-90 bg-rose-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-rose-50 z-10">
          <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
          </svg>
        </div>
        <div class="-mt-10 bg-rose-400 p-4 w-auto rounded-lg z-0 justify-center min-w-48">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
            HAPUS
          </div>
          <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
          <div class="font-light text-sm text-white text-center text-wrap mt-4">
            Hapus data info
          </div>
        </div>
      </div>
    </a>
  </section>

  <section id="product-table" class="bg-white p-6 rounded-2xl border-4 border-slate-800 shadow-xl">
    <table id="filter-table" class="text-left border-separate border-spacing-y-3">
      <thead>
        <tr class="bg-gray-200 text-sm text-gray-700">
          @php
            $headers = ['ID', 'Foto', 'Event', 'Deskripsi', 'Link', 'Tanggal Event', 'status', 'Aksi'];
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

        @foreach ($events as $info)
          @php
              $badgeClass = match($info->status) {
                  'aktif' => 'bg-green-100 text-green-800',
                  'tidak aktif' => 'bg-red-100 text-red-800',
                  default => 'bg-gray-300 text-gray-700'
              };
          @endphp
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3">{{ $info->id }}</td>

            <td class="p-3 flex items-center gap-3">
              <img src="{{ asset($info->image) }}" alt="thumb" class="w-10 h-10 rounded object-cover" />
            </td>
            <td class="p-3">{{ $info->name }}</td>
            <td class="p-3">{{ $info->deskripsi }}</td>
            <td class="p-3">{{ $info->link }}</td>
            <td class="p-3">{{ $info->tanggal }}</td>
            <td class="p-3">
                <span class="px-2 py-1 rounded-full {{ $info->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $info->status }}
                </span>
            </td>

            <td class="p-3 space-x-2">
              <div  id="editButton"
                    data-modal-target="edit-modal-{{ $info->id }}"
                    data-modal-toggle="edit-modal-{{ $info->id }}"
                    class="inline-block cursor-pointer bg-emerald-700 px-3 py-2 text-white rounded-md shadow active:scale-90">EDIT
              </div>

              <button id="deleteButton"
                      data-modal-target="delete-modal-{{ $info->id }}"
                      data-modal-toggle="delete-modal-{{ $info->id }}"
                      class="inline-block cursor-pointer bg-red-800 px-3 py-2 text-white rounded-md shadow active:scale-90">
                HAPUS
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>

  <section id="modal">
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
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              Tambah Data info
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

          {{-- Form Input Gambar --}}

          <form id="yourFormID" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="">
          @csrf
          <div class="flex flex-col items-center gap-4 p-8">

            <!-- Preview Gambar Input -->
            <div class="w-auto mb-2">
              <img id="preview-image0"
                  src="{{ asset('img/ad/placeholder2.png') }}"
                  alt="Preview 1"
                  class="object-cover w-full h-full aspect-auto border border-gray-300 rounded shadow-sm">
            </div>

            <!-- Input Gambar -->
            <div class="gap-4 mb-8">
              <div class="">
                <div class="">
                  <label for="image" class="block text-base text-center mb-4 font-medium text-gray-700">Gambar 1 (Utama)</label>
                  <input type="file"
                        name="image"
                        id="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        onchange="previewImage(event, 0)"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:slate-blue-500"
                        required>
                </div>
              </div>
            </div>

            <!-- Input Name -->
            <label for="name" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Nama info</label>
            <input  type="text"
                    id="name"
                    name="name"
                    placeholder=" Masukkan Nama info"
                    value="{{ old('name') }}"
                    class=" w-full rounded-full "
                    required>

            <!-- Input deskripsi -->
            <label for="deskripsi" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">deskripsi</label>
            <input  type="text"
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Masukkan deskripsi"
                    value="{{ old('deskripsi') }}"
                    class=" w-full rounded-full "
                    required>

            <!-- Input link -->
            <label for="link" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">link</label>
            <input type="url"
                    id="link"
                    name="link"
                    placeholder="link info"
                    value="{{ old('link') }}"
                    class=" w-full rounded-full"
                    required>

            <!-- Input Tanggal -->
            <label for="tanggal" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Tanggal info</label>
            <input type="date"
                   id="tanggal"
                   name="tanggal"
                   value="{{ old('tanggal') }}"
                   class="w-full rounded-full p-2 border border-gray-300"
                   required>

            <!-- input status -->
            <label for="status" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Status</label>
            <select name="status" id="status" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring" required>
              <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
              <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>

          </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Tambah</button>
            <input data-modal-hide="add-modal" type="reset" value="Batal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            </form>
        </div>
      </div>
    </div>
  </div>

  @foreach ($events as $info)

  <!-- Delete Modal -->
  <div id="delete-modal-{{ $info->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Konfirmasi Hapus Data Komputer {{ $info->name }}
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal-{{ $info->id }}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4">
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      Perlu anda perhatikan, bahwa data data komputer {{ $info->name }} warnet anda yang akan dihapus <span class='font-bold'>TIDAK DAPAT DIKEMBALIKAN</span>. Konfirmasi kembali apakah data komputer ini dapat dihapus semuanya.
                  </p>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <form action="{{ route('products.destroy', $info->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-white bg-red-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">HAPUS</button>
                  </form>
                  <button data-modal-hide="delete-modal-{{ $info->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Edit Modal -->
  <div id="edit-modal-{{ $info->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Edit Data info {{ $info->name }}
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-modal-{{ $info->id }}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>

              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4">

                {{-- Form Input Gambar --}}
                <form action="{{ route('informasi.update', $info->id) }}" method="POST" enctype="multipart/form-data" class="">
                @csrf
                @method('PUT')
                @if ($info->image)
  <img src="{{ asset($info->image) }}" alt="preview" class="w-32 h-32 object-cover mb-4">
@endif

                <div class="flex flex-col items-center gap-4 p-8">

                  <!-- Preview Gambar Input -->
                      <!-- Preview Gambar -->
                      <div class="w-auto mb-2">
                          <img id="preview-image"
                                  src="{{ $info->image ? asset($info->image) : asset('img/ad/placeholder2.png') }}"
                              alt="Preview Gambar info"
                              class="object-cover w-full h-full aspect-square border border-gray-300 rounded shadow-sm">
                      </div>

                      <!-- Input Gambar -->
                      <div class="gap-4 flex gap-y-8 flex-col mb-8">
                          <div class="">
                              <div class="">
                                  <label for="photo" class="block text-base text-center mb-4 font-medium text-gray-700">Gambar 1 (Utama)</label>
                                  <input type="file"
                                        name="image"
                                        id="image"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        onchange="previewImage(event, {{ $info->id }})"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:slate-blue-500"
                                        {{ !isset($info) ? 'required' : '' }}>
                              </div>
                          </div>
                      </div>

                      <!-- Input Nama -->
                      <label for="name" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Nama info</label>
                      <input type="text"
                            id="name"
                            name="name"
                            placeholder="Nama info"
                            value="{{ old('name', $info->name ?? '') }}"
                            class="w-full rounded-full p-2 border border-gray-300"
                            required>

                      <!-- Input Deskripsi -->
                      <label for="deskripsi" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Deskripsi</label>
                      <textarea id="deskripsi"
                              name="deskripsi"
                              placeholder="Masukkan deskripsi"
                              class="w-full rounded-lg p-2 border border-gray-300"
                              rows="4"
                              required>{{ old('deskripsi', $info->deskripsi ?? '') }}</textarea>

                      <!-- Input Link -->
                      <label for="link" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Link info</label>
                      <input type="url"
                            id="link"
                            name="link"
                            placeholder="https://example.com"
                            value="{{ old('link', $info->link ?? '') }}"
                            class="w-full rounded-full p-2 border border-gray-300"
                            required>

                      <!-- Input Tanggal -->
                      <label for="tanggal" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Tanggal info</label>
                      <input type="date"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal', $info->tanggal ?? '') }}"
                            class="w-full rounded-full p-2 border border-gray-300"
                            required>

                      <!-- Input Status -->
                      <label for="status" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Status</label>
                      <select id="status"
                            name="status"
                            class="w-full rounded-full p-2 border border-gray-300"
                            required>
                          <option value="aktif" {{ old('status', $info->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                          <option value="tidak aktif" {{ old('status', $info->status ?? '') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                      </select>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button type="submit" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Update</button>
                  <input data-modal-hide="edit-modal-{{ $info->id }}" type="reset" value="Batal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
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
  </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi DataTable
    if (document.getElementById("filter-table") && typeofsimpleDatatables && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#filter-table", {
            tableRender: (_data, table, type) => {
                if (type === "print") return table;

                const thead = table.querySelector('thead');
                if (!thead) return table;

                const filterRow = document.createElement('tr');
                filterRow.className = 'search-filtering-row';

                table.querySelectorAll('thead th').forEach((th, index) => {
                    const filterTh = document.createElement('th');
                    const input = document.createElement('input');
                    input.className = 'datatable-input';
                    input.type = 'search';
                    input.dataset.columns = `[${index}]`;
                    filterTh.appendChild(input);
                    filterRow.appendChild(filterTh);
                });

                thead.appendChild(filterRow);
                return table;
            }
        });
    }

    // Auto-hide toast
    const toast = document.getElementById('toast-success');
    if (toast) {
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 5000);
    }
});

function previewImage(info, number) {
    const input = info.target;
    const preview = document.getElementById(`preview-image${number}`);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function hideToast() {
    const toast = document.getElementById('toast-success');
    if (toast) {
        toast.classList.add('hidden');
    }
}
</script>

@endsection
