@extends('layout.app')

@section('content')
<div class="max-w-md mx-auto mt-24 bg-white rounded-3xl shadow-2xl overflow-hidden border border-lime-300">
    <!-- Header -->
    <div class="bg-gradient-to-r from-lime-950 to-lime-700 text-white py-6 px-6 text-center">
        <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight uppercase">E-Struk Pembayaran</h2>
        <p class="text-sm opacity-90 mt-1">Terima kasih telah membeli token di Matrix Warnet</p>
    </div>

    <!-- Isi Struk -->
    <div class="px-6 py-8 text-sm font-medium text-gray-800 space-y-6 bg-white">
        <div class="flex justify-between items-center border-b border-dashed pb-3">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-lime-800" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 9V7a4 4 0 00-8 0v2M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>Token Dibeli</span>
            </div>
            <span class="font-bold text-lime-900" id="tokenDisplay">0</span>
        </div>

        <div class="flex justify-between items-center border-b border-dashed pb-3">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8c-1.105 0-2 .672-2 1.5S10.895 11 12 11s2 .672 2 1.5S13.105 14 12 14s-2 .672-2 1.5S10.895 17 12 17" />
                </svg>
                <span>Harga per Token</span>
            </div>
            <span class="text-gray-700">Rp 2.000</span>
        </div>

        <div class="flex justify-between items-center border-b border-dashed pb-3 text-base">
            <div class="flex items-center gap-2 font-semibold">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                <span>Total</span>
            </div>
            <span class="font-bold text-lime-950" id="totalPrice">Rp 0</span>
        </div>

        <!-- Tombol Bayar -->
        <div class="text-center mt-8">
            <button id="pay-button"
                class="bg-lime-950 hover:bg-lime-800 active:scale-95 transition-all duration-300 transform hover:scale-105 text-white font-bold text-sm tracking-wide px-8 py-3 rounded-xl shadow-xl">
                Bayar Sekarang
            </button>
            <p id="loading-text" class="text-sm text-gray-400 mt-2 hidden">Memproses pembayaran...</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-gray-100 text-gray-400 text-center text-xs py-3 tracking-wider">
        Copyrighted Matrix 2025 | Payment Powered By Xendit
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const tokenAmount = parseInt(urlParams.get('token') || 0);
    const pricePerToken = 2000;
    const totalPrice = parseInt(tokenAmount * pricePerToken);

    // Validasi minimal token
    if (tokenAmount <= 0) {
        alert('Jumlah token tidak valid. Silakan kembali ke halaman sebelumnya.');
        window.history.back();
        return;
    }

    document.getElementById('tokenDisplay').textContent = tokenAmount;
    document.getElementById('totalPrice').textContent = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(totalPrice);

    document.getElementById('pay-button').addEventListener('click', function () {
        const loadingText = document.getElementById('loading-text');
        const payButton = document.getElementById('pay-button');
        
        // Disable button dan show loading
        payButton.disabled = true;
        payButton.textContent = 'Memproses...';
        loadingText.classList.remove('hidden');

        fetch('/payment-process', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            credentials: 'same-origin',
            body: JSON.stringify({
                token_amount: tokenAmount,
                total: totalPrice
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log("✅ DATA DARI SERVER:", data);
            
            if (data.checkout_url) {
                // Redirect langsung ke halaman pembayaran Xendit
                window.location.href = data.checkout_url;
            } else if (data.redirect_url) {
                // Fallback jika menggunakan redirect_url
                window.location.href = data.redirect_url;
            } else {
                throw new Error('URL pembayaran tidak ditemukan');
            }
        })
        .catch(error => {
            console.error('❌ Error:', error);
            
            // Reset button state
            payButton.disabled = false;
            payButton.textContent = 'Bayar Sekarang';
            loadingText.classList.add('hidden');
            
            alert("Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.");
        });
    });
});
</script>

@endsection