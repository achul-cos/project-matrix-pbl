@extends('layout.app')

@section('title', 'Matrix - Riwayat Top Up')

@section('content')
<!-- Main Content -->
<div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">
  @include('components.sidebar_profile')

  <!-- Main Section -->
  <main class="flex-1 bg-white rounded-lg border border-dark-olive min-h-[600px]">
    <div class="p-4">
      <h2 class="text-center font-bold text-lg mb-4">Riwayat Top Up</h2>

      <!-- Tabs -->
      <div class="flex border-b border-gray-200 mb-6">
        <button class="tab-btn active py-2 px-4 font-medium" data-tab="all">Semua</button>
        <button class="tab-btn py-2 px-4 font-medium" data-tab="success">Berhasil</button>
        <button class="tab-btn py-2 px-4 font-medium" data-tab="pending">Pending</button>
        <button class="tab-btn py-2 px-4 font-medium" data-tab="failed">Gagal</button>
      </div>

      <!-- Transaction Groups -->
      <div class="space-y-6 px-2">
        <!-- All Payments Section -->
        <div id="all-section" class="tab-content">
          @foreach($groupedPayments as $date => $payments)
            @php
              $carbonDate = \Carbon\Carbon::parse($date);
              $formattedDate = $carbonDate->isoFormat('dddd, D MMMM YYYY');
            @endphp
            <div class="date-group">
              <p class="font-semibold">{{ $formattedDate }}</p>
              <div class="space-y-2">
                @foreach($payments as $payment)
                  @php
                    // Tentukan styling berdasarkan status
                    $styles = [
                      'pending' => ['bg-yellow-100', 'border-yellow-500', '🕒', 'Menunggu Pembayaran'],
                      'success' => [
                        $payment->payment_method === 'coupon' 
                          ? ['bg-green-50', 'border-green-400', '🎫', 'Redeem Kupon']
                          : ['bg-green-100', 'border-green-600', '🪙', 'Topup Token']
                      ],
                      'failed' => ['bg-red-100', 'border-red-500', '❌', 'Pembayaran Gagal']
                    ];
                    
                    $style = $styles[$payment->status] ?? $styles['success'];
                    if (is_array($style[0])) {
                      $style = $style[0]; // Handle nested array for success with coupon
                    }
                  @endphp
                  
                  <div class="transaction-item cursor-pointer transition hover:scale-101 active:scale-99 active:ring-2 active:ring-lime-600 active:bg-green-100"
                       onclick="showTransactionDetails({{ json_encode($payment) }})">
                    <div class="p-4 rounded-md border {{ $style[1] }} flex justify-between items-center {{ $style[0] }}">
                      <div class="flex items-center">
                        <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">{{ $style[2] }}</div>
                        <div>
                          <p class="font-bold">{{ $style[3] }}</p>
                          <p class="text-sm text-gray-500">ID: {{ $payment->external_id ?? $payment->id }}</p>
                        </div>
                      </div>
                      <div class="text-right">
                        @if($payment->status === 'success')
                          <p class="text-lg font-semibold">+{{ $payment->token_amount }} Token</p>
                        @endif
                        <p class="{{ $payment->status === 'success' ? 'text-sm' : 'text-lg font-semibold' }}">
                          Rp {{ number_format($payment->qty_bill, 0, ',', '.') }}
                        </p>
                        @if($payment->status === 'pending')
                          <p class="text-xs text-gray-500 font-medium">Selesaikan Pembayaran</p>
                        @elseif($payment->status === 'failed')
                          <p class="text-xs text-red-700 font-medium">Coba Lagi</p>
                        @endif
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endforeach
          
          @if($groupedPayments->isEmpty())
            <div class="py-4 text-center text-gray-500">
              <p>Tidak ada transaksi</p>
            </div>
          @endif
        </div>

        <!-- Pending Payments Section -->
        <div id="pending-section" class="tab-content hidden">
          @if($pendingPayments->count() > 0)
            @foreach($pendingPayments as $payment)
              @php
                $date = \Carbon\Carbon::parse($payment->payment_start);
                $formattedDate = $date->isoFormat('dddd, D MMMM YYYY');
              @endphp
              
              <div class="date-group">
                <p class="font-semibold">{{ $formattedDate }}</p>
                <div class="transaction-item cursor-pointer transition hover:scale-101 active:scale-99 active:ring-2 active:ring-lime-600 active:bg-green-100 mt-2"
                     onclick="showTransactionDetails({{ $payment }})">
                  <div class="p-4 rounded-md border border-yellow-500 flex justify-between items-center bg-yellow-100">
                    <div class="flex items-center">
                      <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">🕒</div>
                      <div>
                        <p class="font-bold">Menunggu Pembayaran</p>
                        <p class="text-sm text-gray-500">ID: {{ $payment->external_id ?? $payment->id }}</p>
                      </div>
                    </div>
                    <div class="text-right">
                      <p class="text-lg font-semibold">Rp {{ number_format($payment->qty_bill, 0, ',', '.') }}</p>
                      <p class="text-xs text-gray-500 font-medium">Selesaikan Pembayaran</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="py-4 text-center text-gray-500">
              <p>Tidak ada transaksi pending</p>
            </div>
          @endif
        </div>

        <!-- Success Payments Section -->
        <div id="success-section" class="tab-content hidden">
          @if($successPayments->count() > 0)
            @foreach($successPayments->groupBy(function($item) {
                return \Carbon\Carbon::parse($item->payment_start)->format('Y-m-d');
            }) as $date => $payments)
              @php
                $carbonDate = \Carbon\Carbon::parse($date);
                $formattedDate = $carbonDate->isoFormat('dddd, D MMMM YYYY');
              @endphp
              
              <div class="date-group">
                <p class="font-semibold">{{ $formattedDate }}</p>
                <div class="space-y-2">
                  @foreach($payments as $payment)
                    @php
                      $icon = '🪙'; // Default icon for token
                      $bgColor = 'bg-green-100';
                      $borderColor = 'border-green-600';
                      
                      if ($payment->payment_method === 'coupon') {
                        $icon = '🎫';
                      }
                    @endphp
                    
                    <div class="transaction-item cursor-pointer transition hover:scale-101 active:scale-99 active:ring-2 active:ring-lime-600 active:bg-green-100"
                         onclick="showTransactionDetails({{ $payment }})">
                      <div class="p-4 rounded-md border {{ $borderColor }} flex justify-between items-center {{ $bgColor }}">
                        <div class="flex items-center">
                          <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">{{ $icon }}</div>
                          <div>
                            <p class="font-bold">
                              @if($payment->payment_method === 'coupon')
                                Redeem Kupon
                              @else
                                Topup Token
                              @endif
                            </p>
                            <p class="text-sm text-gray-500">ID: {{ $payment->external_id ?? $payment->id }}</p>
                          </div>
                        </div>
                        <div class="text-right">
                          <p class="text-lg font-semibold">+{{ $payment->token_amount }} Token</p>
                          <p class="text-sm">Rp {{ number_format($payment->qty_bill, 0, ',', '.') }}</p>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          @else
            <div class="py-4 text-center text-gray-500">
              <p>Tidak ada transaksi berhasil</p>
            </div>
          @endif
        </div>

        <!-- Failed Payments Section -->
        <div id="failed-section" class="tab-content hidden">
          @if($failedPayments->count() > 0)
            @foreach($failedPayments as $payment)
              @php
                $date = \Carbon\Carbon::parse($payment->payment_start);
                $formattedDate = $date->isoFormat('dddd, D MMMM YYYY');
              @endphp
              
              <div class="date-group">
                <p class="font-semibold">{{ $formattedDate }}</p>
                <div class="transaction-item cursor-pointer transition hover:scale-101 active:scale-99 active:ring-2 active:ring-lime-600 active:bg-green-100 mt-2"
                     onclick="showTransactionDetails({{ $payment }})">
                  <div class="p-4 rounded-md border border-red-500 flex justify-between items-center bg-red-100">
                    <div class="flex items-center">
                      <div class="w-8 h-8 bg-amber-200 rounded mr-3 flex items-center justify-center text-amber-600">❌</div>
                      <div>
                        <p class="font-bold">Pembayaran Gagal</p>
                        <p class="text-sm text-gray-500">ID: {{ $payment->external_id ?? $payment->id }}</p>
                      </div>
                    </div>
                    <div class="text-right">
                      <p class="text-lg font-semibold">Rp {{ number_format($payment->qty_bill, 0, ',', '.') }}</p>
                      <p class="text-xs text-red-700 font-medium">Coba Lagi</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="py-4 text-center text-gray-500">
              <p>Tidak ada transaksi gagal</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </main>
