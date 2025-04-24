@extends('layout.dashboard')

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