@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">

        <!-- Sidebar -->
        <div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-4">
          <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F]"></div>
          <h2 class="text-[#556B2F] font-bold text-lg">Achul</h2>
          <ul class="space-y-2 w-full text-center text-sm">
            <li>Riwayat Penyewaan</li>
            <li>Riwayat Top Up</li>
            <li>Pengaturan Akun</li>
            <li>Ganti Password</li>
            <li class="text-red-600 font-semibold">Keluar Akun</li>
            <li class="text-red-700 font-bold">Hapus Akun</li>
          </ul>
        </div>

    <!-- Main Content -->
    <main class="flex-1 bg-white rounded-lg border border-dark-olive min-h-[600px]">


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
    <script>
        function showFilterOptions(id) {
          document.querySelectorAll('.hidden').forEach(el => {
            if (el.id === id) {
              el.classList.toggle('hidden');
            } else {
              el.classList.add('hidden');
            }
          });
        }

        function applyDateFilter() {
          const selectedDate = document.querySelector('#date-filter input[type="date"]').value;
          const formattedDate = new Date(selectedDate).toLocaleDateString('id-ID', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
          }).replace(/\//g, '-'); // Format ke 05-03-2025

          document.getElementById('date-button-text').innerText = selectedDate || 'Tanggal';
          filterTransactions(formattedDate, null);
        }

        function applyMethodFilter(method) {
          document.getElementById('method-button-text').innerText = method;
          filterTransactions(null, method);
        }

        function resetFilters() {
          document.getElementById('date-button-text').innerText = 'Tanggal';
          document.getElementById('method-button-text').innerText = 'Metode';
          document.querySelector('#date-filter input[type="date"]').value = '';

          const items = document.querySelectorAll('.transaction-item');
          items.forEach(item => item.closest('.date-group').style.display = 'block');
          items.forEach(item => item.style.display = 'block');

          // Tampilkan semua date-group
          document.querySelectorAll('.date-group').forEach(group => group.style.display = 'block');
          document.getElementById('empty-state').classList.add('hidden');
        }

        function filterTransactions(date = null, method = null) {
          const items = document.querySelectorAll('.transaction-item');
          let hasVisible = false;

          items.forEach(item => {
            const itemDate = item.getAttribute('data-date');
            const itemMethod = item.getAttribute('data-method');

            const matchDate = date ? itemDate === date : true;
            const matchMethod = method ? itemMethod === method : true;

            const visible = matchDate && matchMethod;
            item.style.display = visible ? 'block' : 'none';
          });

          // Sembunyikan grup yang tidak punya transaksi terlihat
          document.querySelectorAll('.date-group').forEach(group => {
            const visibleItems = group.querySelectorAll('.transaction-item:not([style*="display: none"])');
            group.style.display = visibleItems.length > 0 ? 'block' : 'none';
          });

          // Cek apakah semua transaksi disembunyikan
          const anyVisible = document.querySelectorAll('.transaction-item:not([style*="display: none"])').length > 0;
          document.getElementById('empty-state').classList.toggle('hidden', anyVisible);
        }

        function showTransactionDetails(nominal, tanggal, token) {
          document.getElementById('modal-nominal').innerText = 'Rp.' + nominal + ',00';
          document.getElementById('modal-date').innerText = tanggal;
          document.getElementById('modal-token').innerText = token;
          document.getElementById('transaction-modal').classList.remove('hidden');
        }

        function closeModal() {
          document.getElementById('transaction-modal').classList.add('hidden');
        }

        // Klik di luar modal = close
        window.addEventListener('click', function (e) {
          const modal = document.getElementById('transaction-modal');
          if (e.target === modal) closeModal();
        });
        function resetFilters() {
  document.getElementById('date-button-text').innerText = 'Tanggal';
  document.getElementById('method-button-text').innerText = 'Metode';
  document.querySelector('#date-filter input[type="date"]').value = '';

  const items = document.querySelectorAll('.transaction-item');
  items.forEach(item => item.closest('.date-group').style.display = 'block');
  items.forEach(item => item.style.display = 'block');

  document.querySelectorAll('.date-group').forEach(group => group.style.display = 'block');
  document.getElementById('empty-state').classList.add('hidden');

  // Tutup semua dropdown
  document.getElementById('date-filter').classList.add('hidden');
  document.getElementById('method-filter').classList.add('hidden');
}

      </script>


@endsection
