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

    <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
      <!-- Search & Filter -->
      <form method="GET" action="{{ route('admin.rent-report') }}" class="flex flex-col md:flex-row justify-between gap-4 mb-6">
        <div class="flex items-center w-full md:w-1/2 border border-gray-300 rounded-xl px-4 py-2">
          <input name="search" type="text" value="{{ $search }}" placeholder="Search Nama atau Komputer" class="bg-transparent w-full focus:outline-none text-gray-800" />
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
                <span class="font-semibold">{{ $rent->nama }}</span>
              </td>
              <td class="p-3">{{ $rent->komputer }}</td>
              <td class="p-3">{{ $rent->spesifikasi }}</td>
              <td class="p-3">{{ $rent->jumlah_token }} Token</td>
              <td class="p-3">{{ \Carbon\Carbon::parse($rent->waktu_mulai)->format('H:i') }}<br>{{ \Carbon\Carbon::parse($rent->waktu_mulai)->translatedFormat('d F Y') }}</td>
              <td class="p-3">{{ \Carbon\Carbon::parse($rent->waktu_berakhir)->format('H:i') }}<br>{{ \Carbon\Carbon::parse($rent->waktu_berakhir)->translatedFormat('d F Y') }}</td>
              <td class="p-3">
                @if ($rent->status == 'selesai')
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

      <!-- Pagination -->
      <div class="mt-6">
        {{ $rents->links('pagination::tailwind') }}
      </div>
    </div>

  </section>
</div>
@endsection