</div>

<!-- Transaction Detail Modal -->
<div id="transaction-modal" class="hidden fixed inset-0 z-1000 flex items-center justify-center bg-black/50">
  <div id="transaction-receipt" class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 p-6 border border-lime-800 relative animate-fade-in">
    
    <!-- Tombol close -->
    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold">×</button>

    <!-- Header -->
    <div class="text-center mb-4">
      <h3 class="text-xl font-bold text-lime-800 mb-1 flex justify-center items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-lime-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0v2m6-2v2m-9-2h12a2 2 0 012 2v1a2 2 0 01-2 2H6a2 2 0 01-2-2v-1a2 2 0 012-2z" />
        </svg>
        Detail Transaksi
      </h3>
      <p class="text-sm text-gray-500">Berikut adalah ringkasan transaksi Anda</p>
    </div>

    <!-- Isi -->
    <div class="space-y-3 text-sm text-gray-800">
      <div class="flex justify-between"><span class="font-medium">ID Transaksi:</span><span id="modal-transaction-id"></span></div>
      <div class="flex justify-between"><span class="font-medium">Tanggal:</span><span id="modal-date"></span></div>
      <div class="flex justify-between"><span class="font-medium">Metode:</span><span id="modal-method"></span></div>
      <div class="flex justify-between"><span class="font-medium">Jumlah Token:</span><span id="modal-tokens" class="text-lime-700 font-semibold"></span></div>
      <div class="flex justify-between"><span class="font-medium">Total Bayar:</span><span id="modal-amount" class="font-bold"></span></div>

      <div id="modal-coupon-container" class="hidden flex justify-between">
        <span class="font-medium">Kode Kupon:</span><span id="modal-coupon"></span>
      </div>

      <div id="modal-payment-container" class="hidden flex justify-between">
        <span class="font-medium">Status:</span><span id="modal-status"></span>
      </div>
    </div>

    <!-- Tombol aksi -->
    <div id="modal-actions" class="space-y-3 mt-6">
      <!-- Dynamic -->
    </div>
  </div>
