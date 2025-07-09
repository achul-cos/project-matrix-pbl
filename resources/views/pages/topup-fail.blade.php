@extends('layout.app')

@section('content')
<div class="max-w-xl mx-auto mt-20 rounded-2xl overflow-hidden shadow-xl border border-red-300 bg-white relative">
    <div class="bg-gradient-to-r from-red-800 to-red-600 text-white py-6 px-6 text-center z-10 relative">
        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Pembayaran Gagal</h1>
        <p class="text-sm opacity-90 mt-1">Mohon coba lagi atau gunakan metode lain</p>
    </div>

    <div class="px-6 py-8 space-y-6 text-sm font-medium text-gray-800 relative z-10">
        <div class="text-center text-red-600 text-lg">
            <svg class="mx-auto mb-2 w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Transaksi gagal diproses.
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-medium text-sm">
            <a href="{{route('home')}}" class="bg-gray-200 hover:bg-gray-300 py-3 rounded-xl text-center text-gray-700 shadow">
                Kembali ke Beranda
            </a>
            <a href="{{route('topup')}}" class="bg-red-600 hover:bg-red-500 text-white py-3 rounded-xl text-center shadow">
                Coba Lagi
            </a>
        </div>
    </div>
</div>
@endsection
