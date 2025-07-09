@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

@php
    $topups = config('data_topup_dummy.topups');

    $topupCounts = [];

    foreach ($topups as $topup) {
        // Gunakan 'waktu_pembayaran' untuk analisis waktu
        $tanggalKey = date('Y-m-d', strtotime($topup['waktu_pembayaran']));

        if (!isset($topupCounts[$tanggalKey])) {
            $topupCounts[$tanggalKey] = 0;
        }
        $topupCounts[$tanggalKey]++;
    }

    // Urutkan berdasarkan tanggal
    ksort($topupCounts);

    // Siapkan data untuk chart atau visualisasi
    $categories = [];
    $data = [];

    foreach ($topupCounts as $tanggalKey => $jumlah) {
        $categories[] = date('d F', strtotime($tanggalKey));
        $data[] = $jumlah;
    }

    // Ambil tanggal terbaru dari data topup
    $maxDate = max(array_map(fn($topup) => strtotime($topup['waktu_pembayaran']), $topups));
    $endDate = date('Y-m-d', $maxDate);
    $startDate = date('Y-m-d', strtotime('-1 month', $maxDate));

    // Hitung jumlah topup di bulan terakhir
    $totalTopupSebulanTerakhir = collect($topups)
        ->filter(function($topup) use ($startDate, $endDate) {
            $tanggal = date('Y-m-d', strtotime($topup['waktu_pembayaran']));
            return $tanggal >= $startDate && $tanggal <= $endDate;
        })
        ->count();

    // Hitung untuk bulan sebelumnya
    $prevEndDate = date('Y-m-d', strtotime('-1 day', strtotime($startDate)));
    $prevStartDate = date('Y-m-d', strtotime('-1 month', strtotime($startDate)));

    $totalTopupSebulanSebelumnya = collect($topups)
        ->filter(function($topup) use ($prevStartDate, $prevEndDate) {
            $tanggal = date('Y-m-d', strtotime($topup['waktu_pembayaran']));
            return $tanggal >= $prevStartDate && $tanggal <= $prevEndDate;
        })
        ->count();

    // Hitung persentase perubahan
    if ($totalTopupSebulanSebelumnya > 0) {
        $persentasePerubahan = (($totalTopupSebulanTerakhir - $totalTopupSebulanSebelumnya) / $totalTopupSebulanSebelumnya) * 100;
    } else {
        $persentasePerubahan = null; // atau 100 jika kamu ingin
    }

    // Format tanggal tampil
    $fmt = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $startDateFormatted = $fmt->format(new DateTime($startDate));
    $endDateFormatted = $fmt->format(new DateTime($endDate));

    // Tentukan warna berdasarkan tren
    $textColor = 'gray-600';
    if ($persentasePerubahan > 0) {
        $textColor = 'green-600';
    } elseif ($persentasePerubahan < 0) {
        $textColor = 'red-600';
    }

    // Hitung jumlah token yang ditopup per hari
    $tokenTopupCountsPerDay = [];

    foreach ($topups as $topup) {
        $tanggalTokenKey = date('Y-m-d', strtotime($topup['waktu_pembayaran']));
        if (!isset($tokenTopupCountsPerDay[$tanggalTokenKey])) {
            $tokenTopupCountsPerDay[$tanggalTokenKey] = 0;
        }
        $tokenTopupCountsPerDay[$tanggalTokenKey] += (int) $topup['jumlah_token'];
    }

    // Urutkan berdasarkan tanggal
    ksort($tokenTopupCountsPerDay);

    // Siapkan data token untuk chart
    $tokenCategories = [];
    $tokenData = [];

    foreach ($tokenTopupCountsPerDay as $tanggal => $jumlahToken) {
        $tokenCategories[] = date('d F', strtotime($tanggal));
        $tokenData[] = $jumlahToken;
    }

    // Hitung jumlah token yang ditopup dari tanggal terbaru hingga satu bulan sebelumnya
    $totalTokenSebulanTerakhir = collect($topups)
        ->filter(function($topup) use ($startDate, $endDate) {
            $tanggal = date('Y-m-d', strtotime($topup['waktu_pembayaran']));
            return $tanggal >= $startDate && $tanggal <= $endDate;
        })
        ->sum('jumlah_token');

    // Ambil tanggal terbaru dari data topup
    $maxTokenDate = max(array_map(fn($topup) => strtotime($topup['waktu_pembayaran']), $topups));
    $endTokenDate = date('Y-m-d', $maxTokenDate);
    $startTokenDate = date('Y-m-d', strtotime('-1 month', $maxTokenDate));

    // Hitung total token yang ditopup di bulan terakhir
    $jumlahTokenBulanTerakhir = collect($topups)
        ->filter(function($topup) use ($startTokenDate, $endTokenDate) {
            $tanggal = date('Y-m-d', strtotime($topup['waktu_pembayaran']));
            return $tanggal >= $startTokenDate && $tanggal <= $endTokenDate;
        })
        ->sum('jumlah_token');

    // Hitung total token yang ditopup di bulan sebelumnya
    $prevEndTokenDate = date('Y-m-d', strtotime('-1 day', strtotime($startTokenDate)));
    $prevStartTokenDate = date('Y-m-d', strtotime('-1 month', strtotime($startTokenDate)));

    $jumlahTokenBulanSebelumnya = collect($topups)
        ->filter(function($topup) use ($prevStartTokenDate, $prevEndTokenDate) {
            $tanggal = date('Y-m-d', strtotime($topup['waktu_pembayaran']));
            return $tanggal >= $prevStartTokenDate && $tanggal <= $prevEndTokenDate;
        })
        ->sum('jumlah_token');

    // Hitung persentase perubahan jumlah token
    if ($jumlahTokenBulanSebelumnya > 0) {
        $persentasePerubahanJumlahToken = (($jumlahTokenBulanTerakhir - $jumlahTokenBulanSebelumnya) / $jumlahTokenBulanSebelumnya) * 100;
    } else {
        $persentasePerubahanJumlahToken = null; // Atau 100 jika ingin mengasumsikan lonjakan awal
    }