</div>

<script>
function showTransactionDetails(payment) {
  const date = new Date(payment.payment_start);
  const formattedDate = date.toLocaleDateString('id-ID', { 
    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
  });

  const tokenAmount = payment.token_amount ?? Math.floor(payment.qty_bill / 2000); // Fallback hitung otomatis

  document.getElementById('modal-transaction-id').textContent = payment.external_id || payment.id;
  document.getElementById('modal-date').textContent = formattedDate;
  document.getElementById('modal-method').textContent = getPaymentMethodName(payment.payment_method);
  document.getElementById('modal-tokens').textContent = tokenAmount + ' Token';
  document.getElementById('modal-amount').textContent = 'Rp ' + payment.qty_bill.toLocaleString('id-ID');

  const couponContainer = document.getElementById('modal-coupon-container');
  if (payment.payment_method === 'coupon') {
    couponContainer.classList.remove('hidden');
    document.getElementById('modal-coupon').textContent = payment.note?.split(': ')[1] || '-';
  } else {
    couponContainer.classList.add('hidden');
  }

  const statusEl = document.getElementById('modal-status');
  const statusContainer = document.getElementById('modal-payment-container');
  if (payment.payment_method === 'online') {
    statusContainer.classList.remove('hidden');
    if (payment.status === 'success') {
      statusEl.textContent = 'Berhasil';
      statusEl.className = 'text-green-600 font-semibold';
    } else if (payment.status === 'pending') {
      statusEl.textContent = 'Menunggu Pembayaran';
      statusEl.className = 'text-yellow-500 font-semibold';
    } else {
      statusEl.textContent = 'Gagal';
      statusEl.className = 'text-red-600 font-semibold';
    }
  } else {
    statusContainer.classList.add('hidden');
  }

  const actions = document.getElementById('modal-actions');
  actions.innerHTML = '';

  if (payment.status === 'pending' && payment.payment_method === 'online') {
    const payBtn = document.createElement('a');
    payBtn.href = payment.checkout_link || '#';
    payBtn.target = '_blank';
    payBtn.textContent = '💳 Lanjutkan Pembayaran';
    payBtn.className = 'block w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md text-center';
    actions.appendChild(payBtn);
  }

  if (payment.status === 'failed' && payment.payment_method === 'online') {
    const retryBtn = document.createElement('a');
    retryBtn.href = "{{ route('topup') }}";
    retryBtn.textContent = '🔁 Coba Lagi';
    retryBtn.className = 'block w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-md text-center';
    actions.appendChild(retryBtn);
  }

  if (payment.status === 'success' && payment.payment_method !== 'coupon') {
    const downloadBtn = document.createElement('a');
    downloadBtn.href = "{{ url('download-receipt') }}/" + payment.id;
    downloadBtn.textContent = '⬇️ Unduh Struk';
    downloadBtn.className = 'block w-full bg-lime-700 hover:bg-lime-800 text-white py-2 rounded-md text-center';
    actions.appendChild(downloadBtn);
  }

  const closeBtn = document.createElement('button');
  closeBtn.textContent = 'Tutup';
  closeBtn.onclick = closeModal;
  closeBtn.className = 'block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 rounded-md text-center';
  actions.appendChild(closeBtn);

  document.getElementById('transaction-modal').classList.remove('hidden');
}

function closeModal() {
  document.getElementById('transaction-modal').classList.add('hidden');
}

function getPaymentMethodName(method) {
  const methods = {
    'cash': 'Tunai',
    'transfer': 'Transfer',
    'coupon': 'Kupon',
    'online': 'Online'
  };
  return methods[method] || method;
}
</script>
<style>
@keyframes fade-in {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fade-in 0.3s ease-out;
}
</style>

@endsection