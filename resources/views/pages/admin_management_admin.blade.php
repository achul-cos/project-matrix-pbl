@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

{{-- Tempat Kode Frontend halaman Managemen Admin --}}

<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Management Admin</span>
      </h1>

      {{-- @include('components.admin_card') --}}

      <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
        <!-- Search & Add -->
        <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
          <input type="text" placeholder="Search User"
            class="w-full md:w-1/2 px-4 py-2 rounded-xl border border-gray-300 bg-purple-50 focus:outline-none focus:ring-2 focus:ring-[#556B2F]" />
          <button class="bg-purple-50 border border-gray-300 px-4 py-2 rounded-xl text-sm flex items-center gap-2 hover:bg-purple-100 transition">
            <span class="text-xl font-bold">+</span> Add Admin
          </button>
        </div>

        <!-- Table -->
        <table class="min-w-full text-left border-separate border-spacing-y-3">
          <thead>
            <tr class="bg-gray-200 text-sm text-gray-700">
              <th class="p-3 rounded-l-lg">Nama</th>
              <th class="p-3">Role</th>
              <th class="p-3 rounded-r-lg">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Admin 1</span>
              </td>
              <td class="p-3">main branch</td>
              <td class="p-3">
                <span class="bg-red-200 text-red-800 px-3 py-1 text-xs font-semibold rounded-full">Super</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Admin 2</span>
              </td>
              <td class="p-3">branch</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Junior</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Admin 3</span>
              </td>
              <td class="p-3">branch</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Junior</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Admin 4</span>
              </td>
              <td class="p-3">branch</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Junior</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex ml-8 items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Admin 5</span>
              </td>
              <td class="p-3">branch</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Junior</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </section>
  </div>


@endsection