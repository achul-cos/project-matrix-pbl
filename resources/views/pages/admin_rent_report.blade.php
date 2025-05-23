@extends('layout.dashboard')

@section('title', 'Matrix - Rent Report')

@php
  $rents = config('data_rent_dummy.rents');

  $rentCounts = [];

  foreach ($rents as $rent) {
      // Format tanggal normalisasi (Y-m-d) agar bisa di-sort
      $tanggalKey = date('Y-m-d', strtotime($rent['waktu_mulai']));

      if (!isset($rentCounts[$tanggalKey])) {
          $rentCounts[$tanggalKey] = 0;
      }
      $rentCounts[$tanggalKey]++;
  }

  // Urutkan berdasarkan key (tanggal Y-m-d)
  ksort($rentCounts);

  // Siapkan untuk JavaScript (format jadi 'd F')
  $categories = [];
  $data = [];

  foreach ($rentCounts as $tanggalKey => $jumlah) {
      $categories[] = date('d F', strtotime($tanggalKey)); // Misal: '01 January'
      $data[] = $jumlah;
  }

  // Ambil tanggal terbaru dari data
  $maxDate = max(array_map(fn($rent) => strtotime($rent['waktu_mulai']), $rents));
  $endDate = date('Y-m-d', $maxDate); // contoh: 2025-01-31
  $startDate = date('Y-m-d', strtotime('-1 month', $maxDate)); // contoh: 2025-01-01

  // Hitung jumlah penyewaan di bulan terbaru
  $totalSewaSebulanTerakhir = collect($rents)
      ->filter(function($rent) use ($startDate, $endDate) {
          $tanggal = date('Y-m-d', strtotime($rent['waktu_mulai']));
          return $tanggal >= $startDate && $tanggal <= $endDate;
      })
      ->count();

  //variable khusus yang berisi tanggal terakhir perhitungan dan tanggal paling awal perhitungan
  $fmt = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
  $startDateFormatted = $fmt->format(new DateTime($startDate));
  $endDateFormatted = $fmt->format(new DateTime($endDate));

  // Tentukan rentang bulan sebelumnya
  $prevEndDate = date('Y-m-d', strtotime('-1 day', strtotime($startDate)));  // 2024-12-31
  $prevStartDate = date('Y-m-d', strtotime('-1 month', strtotime($startDate))); // 2024-12-01

  // Hitung jumlah penyewaan di bulan sebelumnya
  $totalSewaSebulanSebelumnya = collect($rents)
      ->filter(function($rent) use ($prevStartDate, $prevEndDate) {
          $tanggal = date('Y-m-d', strtotime($rent['waktu_mulai']));
          return $tanggal >= $prevStartDate && $tanggal <= $prevEndDate;
      })
      ->count();

  // Hitung persentase perubahan
  if ($totalSewaSebulanSebelumnya > 0) {
      $persentasePerubahan = (($totalSewaSebulanTerakhir - $totalSewaSebulanSebelumnya) / $totalSewaSebulanSebelumnya) * 100;
  } else {
      // Tidak ada data bulan sebelumnya, anggap 100% peningkatan (jika kamu mau)
      $persentasePerubahan = null; // atau set ke 100
  }

  $textColor = 'gray-600';
  if ($persentasePerubahan > 0) {
      $textColor = 'green-600';
  } elseif ($persentasePerubahan < 0) {
      $textColor = 'red-600';
  }

@endphp

@section('content')

<!-- Main Content -->

<section class="px-8 py-10">
  <h1 class="text-3xl font-bold mb-6">
    <span class="text-[#8F2D2D]">Rent</span> Report
  </h1>

  <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
    <div class="flex justify-between">
      <div>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{ $totalSewaSebulanTerakhir ?? "error" }}</h5>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Penyewaan Bulan Ini ({{ $startDateFormatted ?? "error" }} - {{ $endDateFormatted ?? "error" }})</p>
      </div>
      <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-{{ $textColor ?? "gray-400" }} text-center">
        
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

  <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl mt-20">
    <!-- Table -->
    <table class="w-full text-left border-separate border-spacing-y-3" id="filter-table">
      <thead>
          <tr class="bg-gray-200 text-sm text-gray-700">
              @php
                  $headers = ['ID', 'ID PC', 'Kode', 'Nama', 'Waktu Mulai', 'Waktu Selesai'];
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
          @foreach ($rents as $rent)
              <tr class="bg-gray-100 rounded-xl">
                  <td class="p-3">{{ $rent['id_rent_report'] }}</td>
                  <td class="p-3">{{ $rent['id_komputer'] }}</td>
                  <td class="p-3">{{ $rent['kode_komputer'] }}</td>
                  <td class="p-3">{{ $rent['nama_komputer'] }}</td>
                  <td class="p-3">{{ $rent['waktu_mulai'] }}</td>
                  <td class="p-3">{{ $rent['waktu_akhir'] }}</td>
              </tr>
          @endforeach
      </tbody>
    </table>
    
  </div>

</section>

<!-- Main Content Selesai -->

<!-- Script -->

<script>
  const options = {
    chart: {
      height: "150%",
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
        shade: "#1C64F2",
        gradientToColors: ["#1C64F2"],
      },
    },
    dataLabels: {
      enabled: true,
    },
    stroke: {
      width: 6,
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
        data: @json($data), // contoh: [4, 3, 5, 2, ...]
        color: "#1A56DB",
      },
    ],
    xaxis: {
      categories: @json($categories), // contoh: ['01 January', '02 January', ...]
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
      show: false,
    },
  }

  if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("area-chart"), options);
    chart.render();
  }
</script>

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

<!-- Script Selesai -->

@endsection