@endphp


{{-- Tempat Kode Frontend halaman Topup Report --}}

<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Topup Report </span>
      </h1>

        <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6 mb-20">
            <div class="flex justify-between">
            <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                {{ $totalTopupSebulanTerakhir ?? "error" }}
                </h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                Total Jumlah Transaksi Bulan Ini ({{ $startDateFormatted ?? "error" }} - {{ $endDateFormatted ?? "error" }})
                </p>
            </div>
            <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-{{ $textColor ?? "gray-400" }} text-center">
                @if (is_null($persentasePerubahan))
                <p>📊 Tidak tersedia data bulan sebelumnya untuk menghitung persentase perubahan.</p>
                @else
                @if ($persentasePerubahan > 0)
                    <p>📈 Jumlah top-up naik {{ number_format($persentasePerubahan, 2) }}% dibanding bulan sebelumnya.</p>
                @elseif ($persentasePerubahan < 0)
                    <p>📉 Jumlah top-up turun {{ number_format(abs($persentasePerubahan), 2) }}% dibanding bulan sebelumnya.</p>
                @else
                    <p>📊 Tidak ada perubahan jumlah top-up dibanding bulan sebelumnya.</p>
                @endif
                @endif
            </div>
            </div>
            <div id="area-chart"></div>
        </div>
      
        <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6 mb-20">
            <div class="flex justify-between">
            <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                {{ $totalTokenSebulanTerakhir ?? "error" }}
                </h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                Total Jumlah Token Yang DiTopUp ({{ $startDateFormatted ?? "error" }} - {{ $endDateFormatted ?? "error" }})
                </p>
            </div>
            <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-{{ $textColor ?? "gray-400" }} text-center">
                @if (is_null($persentasePerubahanJumlahToken))
                <p>📊 Tidak tersedia data bulan sebelumnya untuk menghitung persentase perubahan.</p>
                @else
                @if ($persentasePerubahanJumlahTokenn > 0)
                    <p>📈 Jumlah top-up naik {{ number_format($persentasePerubahanJumlahToken, 2) }}% dibanding bulan sebelumnya.</p>
                @elseif ($persentasePerubahanJumlahToken < 0)
                    <p>📉 Jumlah top-up turun {{ number_format(abs($persentasePerubahanJumlahToken), 2) }}% dibanding bulan sebelumnya.</p>
                @else
                    <p>📊 Tidak ada perubahan jumlah top-up dibanding bulan sebelumnya.</p>
                @endif
                @endif
            </div>
            </div>
            <div id="area-chart-2"></div>
        </div>

        <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6 mb-15">
        <div class="flex justify-between mb-5">
            <div class="grid gap-4 grid-cols-2">
            <div>
                <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">Jumlah Transaksi
                <svg data-popover-target="clicks-info" data-popover-placement="bottom" class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div data-popover id="clicks-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                    <div class="p-3 space-y-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Jumlah Transaksi Top Up</h3>
                        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                    </svg></a>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                </h5>
                <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">{{ $totalTopupSebulanTerakhir ?? "error" }}</p>
            </div>
            <div>
                <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">Jumlah Token Yang DiTopUp
                <svg data-popover-target="cpc-info" data-popover-placement="bottom" class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div data-popover id="cpc-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                    <div class="p-3 space-y-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Jumlah Token Yang DiTopUp</h3>
                        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                    </svg></a>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                </h5>
                <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold flex gap-2">{{ $totalTokenSebulanTerakhir ?? "error" }} <img src="../img/icon/Matrix_Token_Icon_White.svg" alt="" class="w-5.5 h-5.5 invert"></p>
            </div>
            </div>
            <div>
        </div>
        </div>
        <div id="line-chart"></div>
        </div>



      <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
        <table id="export-table">
          <thead>
            <tr class="bg-gray-200 text-sm text-gray-700">
                @php
                    $headers = ['ID', 'ID User', 'Nama', 'Metode', 'Biaya', 'Token', 'Pemesanan', 'Pembayaran'];
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
            @foreach ($topups as $topup)
                <tr class="bg-gray-100 rounded-xl">
                    <td class="p-3">{{ $topup['id_topup'] }}</td>
                    <td class="p-3">{{ $topup['id_user'] }}</td>
                    <td class="p-3">{{ $topup['nama_user'] }}</td>
                    <td class="p-3">{{ $topup['metode_pembayaran'] }}</td>
                    <td class="p-3">{{ $topup['jumlah_biaya'] }}</td>
                    <td class="p-3">{{ $topup['jumlah_token'] }}</td>
                    <td class="p-3">{{ $topup['waktu_pemesanan'] }}</td>
                    <td class="p-3">{{ $topup['waktu_pembayaran'] }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </section>
  </div>

<script>
  if (document.getElementById("export-table") && typeof simpleDatatables.DataTable !== 'undefined') {

      const exportCustomCSV = function(dataTable, userOptions = {}) {
          // A modified CSV export that includes a row of minuses at the start and end.
          const clonedUserOptions = {
              ...userOptions
          }
          clonedUserOptions.download = false
          const csv = simpleDatatables.exportCSV(dataTable, clonedUserOptions)
          // If CSV didn't work, exit.
          if (!csv) {
              return false
          }
          const defaults = {
              download: true,
              lineDelimiter: "\n",
              columnDelimiter: ";"
          }
          const options = {
              ...defaults,
              ...clonedUserOptions
          }
          const separatorRow = Array(dataTable.data.headings.filter((_heading, index) => !dataTable.columns.settings[index]?.hidden).length)
              .fill("+")
              .join("+"); // Use "+" as the delimiter

          const str = separatorRow + options.lineDelimiter + csv + options.lineDelimiter + separatorRow;

          if (userOptions.download) {
              // Create a link to trigger the download
              const link = document.createElement("a");
              link.href = encodeURI("data:text/csv;charset=utf-8," + str);
              link.download = (options.filename || "datatable_export") + ".txt";
              // Append the link
              document.body.appendChild(link);
              // Trigger the download
              link.click();
              // Remove the link
              document.body.removeChild(link);
          }

          return str
      }
      const table = new simpleDatatables.DataTable("#export-table", {
          template: (options, dom) => "<div class='" + options.classes.top + "'>" +
              "<div class='flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto'>" +
              (options.paging && options.perPageSelect ?
                  "<div class='" + options.classes.dropdown + "'>" +
                      "<label>" +
                          "<select class='" + options.classes.selector + "'></select> " + options.labels.perPage +
                      "</label>" +
                  "</div>" : ""
              ) + "<button id='exportDropdownButton' type='button' class='flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto'>" +
              "Export as" +
              "<svg class='-me-0.5 ms-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>" +
                  "<path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m19 9-7 7-7-7' />" +
              "</svg>" +
          "</button>" +
          "<div id='exportDropdown' class='z-10 hidden w-52 divide-y divide-gray-100 rounded-lg bg-white shadow-sm dark:bg-gray-700' data-popper-placement='bottom'>" +
              "<ul class='p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400' aria-labelledby='exportDropdownButton'>" +
                  "<li>" +
                      "<button id='export-csv' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                          "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                              "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm1.018 8.828a2.34 2.34 0 0 0-2.373 2.13v.008a2.32 2.32 0 0 0 2.06 2.497l.535.059a.993.993 0 0 0 .136.006.272.272 0 0 1 .263.367l-.008.02a.377.377 0 0 1-.018.044.49.49 0 0 1-.078.02 1.689 1.689 0 0 1-.297.021h-1.13a1 1 0 1 0 0 2h1.13c.417 0 .892-.05 1.324-.279.47-.248.78-.648.953-1.134a2.272 2.272 0 0 0-2.115-3.06l-.478-.052a.32.32 0 0 1-.285-.341.34.34 0 0 1 .344-.306l.94.02a1 1 0 1 0 .043-2l-.943-.02h-.003Zm7.933 1.482a1 1 0 1 0-1.902-.62l-.57 1.747-.522-1.726a1 1 0 0 0-1.914.578l1.443 4.773a1 1 0 0 0 1.908.021l1.557-4.773Zm-13.762.88a.647.647 0 0 1 .458-.19h1.018a1 1 0 1 0 0-2H6.647A2.647 2.647 0 0 0 4 13.647v1.706A2.647 2.647 0 0 0 6.647 18h1.018a1 1 0 1 0 0-2H6.647A.647.647 0 0 1 6 15.353v-1.706c0-.172.068-.336.19-.457Z' clip-rule='evenodd'/>" +
                          "</svg>" +
                          "<span>Export CSV</span>" +
                      "</button>" +
                  "</li>" +
                  "<li>" +
                      "<button id='export-json' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                          "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                              "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm-.293 9.293a1 1 0 0 1 0 1.414L9.414 14l1.293 1.293a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414l2-2a1 1 0 0 1 1.414 0Zm2.586 1.414a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1 0 1.414l-2 2a1 1 0 0 1-1.414-1.414L14.586 14l-1.293-1.293Z' clip-rule='evenodd'/>" +
                          "</svg>" +
                          "<span>Export JSON</span>" +
                      "</button>" +
                  "</li>" +
                  "<li>" +
                      "<button id='export-txt' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                          "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                              "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z' clip-rule='evenodd'/>" +
                          "</svg>" +
                          "<span>Export TXT</span>" +
                      "</button>" +
                  "</li>" +
                  "<li>" +
                      "<button id='export-sql' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                          "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                              "<path d='M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z'/>" +
                          "</svg>" +
                          "<span>Export SQL</span>" +
                      "</button>" +
                  "</li>" +
              "</ul>" +
          "</div>" + "</div>" +
              (options.searchable ?
                  "<div class='" + options.classes.search + "'>" +
                      "<input class='" + options.classes.input + "' placeholder='" + options.labels.placeholder + "' type='search' title='" + options.labels.searchTitle + "'" + (dom.id ? " aria-controls='" + dom.id + "'" : "") + ">" +
                  "</div>" : ""
              ) +
          "</div>" +
          "<div class='" + options.classes.container + "'" + (options.scrollY.length ? " style='height: " + options.scrollY + "; overflow-Y: auto;'" : "") + "></div>" +
          "<div class='" + options.classes.bottom + "'>" +
              (options.paging ?
                  "<div class='" + options.classes.info + "'></div>" : ""
              ) +
              "<nav class='" + options.classes.pagination + "'></nav>" +
          "</div>"
      })
      const $exportButton = document.getElementById("exportDropdownButton");
      const $exportDropdownEl = document.getElementById("exportDropdown");
      const dropdown = new Dropdown($exportDropdownEl, $exportButton);
      console.log(dropdown)

      document.getElementById("export-csv").addEventListener("click", () => {
          simpleDatatables.exportCSV(table, {
              download: true,
              lineDelimiter: "\n",
              columnDelimiter: ";"
          })
      })
      document.getElementById("export-sql").addEventListener("click", () => {
          simpleDatatables.exportSQL(table, {
              download: true,
              tableName: "export_table"
          })
      })
      document.getElementById("export-txt").addEventListener("click", () => {
          simpleDatatables.exportTXT(table, {
              download: true
          })
      })
      document.getElementById("export-json").addEventListener("click", () => {
          simpleDatatables.exportJSON(table, {
              download: true,
              space: 3
          })
      })
  }
</script>

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
            name: "Jumlah Transaksi", // Ubah label sesuai konteks data
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

    const options_2 = {
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
            gradientToColors: ["#1c8a3e"],
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
            name: "Jumlah Token Yang DiTopup",
            data: @json($tokenData),
            color: "#1c8a3e",
        },
        ],
        xaxis: {
        categories: @json($tokenCategories),
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

    if (document.getElementById("area-chart-2") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("area-chart-2"), options_2);
        chart.render();
    }

    const options_3 = {
    chart: {
        height: "150%",
        maxWidth: "100%",
        type: "line",
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
    dataLabels: {
        enabled: false,
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
        top: -26
        },
    },
    series: [
        {
        name: "Jumlah Transaksi", // Ubah label sesuai konteks data
        data: @json($data), // contoh: [4, 3, 5, 2, ...]
        color: "#1A56DB",
        },
        {
        name: "Jumlah Token Yang DiTopup",
        data: @json($tokenData),
        color: "#1c8a3e",
        },
    ],
    legend: {
        show: true
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        categories: @json($categories), // contoh: ['01 January', '02 January', ...]
        labels: {
        show: true,
        style: {
            fontFamily: "Inter, sans-serif",
            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        }
        },
        axisBorder: {
        show: false,
        },
        axisTicks: {
        show: true,
        },
    },
    yaxis: {
        show: true,
    },
    }

    if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("line-chart"), options_3);
    chart.render();
    }
</script>

@endsection
