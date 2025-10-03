@extends('layout.app')

@section('title', 'Matrix - Laporan Penyewaan')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-4 md:px-6 md:flex md:gap-6">
    @include('components.sidebar_profile')

    <main class="flex-1 bg-white rounded-2xl border border-gray-200 min-h-[600px] shadow-xl overflow-hidden">
        <!-- Header Section -->
        <div class="relative p-8 bg-gradient-to-br from-dark-olive via-olive-drab to-green-700 overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full -translate-x-16 -translate-y-16"></div>
                <div class="absolute top-8 right-8 w-20 h-20 bg-white rounded-full opacity-20"></div>
                <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full translate-x-20 translate-y-20"></div>
            </div>
            
            <div class="relative z-10 text-center">
                <div class="flex justify-center mb-4">
                    <div class="p-4 bg-white/20 rounded-full backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-3 tracking-tight">
                    Riwayat Penyewaan
                </h1>
                <p class="text-lime-100 text-lg font-medium">
                    Pantau semua aktivitas penyewaan komputer Anda
                </p>
                <div class="mt-6 flex justify-center space-x-6 text-sm">
                    <div class="flex items-center text-lime-100">
                        <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                        <span>{{ $rentals->where('status', 'active')->count() }} Aktif</span>
                    </div>
                    <div class="flex items-center text-lime-100">
                        <div class="w-2 h-2 bg-blue-400 rounded-full mr-2"></div>
                        <span>{{ $rentals->where('status', 'pending')->count() }} Menunggu</span>
                    </div>
                    <div class="flex items-center text-lime-100">
                        <div class="w-2 h-2 bg-gray-400 rounded-full mr-2"></div>
                        <span>{{ $rentals->where('status', 'completed')->count() }} Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="p-6 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
            <form method="GET" action="{{ route('profile.history_rent') }}" class="max-w-2xl mx-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="w-full pl-12 pr-6 py-4 border-2 border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-dark-olive/20 focus:border-dark-olive transition-all duration-300 text-lg placeholder-gray-400"
                        placeholder="Cari berdasarkan kode pesanan, nama komputer, atau status..."
                    />
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <button type="submit" class="bg-dark-olive hover:bg-olive-drab text-white px-6 py-2 rounded-xl font-medium transition-all duration-300 transform hover:scale-105">
                            Cari
                        </button>
                    </div>
                </div>            
            </form>
        </div>

        <!-- Orders Content -->
        <div class="orders-container p-6 space-y-6">
            @if($rentals->isEmpty())
                @if(request('search'))
                    <!-- Tampilkan jika ada pencarian tetapi tidak ditemukan -->
                    <div class="py-20 text-center">
                        <div class="mx-auto w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-6 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-3">Penyewaan tidak ditemukan</h3>
                        <p class="text-gray-500 text-lg">Tidak ada riwayat penyewaan yang sesuai dengan pencarian Anda</p>
                    </div>
                @else
                    <!-- Tampilkan jika belum ada riwayat sama sekali -->
                    <div class="py-20 text-center">
                        <div class="mx-auto w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-6 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-3">Belum ada riwayat penyewaan</h3>
                        <p class="text-gray-500 mb-8 text-lg">Mulai petualangan gaming Anda di Matrix Warnet</p>
                        <a href="{{ route('home') }}" class="inline-flex items-center bg-gradient-to-r from-dark-olive to-olive-drab hover:from-olive-drab hover:to-dark-olive text-white px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Mulai Sewa Sekarang
                        </a>
                    </div>
                @endif
            @else
                @foreach($rentals as $rental)
                    <a href="{{ route('user.rental.confirmation', $rental->id) }}" class="order-item block border-2 border-gray-100 rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-dark-olive transform hover:-translate-y-1 bg-white">
                        <div class="flex justify-between items-center p-5 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                            <div class="flex items-center gap-4">
                                <div class="status-indicator-container relative">
                                    <div class="status-indicator h-4 w-4 rounded-full
                                        {{ $rental->status === 'completed' ? 'bg-green-500 shadow-green-200' : 
                                           ($rental->status === 'active' ? 'bg-yellow-500 shadow-yellow-200' : 
                                           ($rental->status === 'pending' ? 'bg-blue-500 shadow-blue-200' : 'bg-gray-500 shadow-gray-200')) }} shadow-lg"></div>
                                    <div class="absolute inset-0 rounded-full animate-ping
                                        {{ $rental->status === 'active' ? 'bg-yellow-400 opacity-75' : 
                                           ($rental->status === 'pending' ? 'bg-blue-400 opacity-75' : '') }}"></div>
                                </div>
                                <div>
                                    <span class="font-bold text-gray-800 text-lg">{{ $rental->activation_code }}</span>
                                    <p class="text-sm text-gray-500 mt-1">{{ $rental->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-bold px-4 py-2 rounded-full border-2
                                    {{ $rental->status === 'completed' ? 'bg-green-50 text-green-700 border-green-200' : 
                                       ($rental->status === 'active' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : 
                                       ($rental->status === 'pending' ? 'bg-blue-50 text-blue-700 border-blue-200' : 'bg-gray-50 text-gray-700 border-gray-200')) }}">
                                    @if($rental->status === 'completed')
                                        ✅ SELESAI
                                    @elseif($rental->status === 'active')
                                        🔄 SEDANG DIGUNAKAN
                                    @elseif($rental->status === 'pending')
                                        ⏳ MENUNGGU
                                    @else
                                        ❌ KADALUARSA
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col lg:flex-row gap-6">
                            <div class="flex-shrink-0">
                                <div class="relative group">
                                    <a href="{{ route('productPage.show', $rental->product->id) }}" class="block" onclick="event.stopPropagation()">
                                        <div class="w-40 h-40 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center overflow-hidden border-2 border-gray-200 shadow-lg group-hover:shadow-xl transition-all duration-300">
                                            @if($rental->product->image1)
                                                <img src="{{ asset($rental->product->image1) ?? asset('img/ad/placeholder1.png') }}" alt="{{ $rental->product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-dark-olive text-white bg-lime-800 text-sm px-4 py-2 rounded-full font-bold shadow-lg">
                                            {{ $rental->product->code }}
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="flex-1">
                                <div class="flex flex-col lg:flex-row lg:justify-between h-full">
                                    <div class="mb-6 lg:mb-0 flex-1">
                                        <a href="{{ route('productPage.show', $rental->product->id) }}" class="block" onclick="event.stopPropagation()">
                                            <h3 class="font-bold text-2xl text-gray-800 hover:text-dark-olive transition-colors mb-3">{{ $rental->product->name }}</h3>
                                        </a>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                            <div class="flex items-center text-gray-600 bg-gray-50 px-3 py-2 rounded-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-dark-olive" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span class="font-medium">Lantai {{ $rental->product->floor }}, Ruang {{ $rental->product->room }}</span>
                                            </div>
                                            <div class="flex items-center text-gray-600 bg-gray-50 px-3 py-2 rounded-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-dark-olive" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="font-medium">{{ $rental->duration }} jam</span>
                                            </div>
                                            <div class="flex items-center text-gray-600 bg-gray-50 px-3 py-2 rounded-xl md:col-span-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-dark-olive" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span class="font-medium">{{ $rental->booked_start->translatedFormat('d F Y, H:i') }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="flex flex-wrap gap-2">
                                            <span class="text-sm px-3 py-2 bg-gradient-to-r from-blue-50 to-blue-100 rounded-full text-blue-700 font-medium flex items-center border border-blue-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                {{ $rental->product->cpu }}
                                            </span>
                                            <span class="text-sm px-3 py-2 bg-gradient-to-r from-purple-50 to-purple-100 rounded-full text-purple-700 font-medium flex items-center border border-purple-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2m-2-2h.01M17 16h.01" />
                                                </svg>
                                                {{ $rental->product->gpu }}
                                            </span>
                                            <span class="text-sm px-3 py-2 bg-gradient-to-r from-green-50 to-green-100 rounded-full text-green-700 font-medium flex items-center border border-green-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                                </svg>
                                                {{ $rental->product->ram }} RAM
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="text-left lg:text-right lg:ml-6">
                                        <div class="bg-gradient-to-r from-red-50 to-orange-50 p-4 rounded-2xl border-2 border-red-100 mb-4">
                                            <p class="text-sm text-gray-600 mb-1">Total Pembayaran</p>
                                            <p class="font-black text-3xl text-red-600">
                                                {{ $rental->total_price }} <span class="text-lg">TOKEN</span>
                                            </p>
                                        </div>
                                        <a href="{{ route('productPage.show', $rental->product->id) }}" class="w-full lg:w-auto bg-gradient-to-r from-dark-olive to-olive-drab hover:from-olive-drab hover:to-dark-olive text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 flex items-center justify-center transform hover:scale-105 shadow-lg hover:shadow-xl bg-lime-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>
                                            SEWA LAGI
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
        
        @if($rentals->hasPages())
            <div class="px-6 py-6 bg-gradient-to-r from-gray-50 to-white border-t border-gray-200">
                <div class="pagination-wrapper">
                    {{ $rentals->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </main>
</div>

<style>
    .status-indicator {
        animation: pulse 2s infinite;
    }
    
    .status-indicator-container .animate-ping {
        animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
    }
    
    @keyframes pulse {
        0% { opacity: 0.7; }
        50% { opacity: 1; }
        100% { opacity: 0.7; }
    }
    
    @keyframes ping {
        75%, 100% {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .order-item {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .order-item:hover {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .pagination-wrapper .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
    }
    
    .pagination .page-item .page-link {
        @apply px-4 py-2 rounded-xl border-2 border-gray-200 text-gray-700 font-medium transition-all duration-300 hover:bg-dark-olive hover:text-white hover:border-dark-olive;
    }
    
    .pagination .page-item.active .page-link {
        @apply bg-dark-olive border-dark-olive text-white shadow-lg;
    }
    
    .pagination .page-item.disabled .page-link {
        @apply text-gray-400 cursor-not-allowed hover:bg-transparent hover:text-gray-400 hover:border-gray-200;
    }
    
    .orders-container::-webkit-scrollbar {
        width: 8px;
    }
    
    .orders-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .orders-container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    
    .orders-container::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    
    @media (max-width: 768px) {
        .order-item {
            margin-bottom: 1rem;
        }
        
        .order-item .p-6 {
            padding: 1rem;
        }
        
        .status-indicator-container {
            margin-right: 0.5rem;
        }
    }
</style>
@endsection