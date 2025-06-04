@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
<div class="">
  <!-- Main Content -->
  {{-- <section class="flex-1 px-8 py-10">
    <h1 class="text-3xl font-bold mb-6">
      <span class="text-slate-900">Managament Computer</span>
    </h1>

    <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
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
            <th class="p-3">Processor</th>
            <th class="p-3 rounded-1-lg">GPU</th>
            <th class="p-3">RAM</th>
            <th class="p-3 rounded-1-lg">Ruangan</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3 flex items-center space-x-3">
              <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
              <span>Asus</span>
            </td>
            <td class="p-3">AMD</td>
            <td class="p-3">RTX</td>
            <td class="p-3">8 GB</td>
            <td class="p-3">Private Room</td>
            </tr>
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3 flex items-center space-x-3">
              <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
              <span>Lenovo</span>
            </td>
            <td class="p-3">AMD</td>
            <td class="p-3">RTX</td>
            <td class="p-3">12 GB</td>
            <td class="p-3">Public Room</td>
          </tr>
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3 flex items-center space-x-3">
              <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
              <span>Acer A</span>
            </td>
            <td class="p-3">AMD</td>
            <td class="p-3">RTX</td>
            <td class="p-3">8 GB</td>
            <td class="p-3">Private Room</td>
          </tr>
          </tr>
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3 flex items-center space-x-3">
              <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
              <span>Lenovo B</span>
            </td>
            <td class="p-3">AMD</td>
            <td class="p-3">RTX</td>
            <td class="p-3">8 GB</td>
            <td class="p-3">Private Room</td>
          </tr>
          </tr>
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3 flex items-center space-x-3">
              <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
              <span>Lenovo C</span>
              <td class="p-3">AMD</td>
              <td class="p-3">RTX</td>
              <td class="p-3">8 GB</td>
              <td class="p-3">Public Room</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section> --}}

  <section class="flex-1 px-8 py-10">
    <h1 class="text-3xl font-bold mb-6">
      <span class="text-slate-900">Managament Computer</span>
    </h1>

    @php
        $monitors = config('data_product_dummy.monitors');
        $statusColorMap = config('data_product_dummy.statusColorMap');
    @endphp

    {{-- @include('components.computer-monitor', ['monitors' => $monitors]) --}}

    <div class="flex flex-wrap gap-2 p-4 bg-gray-300 rounded-xl mb-10 align-middle">
      <div class="p-4 bg-gray-50 border-2 border-gray-300 shadow-lg rounded-2xl min-w-1/6 justify-items-center">
        <div class="relative scale-90 bg-gray-400 p-4 rounded-full border-4 transform transition-transform duration-100 hover:scale-100 border-gray-50 z-10">
          <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
          </svg>
        </div>
        <div class="-mt-8 min-w-32 bg-gray-400 p-4 rounded-lg z-0 flex justify-center">
          <div class="mt-6 text-white font-bold">
            TAMBAH
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border-4 border-slate-800 shadow-xl">
        <!-- Table -->
        <table class="min-w-full text-left border-separate border-spacing-y-3" id="filter-table">
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
                        <td class="p-3">{{ $monitor['id_komputer'] }}</td>
                        <td class="p-3">{{ $monitor['kode_komputer'] }}</td>
                        <td class="p-3 flex items-center space-x-3">
                            <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                            <span>{{ $monitor['nama_komputer'] }}</span>
                        </td>
                        <td class="p-3">{{ $monitor['lantai_komputer'] }}</td>
                        <td class="p-3">{{ $monitor['room_komputer'] }}</td>
                        <td class="p-3">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $badgeClass }}">
                                {{ ucfirst($monitor['status_komputer']) }}
                            </span>
                        </td>
                        <td class="">
                          <button class="inline-block bg-emerald-700 px-3 py-2 font-bold text-white border-1 border-gray-800 rounded-md shadow-md active:bg-emerald-900 active:scale-90">EDIT</button>
                          <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="inline-block bg-red-800 px-3 py-2 font-bold text-white border-1 border-gray-800 rounded-md shadow-md active:bg-red-900 active:scale-90">HAPUS</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </section>

  <section>
    <!-- Main modal -->
    <div id="delete-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Konfirmasi Hapus Komputer
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Perlu anda perhatikan, bahwa data komputer yang anda hapus <span class="font-bold">TIDAK DAPAT DIKEMBALIKAN</span>. Konfirmasi kembali apakah data komputer ini dapat dihapus.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="delete-modal" type="button" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Hapus</button>
                  <button data-modal-hide="delete-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-slate-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </div>
        </div>
    </div>
  </section>
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

@endsection
