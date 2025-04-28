@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Monitoring Computer</span>
      </h1>
       
      <section id="monitoring-komputer-lantai" class="mb-20">

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
          <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
              <li class="me-2" role="presentation">
                  <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Lantai 1</button>
              </li>
              <li class="me-2" role="presentation">
                  <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Lantai 2</button>
              </li>
              <li class="me-2" role="presentation">
                  <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Lantai 3</button>
              </li>
              <li role="presentation">
                  <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Lantai 4</button>
              </li>
          </ul>
        </div>

        <div id="default-styled-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="flex-wrap">
                  <div class="bg-lime-600 p-4 inline-flex text-white font-mono" id="komputer-1-lantai-1" data-popover-target="popover-komputer-1-lantai-1">A1</div>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="flex-wrap">
                  <div class="bg-lime-600 p-4 inline-flex text-white font-mono" id="komputer-1-lantai-2" data-popover-target="popover-komputer-1-lantai-2">B1</div>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="flex-wrap">
                  <div class="bg-lime-600 p-4 inline-flex text-white font-mono" id="komputer-1-lantai-3" data-popover-target="popover-komputer-1-lantai-3">C1</div>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <div class="flex-wrap">
                  <div class="bg-lime-600 p-4 inline-flex text-white font-mono" id="komputer-1-lantai-4" data-popover-target="popover-komputer-1-lantai-4">D1</div>
                </div>
            </div>
        </div>

        <div data-popover id="popover-komputer-1-lantai-1" role="tooltip" class="absolute z-60 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
          <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
              <h3 class="font-semibold text-gray-900 dark:text-white">/nama-komputer/ - A1 - Lantai 1</h3>
          </div>
          <div class="px-3 py-2">
            <div class="flex flex-row items-center" id="indicator_status">
              <div class="inline-flex" id="indicator">
                <span class="absolute flex w-3 h-3 me-3 bg-teal-500 rounded-full animate-ping"></span> 
                <span class="relative flex w-3 h-3 me-3 bg-teal-500 rounded-full"></span>  
              </div>
              <p class="inline-flex">Online</p>
            </div>
            <div class="grid grid-cols-2 mt-2" id="informasi_komputer">
              <div class="flex flex-col gap-y-2">
                <p id="id_komputer">
                  ID : 99
                </p>
                <p id="nama_komputer">
                  Nama : ASUS ROG Z1
                </p>
                <p id="kode_komputer">
                  Kode : A1
                </p>
                <p id="cpu_komputer">
                  CPU : Intel i9-12450HX
                </p>
                <p id="gpu_komputer">
                  GPU : RTX 4070
                </p>
              </div>
              <div class="flex flex-col gap-y-2">
                <p id="RAM_komputer">
                  RAM : 16 GB
                </p>
                <p id="nama_komputer">
                  Lantai : 1
                </p>
                <p id="kode_komputer">
                  Biaya : 4 maxcoin/jam
                </p>
                <p id="cpu_komputer">
                  Room : Private
                </p>
                <p id="gpu_komputer">
                  Status : Online
                </p>
              </div>
            </div>
          </div>
          <div data-popper-arrow></div>
        </div>
        
      </section>

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