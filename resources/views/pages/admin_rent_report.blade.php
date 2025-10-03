@extends('layout.dashboard')

@section('title', 'Matrix - Rent Report')

@section('content')
<section class="px-8 py-10">
  <h1 class="text-3xl font-bold mb-6">
    <span class="text-[#8F2D2D]">Rent</span> Report
  </h1>

  <!-- Statistik Utama -->
  <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between">
      <div>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{ $totalSewaSebulanTerakhir }}</h5>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Penyewaan Bulan Ini ({{ $startDateFormatted }} - {{ $endDateFormatted }})</p>
      </div>
      <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-{{ $textColor }} text-center">
        @if (is_null($persentasePerubahan))
          <p>📊 Tidak tersedia data bulan sebelumnya untuk menghitung persentase perubahan.</p>
        @else
          @if ($persentasePerubahan > 0)
            <p>📈 Penyewaan naik {{ number_format($persentasePerubahan, 2) }}% dibanding bulan sebelumnya.</p>
          @elseif ($persentasePerubahan < 0)
            <p>📉 Penyewaan turun {{ number_format(abs($persentasePerubahan), 2) }}% dibanding bulan sebelumnya.</p>
          @else
            <p>📊 Tidak ada perubahan jumlah penyewaan dibanding bulan sebelumnya.</p>
          @endif
        @endif
      </div>
    </div>
    <div id="area-chart"></div>
  </div>

  <!-- Analisis Produk Populer -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
    <div class="bg-white p-6 rounded-2xl border-2 border-[#8F2D2D] shadow-lg">
      <h3 class="text-xl font-bold mb-4 flex items-center">
        <svg class="w-6 h-6 mr-2 text-[#8F2D2D]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
        </svg>
        Produk Paling Populer (Sepanjang Masa)
      </h3>
      <ul class="space-y-3">
        @foreach($produkPopulerSepanjangMasa as $index => $produk)
        <li class="flex items-start p-3 bg-gray-50 rounded-lg">
          <span class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-[#8F2D2D] text-white rounded-full mr-3">{{ $index + 1 }}</span>
          <div class="flex items-start space-x-3 w-full">
            <!-- Foto Produk -->
            <div class="flex-shrink-0">
              <img src="{{ asset($produk->image1) ?? asset('img/ad/placeholder2.png') }}" alt="{{ $produk->name }}" 
                   class="w-16 h-16 object-cover rounded-lg border border-gray-300">
            </div>
            
            <!-- Detail Produk -->
            <div class="flex-1 min-w-0">
              <div class="flex items-baseline justify-between">
                <span class="font-semibold truncate">{{ $produk->name }}</span>
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full ml-2 flex-shrink-0">
                  {{ $produk->rentals_count }}x disewa
                </span>
              </div>
              
              <div class="text-sm text-gray-600 mb-1">
                <span class="font-mono">{{ $produk->code }}</span>
              </div>
              
              <!-- Spesifikasi Produk -->
              <div class="text-xs text-gray-500 space-y-1">
                <div class="flex">
                  <span class="font-medium w-10">CPU:</span>
                  <span class="truncate">{{ $produk->cpu }}</span>
                </div>
                <div class="flex">
                  <span class="font-medium w-10">GPU:</span>
                  <span class="truncate">{{ $produk->gpu }}</span>
                </div>
                <div class="flex">
                  <span class="font-medium w-10">RAM:</span>
                  <span>{{ $produk->ram }} GB</span>
                </div>
                <div class="flex">
                  <span class="font-medium w-10">Lantai:</span>
                  <span>{{ $produk->floor }}</span>
                </div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>

    <div class="bg-white p-6 rounded-2xl border-2 border-[#8F2D2D] shadow-lg">
      <h3 class="text-xl font-bold mb-4 flex items-center">
        <svg class="w-6 h-6 mr-2 text-[#8F2D2D]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
        </svg>
        Produk Paling Populer (Bulan Ini)
      </h3>
      <ul class="space-y-3">
        @foreach($produkPopulerBulanIni as $index => $produk)
        <li class="flex items-start p-3 bg-gray-50 rounded-lg">
          <span class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-[#8F2D2D] text-white rounded-full mr-3">{{ $index + 1 }}</span>
          <div class="flex items-start space-x-3 w-full">
            <!-- Foto Produk -->
            <div class="flex-shrink-0">
              <img src="{{ asset($produk->image1 ?? asset('img/ad/placeholder2.png')) }}" alt="{{ $produk->name }}" 
                   class="w-16 h-16 object-cover rounded-lg border border-gray-300">
            </div>
            
            <!-- Detail Produk -->
            <div class="flex-1 min-w-0">
              <div class="flex items-baseline justify-between">
                <span class="font-semibold truncate">{{ $produk->name }}</span>
                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full ml-2 flex-shrink-0">
                  {{ $produk->rentals_count }}x disewa
                </span>
              </div>
              
              <div class="text-sm text-gray-600 mb-1">
                <span class="font-mono">{{ $produk->code }}</span>
              </div>
              
              <!-- Spesifikasi Produk -->
              <div class="text-xs text-gray-500 space-y-1">
                <div class="flex">
                  <span class="font-medium w-10">CPU:</span>
                  <span class="truncate">{{ $produk->cpu }}</span>
                </div>
                <div class="flex">
                  <span class="font-medium w-10">GPU:</span>
                  <span class="truncate">{{ $produk->gpu }}</span>
                </div>
                <div class="flex">
                  <span class="font-medium w-10">RAM:</span>
                  <span>{{ $produk->ram }} GB</span>
                </div>
                <div class="flex">
                  <span class="font-medium w-10">Lantai:</span>
                  <span>{{ $produk->floor }}</span>
                </div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>

  <!-- Grafik Spesifikasi -->
  <div class="mt-8">
    <h3 class="text-xl font-bold mb-4 flex items-center">
      <svg class="w-6 h-6 mr-2 text-[#8F2D2D]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
      </svg>
      Analisis Penyewaan Berdasarkan Spesifikasi
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-2xl border-2 border-[#8F2D2D] shadow-lg">
        <h4 class="font-bold mb-4 text-center">CPU</h4>
        <div id="cpu-chart"></div>
      </div>
      <div class="bg-white p-6 rounded-2xl border-2 border-[#8F2D2D] shadow-lg">
        <h4 class="font-bold mb-4 text-center">GPU</h4>
        <div id="gpu-chart"></div>
      </div>
      <div class="bg-white p-6 rounded-2xl border-2 border-[#8F2D2D] shadow-lg">
        <h4 class="font-bold mb-4 text-center">RAM</h4>
        <div id="ram-chart"></div>
      </div>
    </div>
  </div>

  <!-- Tabel Penyewaan -->
  <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl mt-8">
    <h3 class="text-xl font-bold mb-4 flex items-center">
      <svg class="w-6 h-6 mr-2 text-[#8F2D2D]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
      </svg>
      Riwayat Penyewaan
    </h3>
    <table class="w-full text-left border-separate border-spacing-y-3" id="filter-table">
      <thead>
        <tr class="bg-gray-200 text-sm text-gray-700">
          @php
            $headers = ['ID', 'ID PC', 'Kode', 'Nama', 'Waktu Mulai', 'Waktu Selesai', 'Kode Aktivasi', 'Status'];
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
        @foreach ($rentals as $rental)
          <tr class="bg-gray-100 rounded-xl">
            <td class="p-3">{{ $rental->id }}</td>
            <td class="p-3">{{ $rental->product_id }}</td>
            <td class="p-3">{{ $rental->product->code }}</td>
            <td class="p-3">{{ $rental->product->name }}</td>
            <td class="p-3">{{ $rental->booked_start->format('Y-m-d H:i') }}</td>
            <td class="p-3">{{ $rental->booked_end->format('Y-m-d H:i') }}</td>
            <td class="p-3 font-mono">{{ $rental->activation_code ?? '-' }}</td>
            <td class="p-3">
              <span class="px-2 py-1 rounded-full text-xs 
                {{ $rental->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                {{ $rental->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                {{ $rental->status === 'active' ? 'bg-blue-100 text-blue-800' : '' }}">
                {{ ucfirst($rental->status) }}
              </span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

<!-- Script -->
<script>
  // Chart utama
  const areaOptions = {
    chart: {
      height: "100%",
      maxWidth: "100%",
      type: "area",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
    },
    tooltip: {
      enabled: true,
      x: {
        show: true,
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: "#8F2D2D",
        gradientToColors: ["#8F2D2D"],
      },
    },
    dataLabels: {
      enabled: true,
    },
    stroke: {
      width: 6,
      colors: ["#8F2D2D"],
    },
    grid: {
      show: true,
      strokeDashArray: 4,
      padding: {
        left: 2,
        right: 2,
        top: 0
      },
    },
    series: [
      {
        name: "Jumlah Penyewaan",
        data: @json($data),
        color: "#8F2D2D",
      },
    ],
    xaxis: {
      categories: @json($categories),
      labels: {
        show: true,
      },
      axisBorder: {
        show: true,
      },
      axisTicks: {
        show: true,
      },
    },
    yaxis: {
      show: true,
      labels: {
        formatter: function(val) {
          return Math.round(val);
        }
      }
    },
  };

  // Chart CPU
  const cpuOptions = {
    series: [{
      name: "Jumlah",
      data: @json(array_values($cpuCounts))
    }],
    chart: {
      type: 'bar',
      height: 300,
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '70%',
        endingShape: 'rounded',
        borderRadius: 4,
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: @json(array_keys($cpuCounts)),
    },
    yaxis: {
      title: { text: "Jumlah Penyewaan" }
    },
    fill: {
      opacity: 1,
      colors: ['#8F2D2D']
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return val + " penyewaan"
        }
      }
    }
  };

  // Chart GPU
  const gpuOptions = {
    series: [{
      name: "Jumlah",
      data: @json(array_values($gpuCounts))
    }],
    chart: {
      type: 'bar',
      height: 300,
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '70%',
        endingShape: 'rounded',
        borderRadius: 4,
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: @json(array_keys($gpuCounts)),
    },
    yaxis: {
      title: { text: "Jumlah Penyewaan" }
    },
    fill: {
      opacity: 1,
      colors: ['#8F2D2D']
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return val + " penyewaan"
        }
      }
    }
  };

  // Chart RAM
  const ramOptions = {
    series: [{
      name: "Jumlah",
      data: @json(array_values($ramCounts))
    }],
    chart: {
      type: 'bar',
      height: 300,
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '70%',
        endingShape: 'rounded',
        borderRadius: 4,
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: @json(array_keys($ramCounts)),
    },
    yaxis: {
      title: { text: "Jumlah Penyewaan" }
    },
    fill: {
      opacity: 1,
      colors: ['#8F2D2D']
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return val + " penyewaan"
        }
      }
    }
  };

  // Render charts
  if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("area-chart"), areaOptions);
    chart.render();
  }

  if (document.getElementById("cpu-chart") && typeof ApexCharts !== 'undefined') {
    const cpuChart = new ApexCharts(document.getElementById("cpu-chart"), cpuOptions);
    cpuChart.render();
  }

  if (document.getElementById("gpu-chart") && typeof ApexCharts !== 'undefined') {
    const gpuChart = new ApexCharts(document.getElementById("gpu-chart"), gpuOptions);
    gpuChart.render();
  }

  if (document.getElementById("ram-chart") && typeof ApexCharts !== 'undefined') {
    const ramChart = new ApexCharts(document.getElementById("ram-chart"), ramOptions);
    ramChart.render();
  }

  // DataTable
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