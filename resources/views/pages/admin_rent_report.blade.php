@extends('layout.dashboard')

@section('title', 'Matrix - Rent Report')

@section('content')
<div class="flex">
  <!-- Sidebar otomatis dari layout -->

  <!-- Main Content -->
  <section class="flex-1 px-8 py-10">
    <h1 class="text-3xl font-bold mb-6">
      <span class="text-[#8F2D2D]">Rent</span> Report
    </h1>

    
<div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between">
    <div>
      <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      12%
      <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
      </svg>
    </div>
  </div>
  <div id="area-chart"></div>
  <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-between items-center pt-5">
      <!-- Button -->
      <button
        id="dropdownDefaultButton"
        data-dropdown-toggle="lastDaysdropdown"
        data-dropdown-placement="bottom"
        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
        type="button">
        Last 7 days
        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
            </li>
          </ul>
      </div>
      <a
        href="#"
        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
        Users Report
        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
      </a>
    </div>
  </div>
</div>


    <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
      <!-- Search & Filter -->
      <form method="GET" action="" class="flex flex-col md:flex-row justify-between gap-4 mb-6">
        <div class="flex items-center w-full md:w-1/2 border border-gray-300 rounded-xl px-4 py-2">
          <input name="search" type="text" value="" placeholder="Search Nama atau Komputer" class="bg-transparent w-full focus:outline-none text-gray-800" />
        </div>
        <div class="flex gap-4">
          <button type="submit" class="bg-[#8F2D2D] hover:bg-[#731F1F] text-white px-4 py-2 rounded-xl transition font-semibold shadow-md hover:shadow-lg">
            Search
          </button>
          <button type="button" class="bg-[#8F2D2D] hover:bg-[#731F1F] text-white px-4 py-2 rounded-xl transition font-semibold shadow-md hover:shadow-lg">
            + Export to PDF
          </button>
        </div>
      </form>

      @php

        $rents = [
          [
           'nama' => 'Lorem ipsum dolor sit amet.',
           'komputer' => 'Lorem ipsum dolor sit amet.',
           'spesifikasi' => 'Lorem ipsum dolor sit amet.',
           'jumlah_token' => '99',
           'waktu_mulai' => '10-11-2005 10:10',
           'waktu_akhir' => '11.11',
           'status' => 'selesai', 
          ],    
        ];
      
      @endphp

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full text-left border-separate border-spacing-y-3">
          <thead>
            <tr class="bg-[#8F2D2D] text-white text-sm">
              <th class="p-3 rounded-l-lg">Nama</th>
              <th class="p-3">Komputer</th>
              <th class="p-3">Spesifikasi</th>
              <th class="p-3">Jumlah Token</th>
              <th class="p-3">Waktu Mulai</th>
              <th class="p-3">Waktu Berakhir</th>
              <th class="p-3 rounded-r-lg">Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($rents as $rent)
              <tr class="bg-gray-100 rounded-xl hover:bg-gray-200 transition shadow-sm hover:shadow-md">
                <td class="p-3 flex items-center space-x-3">
                  <img src="{{ asset('img/ad/placeholder1.png') }}" class="w-10 h-10 rounded-full object-cover" />
                  <span class="font-semibold">{{ $rent['nama'] }}</span>
                </td>
                <td class="p-3">{{ $rent['komputer'] }}</td>
                <td class="p-3">{{ $rent['spesifikasi'] }}</td>
                <td class="p-3">{{ $rent['jumlah_token'] }} Token</td>
                <td class="p-3">
                  {{ \Carbon\Carbon::parse($rent['waktu_mulai'])->format('H:i') }}<br>
                  {{ \Carbon\Carbon::parse($rent['waktu_mulai'])->translatedFormat('d F Y') }}
                </td>
                <td class="p-3">
                  {{ \Carbon\Carbon::parse($rent['waktu_akhir'])->format('H:i') }}<br>
                  {{ \Carbon\Carbon::parse($rent['waktu_akhir'])->translatedFormat('d F Y') }}
                </td>
                <td class="p-3">
                  @if ($rent['status'] == 'selesai')
                    <span class="bg-green-200 text-green-800 px-3 py-1 text-xs font-semibold rounded-full">Selesai</span>
                  @else
                    <span class="bg-yellow-200 text-yellow-800 px-3 py-1 text-xs font-semibold rounded-full">Proses</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center py-6">Tidak ada data ditemukan.</td>
              </tr>
            @endforelse
          </tbody>
          
        </table>
      </div>

    </div>

  </section>
</div>

<script>
  const options = {
    chart: {
      height: "100%",
      maxWidth: "100%",
      type: "area",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    tooltip: {
      enabled: true,
      x: {
        show: false,
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: "#1C64F2",
        gradientToColors: ["#1C64F2"],
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 6,
    },
    grid: {
      show: false,
      strokeDashArray: 4,
      padding: {
        left: 2,
        right: 2,
        top: 0
      },
    },
    series: [
      {
        name: "New users",
        data: [6500, 6418, 6456, 6526, 6356, 6456],
        color: "#1A56DB",
      },
    ],
    xaxis: {
      categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    yaxis: {
      show: false,
    },
  }

  if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("area-chart"), options);
    chart.render();
  }
</script>
@endsection
