@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@php
    $monitors = config('data_product_dummy.monitors');
    $statusColorMap = config('data_product_dummy.statusColorMap');
@endphp

@section('content')

<div id="toast-success" class="hidden fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-50" role="alert">
  <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>
  </div>
  <div id="toast-success-text" class="ms-3 text-sm font-normal">Data berhasil ditambahkan!</div>
  <button type="button" onclick="hideToast()" class="ms-auto -mx-1.5 -my-1.5 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
  </button>
</div>

@if(session('success'))
  <script>
    setTimeout(() => {
      const toast = document.getElementById('toast-success');
      if (toast) toast.classList.remove('hidden');
    }, 500);
  </script>
@endif 

<div class="w-full">
  <section class="flex-1 px-8 py-10">
    <h1 class="text-3xl font-bold mb-6">
      <span class="text-slate-900">Managament Computer</span>
    </h1>

    <div class="flex flex-row flex-wrap gap-2 p-4 bg-gray-300 rounded-xl mb-10">
      <div class="p-4 bg-gray-50 border-2 border-gray-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
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
              Tambahkan data komputer warnet.
            </div>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.monitoring_computer') }}" class="p-4 bg-slate-50 border-2 border-slate-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
        <div class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2">
          <div class="inline-block relative scale-90 bg-slate-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 active:scale-70 border-slate-50 z-10">
            <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z"/>
            </svg>
          </div>
          <div class="-mt-10 bg-slate-400 p-4 w-auto rounded-lg z-0 justify-center">
            <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">
              MONITOR
            </div>
            <hr class="w-auto mt-3 h-0.5 rounded-full bg-white border-0 mx-6 transform transition-transform group-hover:scale-135">
            <div class="font-light text-sm text-white text-center text-wrap max-w-36 mt-4">
              Monitoring komputer warnet.
            </div>
          </div>
        </div>
      </a>
      <a href="#editButton" class="p-4 bg-emerald-50 border-2 border-emerald-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
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
              Edit data komputer warnet.
            </div>
          </div>
        </div>
      </a>
      <a href="#deleteButton" class="p-4 bg-rose-50 border-2 border-rose-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
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
              Hapus data komputer warnet.
            </div>
          </div>
        </div>
      </a>
      <div class="p-4 bg-red-50 border-2 border-red-300 shadow-lg rounded-2xl min-w-1/6 justify-center align-middle">
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
              Hapus SELURUH data komputer warnet.
            </div>
          </div>
        </div>
      </div>      
    </div>

    <div class="bg-white p-6 rounded-2xl border-4 border-slate-800 shadow-xl">
      <!-- Table -->
      {{-- <table class="text-left border-separate border-spacing-y-3" id="filter-table">
          <thead>
              <tr class="bg-gray-200 text-sm text-gray-700">
                  @php
                      $headers = ['ID', 'Kode', 'Nama', 'Lantai', 'Ruangan', 'Status', 'Action'];
                  @endphp

                  @foreach($headers as $index => $header)
                      <th class="p-3 {{ $index === 0 ? 'rounded-l-lg' : '' }} {{ $index === count($headers) - 1 ? 'rounded-r-lg' : '' }}">
                          <span class="flex items-center">
                              {{ $header }}
                              <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                              </svg>
                          </span>
                      </th>
                  @endforeach
              </tr>
          </thead>
          <tbody>
              @foreach ($monitors as $monitor)
                  @php
                      $status = strtolower($monitor['status_komputer']);
                      $badgeClass = $statusColorMap[$status] ?? 'bg-gray-300 text-gray-700';
                  @endphp
                  <tr class="bg-gray-100 rounded-xl">
                      <td class="p-1">{{ $monitor['id_komputer'] }}</td>
                      <td class="p-1">{{ $monitor['kode_komputer'] }}</td>
                      <td class="p-1 flex items-center space-x-3">
                          <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                          <span>{{ $monitor['nama_komputer'] }}</span>
                      </td>
                      <td class="p-1">{{ $monitor['lantai_komputer'] }}</td>
                      <td class="p-1">{{ $monitor['room_komputer'] }}</td>
                      <td class="p-1">
                          <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $badgeClass }}">
                              {{ ucfirst($monitor['status_komputer']) }}
                          </span>
                      </td>
                      <td class="">
                        <button id="editButton" class="inline-block bg-emerald-700 px-3 py-2 font-bold text-white border-1 border-gray-800 rounded-md shadow-md active:bg-emerald-900 active:scale-90">EDIT</button>
                        <button id="deleteButton" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="inline-block bg-red-800 px-3 py-2 font-bold text-white border-1 border-gray-800 rounded-md shadow-md active:bg-red-900 active:scale-90">HAPUS</button>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table> --}}
      <table id="filter-table" class="text-left w-full border-separate border-spacing-y-3">
        <thead>
          <tr class="bg-gray-200 text-sm text-gray-700">
            @php
              $headers = ['ID', 'Kode', 'Nama', 'Lantai', 'Ruangan', 'Status', 'Action'];
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
          @foreach ($products as $product)
            @php
              $badgeClass = $statusColorMap[$product->status] ?? 'bg-gray-300 text-gray-700';
            @endphp
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3">{{ $product->id }}</td>
              <td class="p-3">{{ $product->code }}</td>

              <td class="p-3 flex items-center gap-3">
                <img src="{{ asset($product->image1) }}" alt="thumb" class="w-10 h-10 rounded object-cover" />
                <span>{{ $product->name }}</span>
              </td>

              <td class="p-3">{{ $product->floor }}</td>
              <td class="p-3 capitalize">{{ $product->room }}</td>

              <td class="p-3">
                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $badgeClass }}">
                  {{ ucfirst($product->status) }}
                </span>
              </td>

              <td class="p-3 space-x-2">
                <a href=""
                  class="inline-block bg-emerald-700 px-3 py-2 text-white rounded-md shadow active:scale-90">EDIT</a>

                <button data-modal-target="delete-modal-{{ $product->id }}"
                        data-modal-toggle="delete-modal-{{ $product->id }}"
                        class="inline-block bg-red-800 px-3 py-2 text-white rounded-md shadow active:scale-90">
                  HAPUS
                </button>
                {{-- Modal konfirmasi delete per item (optional) --}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{-- Paginate link --}}
      <div class="mt-4">{{ $products->links() }}</div>

    </div>
  </section>

  <!-- Delete Modal -->
  <x-admin-modal
    modalId="delete-modal"
    modalTitle="Konfirmasi Hapus Komputer"
    :modalBody="'
    <p class=\'text-base leading-relaxed text-gray-500 dark:text-gray-400\'>
      Perlu anda perhatikan, bahwa data komputer yang anda hapus <span class=\'font-bold\'>TIDAK DAPAT DIKEMBALIKAN</span>. Konfirmasi kembali apakah data komputer ini dapat dihapus.
    </p>'"
    modalForm="#"
    modalMethod="get"
    modalYesButton="Hapus"
    modalNoButton="Batal" 
  />

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
                  <form action="{{ route('produk.deleteAll') }}" method="POST">
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
              Tambah Data Komputer
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

          <form id="yourFormID" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="">
          @csrf
          <div class="flex flex-col items-center gap-4 p-8">

            <!-- Preview Gambar Input -->
                <div class="w-auto mb-2">
                    <img id="preview-image1"
                        src="{{ asset('img/ad/placeholder2.png') }}"
                        alt="Preview 1"
                        class="object-cover w-full h-full aspect-square border border-gray-300 rounded shadow-sm">
                </div>
                <div class="flex flex-row mb-2 justify-between flex-wrap">
                    <img id="preview-image2"
                        src="{{ asset('img/ad/placeholder2.png') }}"
                        alt="Preview 2"
                        class="object-cover w-3/10 aspect-square border border-gray-300 rounded shadow-sm">
                    <img id="preview-image3"
                        src="{{ asset('img/ad/placeholder2.png') }}"
                        alt="Preview 3"
                        class="object-cover w-3/10 aspect-square border border-gray-300 rounded shadow-sm">
                    <img id="preview-image4"
                        src="{{ asset('img/ad/placeholder2.png') }}"
                        alt="Preview 4"
                        class="object-cover w-3/10 aspect-square border border-gray-300 rounded shadow-sm">
                </div>

            <!-- Input Gambar -->
            <div class="flex flex-row gap-4 mb-8">
              <div class="">
                <div class="">
                  <label for="image1" class="block text-base text-center mb-4 font-medium text-gray-700">Gambar 1 (Utama)</label>
                  <input type="file"
                        name="image1"
                        id="image1"
                        accept=".jpg,.jpeg,.png,.webp"
                        onchange="previewImage(event, 1)"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:slate-blue-500"
                        required>
                </div>
                <div class="mt-8">
                  <label for="image2" class="block text-base text-center mb-4 font-medium text-gray-700">Gambar 2</label>
                  <input type="file"
                        name="image2"
                        id="image2"
                        accept=".jpg,.jpeg,.png,.webp"
                        onchange="previewImage(event, 2)"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:slate-blue-500"
                        required>
                </div>
              </div>
              <div class="">
                <div class="">
                  <label for="image3" class="block text-base text-center mb-4 font-medium text-gray-700">Gambar 3</label>
                  <input type="file"
                        name="image3"
                        id="image3"
                        accept=".jpg,.jpeg,.png,.webp"
                        onchange="previewImage(event, 3)"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:slate-blue-500"
                        required>
                </div>
                <div class="mt-8">
                  <label for="image4" class="block text-base text-center mb-4 font-medium text-gray-700">Gambar 4</label>
                  <input type="file"
                        name="image4"
                        id="image4"
                        accept=".jpg,.jpeg,.png,.webp"
                        onchange="previewImage(event, 4)"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:slate-blue-500"
                        required>
                </div>
              </div>
            </div>

            <!-- Input Name -->
            <label for="name" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Nama Komputer</label>
            <input  type="text"
                    id="name"
                    name="name"
                    placeholder="Nama Komputer"
                    value="{{ old('name') }}"
                    class=" w-full rounded-full "
                    required>
            
            <!-- Input RAM -->
            <label for="ram" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Jumlah Ram Komputer (GB)</label>
            <input  type="number"
                    id="ram"
                    name="ram"
                    placeholder="Jumlah Ram Komputer (Contoh: 8, 16)"
                    value="{{ old('ram') }}"
                    class=" w-full rounded-full "
                    min="1"
                    step="1"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    required>

            <!-- Input CPU -->
            <label for="cpu" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Jenis CPU Komputer</label>
            <input  type="text"
                    id="cpu"
                    name="cpu"
                    placeholder="Jenis CPU Komputer (Contoh: Intel i9-45000k, AMD Ryzen 5500H)"
                    value="{{ old('cpu') }}"
                    class=" w-full rounded-full "
                    list="cpu-options"
                    required>

            <datalist id="cpu-options">
              <option value="Intel Core i3">
              <option value="Intel Core i5">
              <option value="Intel Core i7">
              <option value="Intel Core i9">
              <option value="AMD Ryzen 3">
              <option value="AMD Ryzen 5">
              <option value="AMD Ryzen 7">
              <option value="AMD Ryzen 9">
            </datalist>

            <!-- Input GPU -->
            <label for="gpu" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Jenis GPU Komputer</label>
            <input  type="text"
                    id="gpu"
                    name="gpu"
                    placeholder="Jenis GPU Komputer (Contoh: RTX 3060, GTX 1650 TI)"
                    value="{{ old('gpu') }}"
                    class=" w-full rounded-full "
                    list="gpu-options"
                    required>
                    
            <datalist id="gpu-options">
              <option value="RTX">
              <option value="GTX">
            </datalist>

            <!-- Input lantai -->
            <label for="floor" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Lokasi Lantai Komputer</label>
            <select id="floor"
                    name="floor"
                    placeholder="Lokasi Lantai Komputer (Contoh: 1 hingga 4)"
                    value="{{ old('floor') }}"
                    class=" w-full rounded-full"
                    required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            </select>

            <!-- Input Biaya -->
            <label for="price" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Jumlah Biaya Sewa Komputer (Per Jam)</label>
            <input  type="number"
                    id="price"
                    name="price"
                    placeholder="Jumlah Biaya Sewa Komputer Per Jam (Contoh: 2, 4)"
                    value="{{ old('price') }}"
                    class=" w-full rounded-full "
                    min="1"
                    step="1"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    required>

            <!-- Input Room -->
            <label for="room" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Ruangan Komputer</label>
            <select id="room"
                    name="room"
                    placeholder="Ruangan Komputer (Contoh: Public dan Private)"
                    value="{{ old('room') }}"
                    class=" w-full rounded-full"
                    required>
            <option>public</option>
            <option>private</option>
            </select>

            <!-- Input Description -->
            <label for="desc" class="self-start rounded-md bg-slate-700 text-white inline-block px-4 py-2 font-bold">Deskripsi Komputer</label>
            <textarea id="desc"
                      rows="4"
                      name="desc"
                      placeholder="Deskripsi Komputer..."
                      value="{{ old('desc') }}"
                      class="w-full rounded-2xl"
                      required>
            </textarea>
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
</div>

