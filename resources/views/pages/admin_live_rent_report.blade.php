@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Live Rent Report</span>
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
              <th class="p-3">Komputer</th>
              <th class="p-3 rounded-1-lg">Processor</th>
              <th class="p-3">GPU</th>
              <th class="p-3 rounded-1-lg">RAM</th>
              <th class="p-3">Ruanga</th>
              <th class="p-3 rounded-1-lg">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-100 rounded-xl">
                <td class="p-3 flex items-center space-x-3">
                  <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                  <span>Salsa Putri</span>
                </td>
                <td class="p-3">ASUS ROG</td>
                <td class="p-3">AMD</td>
                <td class="p-3">RTX</td>
                <td class="p-3">8 GB</td>
                <td class="p-3">Private Room</td>
                <td class="p-3">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">Online</span>
                </td>
              </tr>
              </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Arabella</span>
              </td>
              <td class="p-3">ASUS ROG</td>
              <td class="p-3">AMD</td>
              <td class="p-3">RTX</td>
              <td class="p-3">9 GB</td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">offline</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Nasrul</span>
              </td>
              <td class="p-3">ASUS ROG</td>
              <td class="p-3">AMD</td>
              <td class="p-3">RTX</td>
              <td class="p-3">8 GB</td>
              <td class="p-3">Public Room</td>
              <td class="p-3">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">available</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Putri</span>
              </td>
              <td class="p-3">ASUS ROG</td>
              <td class="p-3">AMD</td>
              <td class="p-3">RTX</td>
              <td class="p-3">8 GB</td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">online</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                <span>Nabila Maya</span>
                <td class="p-3">ASUS ROG</td>
                <td class="p-3">AMD</td>
                <td class="p-3">RTX</td>
                <td class="p-3">8 GB</td>
                <td class="p-3">Public Room</td>
                <td class="p-3">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">offline</span>
                  </td>
          </tbody>
        </table>
      </div>
    </section>
  </div>
@endsection
