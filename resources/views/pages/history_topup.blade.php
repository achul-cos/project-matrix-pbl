@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
<!-- Main Content -->
<div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">
  @include('components.sidebar_profile')

  <!-- Main Section -->
  <main class="flex-1 bg-white rounded-lg border border-dark-olive min-h-[600px]">
    <div class="p-4">
      <h2 class="text-center font-bold text-lg mb-4">Riwayat Top Up</h2>

      <!-- Filters (Kosong) -->
      <div class="flex space-x-4 mb-6 justify-center"></div>

      <!-- Transaction Groups -->
      <div class="space-y-6 px-2">

        <!-- Group: Sabtu, 5 Maret 2025 -->
        <div class="date-group">
          <p class="font-semibold">Sabtu, 5 Maret 2025</p>
          <div class="transaction-item cursor-pointer transition hover:scale-101 active:scale-99 active:ring-2 active:ring-lime-600 active:bg-green-100 mt-2"
               onclick="showTransactionDetails('9000', 'Sabtu, 5 Maret 2025', '2790-167-35-9005-21')"
               data-date="05-03-2025" data-method="QRIS">
            <div class="p-4 rounded-md border border-green-600 flex justify-between items-center bg-green-100">
              <div class="flex items-center">
                <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">🪙</div>
                <div>
                  <p class="font-bold">Nabila</p>
                  <p class="text-sm text-gray-500">2790-167-35-9005-21</p>
                </div>
              </div>
              <div class="text-right">
                <p class="text-lg font-semibold">Rp.9.000,00</p>
                <p class="text-xs text-gray-500 font-medium hover:font-bold transform transition-transform">Bukti Transaksi</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Group: Jumat, 4 Maret 2025 -->
        <div class="date-group">
          <p class="font-semibold">Jumat, 4 Maret 2025</p>
          <div class="space-y-2">

            <!-- Item 1 -->
            <div class="transaction-item cursor-pointer transition hover:scale-101 active:scale-99 active:ring-2 active:ring-lime-600 active:bg-green-100"
                 onclick="showTransactionDetails('8000', 'Jumat, 4 Maret 2025', '2790-120-35-0665-09')"
                 data-date="04-03-2025" data-method="QRIS">
              <div class="p-4 rounded-md border border-green-600 flex justify-between items-center bg-green-100">
                <div class="flex items-center">
                  <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">🪙</div>
                  <div>
                    <p class="font-bold">Nabila</p>
                    <p class="text-sm text-gray-500">2790-120-35-0665-09</p>
                  </div>
                </div>
                <div class="text-right">
                    <p class="text-lg font-semibold">Rp.8.000,00</p>
                    <p class="text-xs text-gray-500 font-medium hover:font-bold transform transition-transform">Bukti Transaksi</p>
                </div>
              </div>
            </div>

            <!-- Item 2 -->
            <div class="transaction-item cursor-pointer transition hover:scale-101 active:scale-99 active:ring-2 active:ring-lime-600 active:bg-green-100"
                 onclick="showTransactionDetails('20000', 'Jumat, 4 Maret 2025', '2910-133-35-8005-03')"
                 data-date="04-03-2025" data-method="QRIS">
              <div class="p-4 rounded-md border border-green-600 flex justify-between items-center bg-green-100">
                <div class="flex items-center">
                  <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">🪙</div>
                  <div>
                    <p class="font-bold">Nabila</p>
                    <p class="text-sm text-gray-500">2910-133-35-8005-03</p>
                  </div>
                </div>
                <div class="text-right">
                  <p class="text-lg font-semibold">Rp.20.000,00</p>
                  <p class="text-xs text-gray-500 font-medium hover:font-bold transform transition-transform">Bukti Transaksi</p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Empty State -->
        <div id="empty-state" class="hidden py-12 text-center text-gray-500">
          <p>Tidak ada transaksi yang sesuai dengan filter</p>
        </div>

      </div>
    </div>
  </main>
</div>

<!-- Transaction Detail Modal -->
<div id="transaction-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto">
  <div id="transaction-receipt" class="bg-white bg-opacity-90 rounded-2xl shadow-xl w-80 relative m-4">
    <button onclick="closeModal()" class="absolute right-3 top-3 text-gray-500 hover:text-red-600 text-2xl font-bold">×</button>
    <div class="p-6 space-y-4">
      <h3 class="text-center text-green-600 font-bold text-base">✅ Pembayaran QRIS Berhasil</h3>
      <div class="text-sm space-y-2">
        <div>
          <p class="text-gray-600">Nominal Token</p>
          <p id="modal-nominal" class="font-semibold text-gray-800">Rp.9.000,00</p>
        </div>
        <div>
          <p class="text-gray-600">Tanggal Pembelian</p>
          <p id="modal-date" class="font-semibold text-gray-800">Sabtu, 5 Maret 2025</p>
        </div>
        <div>
          <p class="text-gray-600">Kode Token</p>
          <p id="modal-token" class="font-semibold text-gray-800">2790-167-35-9005-21</p>
        </div>
      </div>
      <div class="text-sm pt-4 border-t space-y-1">
        <p><span class="font-semibold">Penerima:</span> matrix</p>
        <p><span class="font-semibold">Sumber Dana:</span> Nabila</p>
      </div>
      <div class="space-y-2 pt-4">
        <button onclick="closeModal()" class="w-full bg-lime-700 hover:bg-lime-800 text-white py-2 rounded-md transition">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  function showTransactionDetails(nominal, tanggal, token) {
    document.getElementById('modal-nominal').innerText = 'Rp.' + nominal + ',00';
    document.getElementById('modal-date').innerText = tanggal;
    document.getElementById('modal-token').innerText = token;
    document.getElementById('transaction-modal').classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('transaction-modal').classList.add('hidden');
  }

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

    document.getElementById('date-filter')?.classList.add('hidden');
    document.getElementById('method-filter')?.classList.add('hidden');
  }
</script>
@endsection
