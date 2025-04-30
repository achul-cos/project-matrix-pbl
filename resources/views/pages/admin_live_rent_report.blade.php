@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<main class="flex-1 p-6 transition-all duration-300">
    <div class="flex items-center mb-8">
      <h1 class="text-3xl font-bold"><span class="text-slate-800">Live Rent</span> <span class="text-slate-400">Report</span></h1>
    </div>

    <!-- Report Card -->
    <div class="bg-white rounded-lg border-2 border-matrix-red p-6 shadow-lg">
      <div class="flex flex-wrap justify-between mb-6">
        <!-- Search Bar -->
        <div class="relative w-64 mb-4 sm:mb-0">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
          </div>
          <input type="text" id="table-search" placeholder="Search" class="bg-gray-100 pl-10 pr-4 py-2 w-full rounded-md focus:outline-none focus:ring-2 focus:ring-matrix-red">
        </div>

        <div class="flex flex-wrap gap-4">
          <!-- Date Filter -->
          <div class="relative">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Date Picker Dropdown -->
            <div id="datePicker" class="absolute right-0 mt-2 w-72 bg-white rounded-md shadow-lg p-4 hidden z-10">
              <div class="flex justify-between mb-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                  <input type="date" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-matrix-red">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                  <input type="date" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-matrix-red">
                </div>
              </div>
              <div class="flex justify-end space-x-2">
                <button class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                <button id="applyDateFilter" class="px-3 py-1 text-sm bg-matrix-red text-white rounded-md hover:bg-red-800">Apply</button>
              </div>
            </div>
          </div>

          <!-- Export Button -->
          <button class="bg-matrix-red text-white rounded-md px-4 py-2 flex items-center justify-center hover:bg-red-800">
            <span class="mr-2">+</span>
            Export to PDF
          </button>
        </div>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nama</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Komputer</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Procesor</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">GPU</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">RAM</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Ruangan</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
            </tr>
          </thead>

          <tbody id="reportTable" class="bg-white divide-y divide-gray-200">
            <!-- Row 1 -->
            <tr class="bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full object-cover" src="../img/ad/placeholder1.png" alt="Profile">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Arabella</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Asus ROG</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AMD</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">RTX</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 GB</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Private Room</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">In Use</span>
              </td>
            </tr>

            <!-- Row 2 -->
           <!-- Row 1 -->
            <tr class="bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full object-cover" src="../img/ad/placeholder1.png" alt="Profile">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Arabella</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Asus ROG</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AMD</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">RTX</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 GB</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Private Room</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">In Use</span>
              </td>
            </tr>

            <!-- Row 3 -->
           <!-- Row 1 -->
            <tr class="bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full object-cover" src="../img/ad/placeholder1.png" alt="Profile">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Arabella</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Asus ROG</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AMD</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">RTX</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 GB</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Private Room</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">In Use</span>
              </td>
            </tr>

            <!-- Row 4 -->
           <!-- Row 1 -->
            <tr class="bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full object-cover" src="../img/ad/placeholder1.png" alt="Profile">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Arabella</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Asus ROG</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AMD</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">RTX</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 GB</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Private Room</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">In Use</span>
              </td>
            </tr>

            <!-- Row 5 -->
            <!-- Row 1 -->
            <tr class="bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full object-cover" src="../img/ad/placeholder1.png" alt="Profile">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Arabella</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Asus ROG</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AMD</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">RTX</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 GB</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Private Room</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">In Use</span>
              </td>
            </tr>

            <!-- Row 6 -->
           <!-- Row 1 -->
            <tr class="bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full object-cover" src="../img/ad/placeholder1.png" alt="Profile">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Arabella</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Asus ROG</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">AMD</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">RTX</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 GB</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Private Room</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">In Use</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </main>

  <script>
    // Sidebar Toggle Functionality
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggle-sidebar');
    const expandedMenu = document.getElementById('expanded-menu');

@endsection