@extends('layout.app')

@section('title', 'Konfirmasi Penyewaan')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Penyewaan Berhasil!
                </h2>
                <p class="mt-2 text-lg text-gray-600">
                    Anda telah berhasil menyewa komputer
                </p>
                
                <div class="mt-8 bg-green-50 p-6 rounded-lg border border-green-200">
                    <div class="flex justify-center mb-4">
                        <div class="bg-white rounded-full p-4 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-green-800 mb-2">Detail Penyewaan</h3>
                    
                    <div class="space-y-2 text-sm text-gray-700">
                        <div class="flex justify-between">
                            <span>Komputer:</span>
                            <span class="font-medium">{{ $rental->product->name }} ({{ $rental->product->code }})</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Waktu Mulai:</span>
                            <span class="font-medium">{{ $rental->booked_start->format('d M Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Waktu Selesai:</span>
                            <span class="font-medium">{{ $rental->booked_end->format('d M Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Durasi:</span>
                            <span class="font-medium">{{ $rental->duration }} jam</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Total Biaya:</span>
                            <span class="font-medium">{{ $rental->total_price }} TOKEN</span>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-bold text-center text-gray-800 mb-2">Kode Aktivasi</h3>
                        <div class="text-center text-3xl font-mono font-bold tracking-wider bg-gray-100 py-4 rounded">
                            {{ $rental->activation_code }}
                        </div>
                        <p class="mt-3 text-sm text-center text-gray-600">
                            Catat kode ini dan gunakan di warnet untuk mengaktifkan komputer
                        </p>
                    </div>
                </div>
                
                <div class="mt-6">
                    <p class="text-sm text-gray-600">
                        Silakan datang ke warnet dan masukkan kode aktivasi ini di komputer yang Anda sewa.
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('profile.history_rent') }}" class="text-green-600 hover:text-green-800 font-medium">
                            Lihat semua penyewaan saya →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection