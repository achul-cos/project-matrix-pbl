@extends('layout.app')

@section('content')
<style>
    .fade-up {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<div id="successCard" class="max-w-xl mx-auto mt-20 rounded-2xl overflow-hidden shadow-xl border border-lime-300 fade-up bg-white relative">
    <!-- Confetti Canvas -->
    <canvas id="confetti-canvas" class="absolute inset-0 w-full h-full pointer-events-none z-0"></canvas>

    <!-- Header -->
    <div class="bg-gradient-to-r from-lime-950 to-lime-700 text-white py-6 px-6 text-center z-10 relative">
        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Pembayaran Berhasil</h1>
        <p class="text-sm opacity-90 mt-1">Token kamu sudah diproses</p>
    </div>

    <!-- Isi -->
    <div class="px-6 py-8 space-y-6 text-sm font-medium text-gray-800 relative z-10">
        <!-- Ringkasan -->
        <div class="bg-white border border-lime-300 text-lime-950 rounded-xl p-5 shadow-sm">
            <h3 class="text-lg font-semibold mb-3 border-b pb-1">Ringkasan Pembayaran</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center border-b border-dashed pb-2">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-800" fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                             d="M17 9V7a4 4 0 00-8 0v2M5 9h14l1 12H4L5 9z"/></svg>
                        <span>Token Dibeli</span>
                    </div>
                    <span class="font-bold">{{ $tokens ?? '10' }}</span>
                </div>
                <div class="flex justify-between items-center border-b border-dashed pb-2">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                             d="M12 8c-1.105 0-2 .672-2 1.5S10.895 11 12 11s2 .672 2 1.5S13.105 14 12 14s-2 .672-2 1.5S10.895 17 12 17"/></svg>
                        <span>Total Bayar</span>
                    </div>
                    <span class="font-bold">Rp {{ number_format($total ?? 10000, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>ID Transaksi:</span>
                    <span>#{{ $transactionId ?? 'TX123456' }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Waktu:</span>
                    <span>{{ \Carbon\Carbon::now()->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Tombol -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 font-medium text-sm">
            <a href="{{route('home')}}" class="transition transform hover:scale-105 active:scale-95 bg-lime-950 hover:bg-lime-800 text-white py-3 rounded-xl shadow-md text-center">
                Kembali ke Beranda
            </a>
            <a href="{{route('profile.history_topup')}}" class="transition transform hover:scale-105 active:scale-95 bg-lime-800 hover:bg-lime-700 text-white py-3 rounded-xl shadow-md text-center">
                Lihat Riwayat
            </a>
            <a href="{{ route('download.receipt', ['id' => $transactionId]) }}" class="transition transform hover:scale-105 active:scale-95 bg-lime-700 hover:bg-lime-600 text-white py-3 rounded-xl shadow-md text-center">
                Unduh Struk
            </a>
        </div>
    </div>
</div>

<!-- Confetti JS -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    const duration = 3 * 1000;
    const end = Date.now() + duration;

    (function frame() {
        confetti({
            particleCount: 3,
            angle: 60,
            spread: 70,
            origin: { x: 0 }
        });
        confetti({
            particleCount: 3,
            angle: 120,
            spread: 70,
            origin: { x: 1 }
        });

        if (Date.now() < end) {
            requestAnimationFrame(frame);
        }
    })();

    // Fade-up animation
    window.addEventListener('DOMContentLoaded', () => {
        document.getElementById('successCard').classList.add('show');
    });
</script>
@endsection
