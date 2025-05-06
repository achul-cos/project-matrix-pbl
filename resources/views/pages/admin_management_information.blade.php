@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Managament Information</span>
      </h1>

      <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
        <!-- Search & Add -->
        <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
          <input type="text" placeholder="Search User"
            class="w-full md:w-1/2 px-4 py-2 rounded-xl border border-gray-300 bg-purple-50 focus:outline-none focus:ring-2 focus:ring-[#556B2F]" />
            <input type="checkbox" id="modal-toggle" class="hidden peer" />
            <label for="modal-toggle" class="cursor-pointer bg-purple-50 border border-gray-300 px-4 py-2 rounded-xl text-sm flex items-center gap-2 hover:bg-purple-100 transition">
                <span class="text-xl font-bold">+</span> Add Information
              </label>
          </button>
        </div>
        <!-- Table -->
        <table class="min-w-full text-left border-separate border-spacing-y-3">
          <thead>
            <tr class="bg-gray-200 text-sm text-gray-700">
              <th class="p-3 rounded-l-lg">Id</th>
              <th class="p-3">Foto</th>
              <th class="p-3 rounded-1-lg">Nama Event</th>
              <th class="p-3">Deskripsi</th>
              <th class="p-3 rounded-1-lg">Tanggal Event</th>
              <th class="p-3">Link Event</th>
              <th class="p-3 rounded-1-lg">Role</th>
              <th class="p-3">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-100 rounded-xl">
                <td class="p-3 flex items-center space-x-3">
                <span>1</span>
                <td class="p-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                </td>
                <td class="p-3">matrix fest</td>
                <td class="p-3">mafest atau festival matrix adalah sebuah acara di mana siapapun yang mau sewa akan kami kasih diskon99%</td>
                <td class="p-3">1 Mei 2025</td>
                <td class="p-3">https://matrix-fest</td>
                <td class="p-3">Simulasi – Web Developer / Event Creator</td>
                <td class="p-3">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">Online</span>
                </td>
              </tr>
              </tr>
              <tr class="bg-gray-100 rounded-xl">
                <td class="p-3 flex items-center space-x-3">
                <span>2</span>
                <td class="p-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                </td>
                <td class="p-3">matrix fest</td>
                <td class="p-3">mafest atau festival matrix adalah sebuah acara di mana siapapun yang mau sewa akan kami kasih diskon99%</td>
                <td class="p-3">5 june 2025</td>
                <td class="p-3">https://matrix</td>
                <td class="p-3">Simulasi – Web Developer / Event Creator</td>
              <td class="p-3">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">offline</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
                <td class="p-3 flex items-center space-x-3">
                <span>3</span>
                <td class="p-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                </td>
                <td class="p-3">salsaajry</td>
                <td class="p-3">mafest atau festival matrix adalah sebuah acara di mana siapapun yang mau sewa akan kami kasih diskon99%</td>
                <td class="p-3">9 februari 2029</td>
                <td class="p-3">http://matrix.com</td>
                <td class="p-3">Simulasi – Web Developer / Event Creator</td>
              <td class="p-3">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">available</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
                <td class="p-3 flex items-center space-x-3">
                <span>4</span>
                <td class="p-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                </td>
                <td class="p-3">salsaajry</td>
                <td class="p-3">mafest atau festival matrix adalah sebuah acara di mana siapapun yang mau sewa akan kami kasih diskon99%</td>
                <td class="p-3">1 april 2025</td>
                <td class="p-3">http://matrix-fest</td>
                <td class="p-3">Simulasi – Web Developer / Event Creator</td>
              <td class="p-3">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">online</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
                <td class="p-3 flex items-center space-x-3">
                <span>Salsa Putri</span>
                <td class="p-3">
                <img src="../img/ad/placeholder1.png" class="w-10 h-10 rounded object-cover" />
                </td>
                <td class="p-3">salsaajry</td>
                <td class="p-3">mafest atau festival matrix adalah sebuah acara di mana siapapun yang mau sewa akan kami kasih diskon99%</td>
                <td class="p-3">10 desember 2025</td>
                <td class="p-3">http://matrix</td>
                <td class="p-3">Simulasi – Web Developer / Event Creator</td>
                <td class="p-3">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">offline</span>
                  </td>
          </tbody>
        </table>
      </div>
    </section>
  </div>


@endsection
