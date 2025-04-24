<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Top Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'dark-olive': '#556B2F',
          },
        },
      },
    }
  </script>
  <style>
    .bg-dark-olive {
      background-color: #556B2F;
    }
    .text-dark-olive {
      color: #556B2F;
    }
    .border-dark-olive {
      border-color: #556B2F;
    }
  </style>
</head>
<body class="bg-lime-100 font-sans">
  <!-- Header -->
  <header class="flex items-center justify-between px-6 py-3 bg-dark-olive text-white">
    <div class="flex items-center">
      <button class="text-xl mr-3">≡</button>
      <div class="text-xl font-bold">🏠</div>
    </div>
    <div class="flex-1 mx-4">
      <div class="relative">
        <input type="text" placeholder="Search" class="w-full px-3 py-1 rounded-full text-black bg-gray-100" />
        <span class="absolute right-3 top-1">🔍</span>
      </div>
    </div>
    <div class="flex items-center space-x-3">
      <span class="font-semibold">Nabila Maya</span>
      <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center text-white">👤</div>
      <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xl bg-dark-olive">+</div>
    </div>
  </header>

  <div class="flex p-4 gap-4">
    <!-- Sidebar dengan height yang sama dengan main content -->
    <div class="w-72">
      <aside class="bg-white rounded-lg border border-dark-olive p-4 flex flex-col h-full">
        <div class="text-center border-b pb-4">
          <div class="w-20 h-20 bg-red-100 rounded-full mx-auto mb-2 flex items-center justify-center text-red-600 text-4xl">👤</div>
          <p class="font-semibold">Nabila Maya</p>
          <p class="text-sm text-gray-500">+62895364095999</p>
        </div>
        <nav class="mt-4 flex-grow">
          <div class="flex items-center py-2 border-b cursor-pointer" onclick="toggleAccountMenu()">
            <span class="mr-2">👤</span>
            <div class="font-semibold text-dark-olive">Akun Saya</div>
            <span id="account-arrow" class="ml-auto text-black">▶</span>
          </div>
          <ul id="account-menu" class="py-2 space-y-2 border-b hidden">
            <li class="text-gray-700 hover:text-black cursor-pointer pl-6">Profil Saya</li>
            <li class="text-gray-700 hover:text-black cursor-pointer pl-6">Pengaturan akun</li>
            <li class="text-gray-700 hover:text-black cursor-pointer pl-6">Ganti password</li>
          </ul>
          <div class="flex items-center py-2 border-b cursor-pointer">
            <span class="mr-2">📋</span>
            <div class="font-semibold text-dark-olive">Riwayat Pesanan</div>
          </div>
          <div class="flex items-center py-2 border-b cursor-pointer">
            <span class="mr-2">🪙</span>
            <div class="font-semibold text-dark-olive">Riwayat Top Up</div>
          </div>
        </nav>
        <!-- Keluar button placed at the bottom -->
        <div class="mt-auto flex items-center text-red-600 cursor-pointer pt-4">
          <span class="mr-2">↩️</span>
          <span class="font-medium">Keluar</span>
        </div>
      </aside>
    </div>

    <!-- Main Content -->
    <main class="flex-1 bg-white rounded-lg border border-dark-olive min-h-[600px]">
      <!-- Tabs -->
      <div class="flex border-b">
        <button onclick="switchTab('account')" class="px-4 py-2 text-white font-semibold flex-1 text-center cursor-pointer bg-dark-olive">Akun Saya</button>
        <button onclick="switchTab('orders')" class="px-4 py-2 text-white font-semibold flex-1 text-center cursor-pointer bg-dark-olive">Riwayat Pesanan</button>
        <button class="px-4 py-2 font-semibold flex-1 text-center bg-lime-200">Riwayat Top Up</button>
      </div>

      <div class="p-4">
        <h2 class="text-center font-bold text-lg mb-4">Riwayat Top Up</h2>

        <!-- Filters -->
        <div class="flex space-x-4 mb-6 justify-center">
          <div class="relative">
            <button onclick="showFilterOptions('date-filter')" class="border border-gray-300 px-4 py-1 rounded-full flex items-center">
              <span id="date-button-text">Tanggal</span>
              <span id="date-filter-arrow" class="ml-2 text-black">▼</span>
            </button>
            <div id="date-filter" class="hidden absolute mt-1 bg-white border border-gray-300 rounded-md shadow-lg z-10 w-48">
              <div class="p-2">
                <input type="date" value="2025-03-05" class="border rounded w-full px-2 py-1 mb-2">
                <div class="flex space-x-2">
                  <button onclick="applyDateFilter()" class="bg-dark-olive text-white rounded py-1 px-2 flex-1">Terapkan</button>
                  <button onclick="resetFilters()" class="bg-gray-200 text-gray-700 rounded py-1 px-2 flex-1">Reset</button>
                </div>
              </div>
            </div>
          </div>
          <div class="relative">
            <button onclick="showFilterOptions('method-filter')" class="border border-gray-300 px-4 py-1 rounded-full flex items-center">
              <span id="method-button-text">Metode</span>
              <span id="method-filter-arrow" class="ml-2 text-black">▼</span>
            </button>
            <div id="method-filter" class="hidden absolute mt-1 bg-white border border-gray-300 rounded-md shadow-lg z-10 w-48">
              <div class="p-2">
                <div class="space-y-2">
                  <div class="cursor-pointer hover:bg-gray-100 p-1 rounded" onclick="applyMethodFilter('GoPay')">GoPay</div>
                  <div class="cursor-pointer hover:bg-gray-100 p-1 rounded" onclick="applyMethodFilter('DANA')">DANA</div>
                  <div class="cursor-pointer hover:bg-gray-100 p-1 rounded" onclick="applyMethodFilter('M-Banking')">M-Banking</div>
                  <div class="cursor-pointer hover:bg-gray-100 p-1 rounded" onclick="applyMethodFilter('QRIS')">QRIS</div>
                  <hr class="my-1">
                  <div class="cursor-pointer hover:bg-gray-100 p-1 rounded text-center" onclick="resetFilters()">Reset Filter</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Top Up History -->
        <div class="transaction-container space-y-6 px-2">
          <!-- First date group -->
          <div class="date-group">
            <p class="font-semibold">Sabtu, 5 Maret 2025</p>
            <div class="transaction-item cursor-pointer" data-date="05-03-2025" data-method="GoPay" onclick="showTransactionDetails('9000', 'Jumat, 4 Maret 2025', '2790-120-35-0665-09')">
              <div class="bg-white p-4 rounded-md border border-gray-200 mt-2 flex justify-between items-center">
                <div class="flex items-center">
                  <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">
                    🪙
                  </div>
                  <div>
                    <p class="font-bold">Nabila</p>
                    <p class="text-sm text-gray-500">2790-167-35-9005-21</p>
                  </div>
                </div>
                <div class="text-right">
                  <p class="text-lg font-semibold">Rp.9.000,00</p>
                  <div class="flex items-center justify-end text-sm text-gray-500">
                    <span>GoPay Saldo</span>
                    <span class="ml-1 text-black">▼</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Second date group -->
          <div class="date-group">
            <p class="font-semibold">Jumat, 4 Maret 2025</p>
            <div class="space-y-2">
              <div class="transaction-item cursor-pointer" data-date="04-03-2025" data-method="GoPay" onclick="showTransactionDetails('8000', 'Jumat, 4 Maret 2025', '2790-120-35-0665-09')">
                <div class="bg-white p-4 rounded-md border border-gray-200 flex justify-between items-center">
                  <div class="flex items-center">
                    <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">
                      🪙
                    </div>
                    <div>
                      <p class="font-bold">Nabila</p>
                      <p class="text-sm text-gray-500">2790-120-35-0665-09</p>
                    </div>
                  </div>
                  <div class="text-right">
                    <p class="text-lg font-semibold">Rp.8.000,00</p>
                    <div class="flex items-center justify-end text-sm text-gray-500">
                      <span>GoPay Saldo</span>
                      <span class="ml-1 text-black">▼</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="transaction-item cursor-pointer" data-date="04-03-2025" data-method="DANA" onclick="showTransactionDetails('20000', 'Jumat, 4 Maret 2025', '2910-133-35-8005-03')">
                <div class="bg-white p-4 rounded-md border border-gray-200 flex justify-between items-center">
                  <div class="flex items-center">
                    <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">
                      🪙
                    </div>
                    <div>
                      <p class="font-bold">Nabila</p>
                      <p class="text-sm text-gray-500">2910-133-35-8005-03</p>
                    </div>
                  </div>
                  <div class="text-right">
                    <p class="text-lg font-semibold">Rp.20.000,00</p>
                    <div class="flex items-center justify-end text-sm text-gray-500">
                      <span>DANA Saldo</span>
                      <span class="ml-1 text-black">▼</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Placeholder when filtered content is empty -->
          <div id="empty-state" class="hidden py-12 text-center text-gray-500">
            <p>Tidak ada transaksi yang sesuai dengan filter</p>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Transaction Detail Modal -->
  <div id="transaction-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-20">
    <div class="bg-white rounded-lg shadow-lg w-80 relative">
      <button onclick="closeModal()" class="absolute right-0 top-0 p-2 text-gray-600 hover:text-gray-900">✕</button>
      <div class="p-4">
        <h3 class="text-center font-bold border-b pb-2">Detail Pembelian Token</h3>
        <div class="space-y-2 mt-3">
          <div>
            <p class="text-gray-600 text-sm">Nominal Token</p>
            <p id="modal-nominal" class="font-medium">Rp.9.000,00</p>
          </div>
          <div>
            <p class="text-gray-600 text-sm">Tanggal Pembelian</p>
            <p id="modal-date" class="font-medium">Jumat, 4 Maret 2025</p>
          </div>
          <div>
            <p class="text-gray-600 text-sm">Nomor Token</p>
            <p id="modal-token" class="font-medium">2790-120-35-0665-09</p>
          </div>
        </div>
        <button class="w-full bg-dark-olive text-white py-2 rounded-md mt-4">Detail Klaim</button>
      </div>
    </div>
  </div>

  <script>
    // Ketika dokumen sudah dimuat sepenuhnya
    document.addEventListener('DOMContentLoaded', function() {
      setupListeners();
    });

    function setupListeners() {
      // Atur listener untuk setiap item transaksi
      const allTransactionItems = document.querySelectorAll('.transaction-item');
      allTransactionItems.forEach(item => {
        // Tandai data tanggal dan metode pada setiap item
        item.dataset.date = item.getAttribute('data-date');
        item.dataset.method = item.getAttribute('data-method');
      });
    }

    function toggleAccountMenu() {
      const accountMenu = document.getElementById('account-menu');
      const accountArrow = document.getElementById('account-arrow');
      accountMenu.classList.toggle('hidden');
      // Ubah arah panah
      if (accountMenu.classList.contains('hidden')) {
        accountArrow.innerHTML = '▶';
      } else {
        accountArrow.innerHTML = '▼';
      }
    }

    function switchTab(tabName) {
      // Fungsi untuk mengganti tab yang aktif
      console.log(`Switching to ${tabName} tab`);
    }

    function showFilterOptions(filterId) {
      const filterMenu = document.getElementById(filterId);
      const filterArrow = document.getElementById(filterId + '-arrow');
      filterMenu.classList.toggle('hidden');
      // Ubah arah panah
      if (filterMenu.classList.contains('hidden')) {
        filterArrow.innerHTML = '▶';
      } else {
        filterArrow.innerHTML = '▼';
      }
    }

    function applyDateFilter() {
      const selectedDate = document.querySelector('#date-filter input').value;
      // Format tanggal dari input (yyyy-mm-dd) ke format yang sesuai dengan data-date (dd-mm-yyyy)
      if (selectedDate) {
        const dateParts = selectedDate.split('-');
        const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;

        // Sembunyikan filter dan ubah arah panah
        document.getElementById('date-filter').classList.add('hidden');
        document.getElementById('date-filter-arrow').innerHTML = '▶';

        // Tampilkan/sembunyikan transaksi berdasarkan tanggal
        filterTransactions('date', formattedDate);

        // Update teks di tombol filter
        document.getElementById('date-button-text').textContent = `Tanggal: ${formattedDate}`;
      }
    }

    function applyMethodFilter(method) {
      // Sembunyikan filter dan ubah arah panah
      document.getElementById('method-filter').classList.add('hidden');
      document.getElementById('method-filter-arrow').innerHTML = '▶';

      // Tampilkan/sembunyikan transaksi berdasarkan metode
      filterTransactions('method', method);

      // Update teks di tombol filter
      document.getElementById('method-button-text').textContent = `Metode: ${method}`;
    }

    function filterTransactions(filterType, filterValue) {
      // Ambil semua grup tanggal
      const dateGroups = document.querySelectorAll('.date-group');

      dateGroups.forEach(group => {
        let hasVisibleTransaction = false;
        // Ambil semua transaksi dalam grup ini
        const transactions = group.querySelectorAll('.transaction-item');

        transactions.forEach(transaction => {
          // Periksa apakah transaksi cocok dengan filter
          const matches = transaction.getAttribute(`data-${filterType}`) === filterValue;

          if (matches) {
            transaction.classList.remove('hidden');
            hasVisibleTransaction = true;
          } else {
            transaction.classList.add('hidden');
          }
        });

        // Tampilkan/sembunyikan grup tanggal berdasarkan apakah ada transaksi yang terlihat
        if (hasVisibleTransaction) {
          group.classList.remove('hidden');
        } else {
          group.classList.add('hidden');
        }
      });
    }

    function resetFilters() {
      // Reset semua filter
      document.querySelectorAll('.transaction-item').forEach(item => {
        item.classList.remove('hidden');
      });

      document.querySelectorAll('.date-group').forEach(group => {
        group.classList.remove('hidden');
      });

      // Reset teks tombol filter
      document.getElementById('date-button-text').textContent = 'Tanggal';
      document.getElementById('method-button-text').textContent = 'Metode';

      // Reset UI filter
      document.getElementById('date-filter').classList.add('hidden');
      document.getElementById('date-filter-arrow').innerHTML = '▶';
      document.getElementById('method-filter').classList.add('hidden');
      document.getElementById('method-filter-arrow').innerHTML = '▶';
    }

    function showTransactionDetails(nominal, date, token) {
      // Set modal content
      document.getElementById('modal-nominal').textContent = `Rp.${nominal},00`;
      document.getElementById('modal-date').textContent = date;
      document.getElementById('modal-token').textContent = token;

      // Show modal
      document.getElementById('transaction-modal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('transaction-modal').classList.add('hidden');
    }
  </script>
</body>
</html>
