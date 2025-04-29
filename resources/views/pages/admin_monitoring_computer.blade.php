@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
{{-- Tempat Kode Frontend halaman Monitoring Computer --}}
@extends('layout.dashboard')
<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Monitoring Computer</span>
      </h1>

    @php
        $monitors = config('data_product_dummy.monitors');
        $statusColorMap = config('data_product_dummy.statusColorMap');
    @endphp

      @include('components.computer-monitor', ['monitors' => $monitors])

        <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
            <!-- Table -->
            <table class="min-w-full text-left border-separate border-spacing-y-3" id="filter-table">
                <thead>
                    <tr class="bg-gray-200 text-sm text-gray-700">
                        @php
                            $headers = ['ID', 'Kode', 'Nama', 'Lantai', 'Ruangan', 'Status'];
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Monitoring Computer</span>
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
              <th class="p-3">Ruangan</th>
              <th class="p-3 rounded-r-lg">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Lenovo A</span>
              </td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
                <span class="bg-red-200 text-red-800 px-3 py-1 text-xs font-semibold rounded-full">In Use</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Asus A</span>
              </td>
              <td class="p-3">Public Room</td>
              <td class="p-3">
                <span class="bg-orange-200 text-orange-800 px-3 py-1 text-xs font-semibold rounded-full">Maintenance</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Acer A</span>
              </td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Available</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Lenovo B</span>
              </td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
                <span class="bg-gray-300 text-gray-700 px-3 py-1 text-xs font-semibold rounded-full">Unavailable</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Asus A</span>
              </td>
              <td class="p-3">Public Room</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Available</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>

@endsection
