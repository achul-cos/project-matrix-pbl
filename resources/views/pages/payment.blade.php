@extends('layout.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-md mt-20">
        <h1 class="text-2xl font-bold mb-6 text-center text-[#2F5F00]">Konfirmasi Pembayaran</h1>
        
        <div class="mb-4">
            <p class="text-gray-600">Jumlah Token yang dibeli:</p>
            <p class="text-xl font-semibold text-[#2F5F00]" id="tokenDisplay">0</p>
        </div>

        <div class="mb-6">
            <p class="text-gray-600">Total Harga:</p>
            <p class="text-xl font-semibold text-[#2F5F00]" id="totalPrice">Rp 0</p>
        </div>

        <!-- Tombol Bayar -->
        <div class="text-center mt-10">
            <button id="pay-button" class="inline-block bg-[#2F5F00] hover:bg-[#497F00] active:bg-[#3B6A00] text-white px-6 py-3 rounded-xl shadow-md transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                Bayar Sekarang
            </button>
        </div>
    </div>

    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-7qrxwKqjdzq2q0K6"></script>

    <!-- Script pembayaran -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const token = parseInt(urlParams.get('token') || 0);
            const tokenDisplay = document.getElementById('tokenDisplay');
            const totalPrice = document.getElementById('totalPrice');

            const pricePerToken = 2000;
            const total = token * pricePerToken;

            tokenDisplay.textContent = token;
            totalPrice.textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(total);

            const payBtn = document.getElementById('pay-button');
            payBtn.addEventListener('click', function () {
                fetch('/payment-process', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        token: token,
                        total: total
                    })
                })
                .then(response => response.json())
                .then(data => {
                    window.snap.pay(data.snap_token, {
                        onSuccess: function(result){
                            alert("Pembayaran berhasil!");
                            window.location.href = "/topup-success";
                        },
                        onPending: function(result){
                            alert("Menunggu pembayaran...");
                        },
                        onError: function(result){
                            alert("Pembayaran gagal!");
                        }
                    });
                });
            });
        });
    </script>
@endsection
