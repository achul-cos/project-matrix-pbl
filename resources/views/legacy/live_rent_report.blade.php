<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Live Rent Report | Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'matrix-red': '#556B2F',
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 font-sans flex">
  <!-- Sidebar -->
  <aside id="sidebar" class="bg-matrix-red text-white transition-all duration-300 ease-in-out overflow-hidden">
    <!-- Sidebar content container -->
    <div class="h-screen flex flex-col relative">
      <!-- Logo and Toggle Button -->
      <div class="p-4 flex items-center justify-between">
        <!-- Logo - visible when expanded -->
        <div id="logo-expanded" class="flex items-center space-x-2">
          <div class="bg-lime-400 p-1 rounded">
            <img src="/api/placeholder/24/24?text=M" alt="Matrix Logo" class="w-6 h-6">
          </div>
          <span class="font-bold text-xl">MATRIX</span>
        </div>

        <!-- Logo - visible when collapsed -->
        <div id="logo-collapsed" class="hidden mx-auto">
          <div class="bg-lime-400 p-1 rounded">
            <img src="/api/placeholder/24/24?text=M" alt="Matrix" class="w-6 h-6">
          </div>
        </div>

        <!-- Toggle Button -->
        <button id="toggle-sidebar" class="p-1 rounded-full hover:bg-red-800 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>

      <!-- Search -->
      <div class="px-4 py-2">
        <div class="relative">
          <input type="text" id="search-input" placeholder="Cari..." class="bg-white/10 text-white w-full py-2 pl-10 pr-4 rounded-md focus:outline-none focus:ring-2 focus:ring-white/50 placeholder-gray-300">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>
      </div>

      <!-- Menu Items -->
      <nav class="mt-4 flex-1 overflow-y-auto">
        <div id="expanded-menu">
          <!-- Management User -->
          <div class="menu-item">
            <button class="w-full flex items-center justify-between px-4 py-3 hover:bg-red-800 transition-colors">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Management User</span>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 menu-arrow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="submenu pl-12 hidden">
              <a href="#" class="block py-2 hover:bg-red-800 transition-colors">Management Account</a>
            </div>
          </div>

          <!-- Monitoring Computer -->
          <div class="menu-item">
            <button class="w-full flex items-center justify-between px-4 py-3 hover:bg-red-800 transition-colors">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>Monitoring Computer</span>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 menu-arrow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="submenu pl-12 hidden">
              <a href="#" class="block py-2 hover:bg-red-800 transition-colors">Add Computer</a>
              <a href="#" class="block py-2 hover:bg-red-800 transition-colors">View Computers</a>
            </div>
          </div>

          <!-- Report -->
          <div class="menu-item">
            <button class="w-full flex items-center justify-between px-4 py-3 bg-red-800 transition-colors">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Report</span>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 menu-arrow transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="submenu pl-12 block">
              <a href="#" class="block py-2 text-lime-400 font-medium hover:bg-black-800 transition-colors">Top Up Report</a>
              <a href="#" class="block py-2 hover:bg-black-800 transition-colors">Rent Report</a>
              <a href="#" class="block py-2 hover:bg-black-800 transition-colors">Live Rent Report</a>
            </div>
          </div>
        </div>

        <!-- Collapsed menu icons only -->
        <div id="collapsed-menu" class="hidden flex flex-col items-center pt-4 space-y-8">
          <button class="p-2 rounded-lg hover:bg-red-800 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </button>
          <button class="p-2 rounded-lg hover:bg-red-800 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </button>
          <button class="p-2 rounded-lg bg-red-800 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </button>
        </div>
      </nav>

      <!-- Bottom Section - Settings and User Profile -->
      <div class="mt-auto">
        <!-- Settings -->
        <a href="#" class="flex items-center px-4 py-3 hover:bg-red-800 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="expanded-text">Settings</span>
        </a>

        <!-- User Profile -->
        <div class="p-4 mt-2 flex items-center justify-between">
          <div class="flex items-center">
            <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
              <img src="/api/placeholder/40/40" alt="Admin Man" class="w-full h-full object-cover">
            </div>
            <div class="ml-3 expanded-text">
              <div class="font-medium">Admin Man</div>
              <div class="text-xs text-gray-300">Administrator</div>
            </div>
          </div>
          <button class="text-gray-300 hover:text-white expanded-text">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 transition-all duration-300">
    <div class="flex items-center mb-8">
      <h1 class="text-3xl font-bold"><span class="text-lime-500">Live Rent</span> <span class="text-matrix-red">Report</span></h1>
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
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
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
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
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
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
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
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
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
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
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
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
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
  </main>

  <script>
    // Sidebar Toggle Functionality
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggle-sidebar');
    const expandedMenu = document.getElementById('expanded-menu');