<script>
    if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#filter-table", {
            tableRender: (_data, table, type) => {
                if (type === "print") {
                    return table
                }
                const tHead = table.childNodes[0]
                const filterHeaders = {
                    nodeName: "TR",
                    attributes: {
                        class: "search-filtering-row"
                    },
                    childNodes: tHead.childNodes[0].childNodes.map(
                        (_th, index) => ({nodeName: "TH",
                            childNodes: [
                                {
                                    nodeName: "INPUT",
                                    attributes: {
                                        class: "datatable-input",
                                        type: "search",
                                        "data-columns": "[" + index + "]"
                                    }
                                }
                            ]})
                    )
                }
                tHead.childNodes.push(filterHeaders)
                return table
            }
        });
    }
</script>

<!-- JavaScript -->
<script>
    function previewImage(event, index) {
        const input = event.target;
        const preview = document.getElementById(`preview-image${index}`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', () => { 
  const form         = document.querySelector('#yourFormID');
  const loadingModal = document.getElementById('loadingModal');
  const bar          = document.getElementById('progressBar');
  const txt          = document.getElementById('progressText');

  form.addEventListener('submit', e => {
    e.preventDefault();                // stop form default submit
    showLoading();                     // tampilkan modal
    uploadWithXHR(new FormData(form)); // mulai upload
  });

  function showLoading() {
    loadingModal.classList.remove('hidden');
    loadingModal.classList.add('flex');
    bar.style.width = '0%';
    txt.textContent = '0 %';
  }

  function uploadWithXHR(formData){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);

    // CSRF header (Laravel)
    const token = document.querySelector('meta[name="csrf-token"]').content;
    xhr.setRequestHeader('X-CSRF-TOKEN', token);

    // Tambahkan header agar Laravel tahu ini AJAX request
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    // update progress bar
    xhr.upload.addEventListener('progress', e => {
      if (e.lengthComputable) {
        const pct = Math.round((e.loaded / e.total) * 100);
        bar.style.width = pct + '%';
        txt.textContent = pct + ' %';
      }
    });

    // selesai
    xhr.onreadystatechange = () => {
      if (xhr.readyState === 4) {
        bar.style.width = '100%';
        txt.textContent = '100 %';
        if (xhr.status === 200) {
          setTimeout(() => {
            const res = JSON.parse(xhr.responseText);

            // Sembunyikan modal loading
            loadingModal.classList.add('hidden');

            // Tampilkan toast
            const toast = document.getElementById('toast-success');
            const text = document.getElementById('toast-success-text');
            toast.classList.remove('hidden');
            text.textContent = res.success || 'Berhasil!';

            // Auto hide setelah 5 detik
            setTimeout(() => {
              toast.classList.add('hidden');
            }, 5000);

            // Redirect opsional
            // window.location.href = res.redirect;
          }, 500);
        } else if (xhr.status === 422) {
          const res = JSON.parse(xhr.responseText);
          alert("Validasi gagal:\n" + Object.values(res.errors).flat().join("\n"));
          loadingModal.classList.add('hidden');
        } else {
          alert('Upload gagal!');
          loadingModal.classList.add('hidden');
        }
      }
    };

    xhr.send(formData);
  }
});
</script>


@endsection
