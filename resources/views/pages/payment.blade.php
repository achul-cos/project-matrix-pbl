@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="max-w-md mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Header -->
    <div class="bg-[#556B2F] text-white p-4">
        <h1 class="text-xl font-bold">PEMBAYARAN</h1>
    </div>
    
    <!-- Payment Summary -->
    <div class="p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">RINGKASAN PEMBAYARAN</h2>
        
        <div class="space-y-4 mb-6">
            <div class="flex justify-between">
                <span class="text-gray-600">JUMLAH TOKEN</span>
                <span class="font-medium">50 TOKEN</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">HARGA</span>
                <span class="font-medium">RP. 50.000</span>
            </div>
        </div>
        
        <!-- Payment Methods -->
        <div class="mb-6">
            <h3 class="font-medium text-gray-700 mb-3">E-Wallet</h3>
            <div class="space-y-2 pl-4 mb-4">
                <div class="flex items-center">
                    <input type="radio" id="dana" name="payment" class="mr-2">
                    <label for="dana">DANA</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="ovo" name="payment" class="mr-2">
                    <label for="ovo">OVO</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="gopay" name="payment" class="mr-2">
                    <label for="gopay">GoPay</label>
                </div>
            </div>
            
            <h3 class="font-medium text-gray-700 mb-3">Transfer Bank</h3>
            <div class="space-y-2 pl-4 mb-4">
                <div class="flex items-center">
                    <input type="radio" id="bank" name="payment" class="mr-2">
                    <label for="bank">BCA, BNI, Mandiri, dll.</label>
                </div>
            </div>
            
            <h3 class="font-medium text-gray-700 mb-3">QRIS</h3>
            <div class="space-y-2 pl-4 mb-4">
                <div class="flex items-center">
                    <input type="radio" id="qris" name="payment" class="mr-2">
                    <label for="qris">Virtual Account</label>
                </div>
            </div>
        </div>
        
        <!-- Total -->
        <div class="border-t border-gray-200 pt-4 mb-6">
            <div class="flex justify-between font-semibold text-lg">
                <span>TOTAL</span>
                <span>RP. 50.000</span>
            </div>
        </div>
        
        <!-- Continue Button -->
        <button class="w-full bg-[#556B2F] hover:bg-green-950 text-white py-3 px-4 rounded-lg font-medium transition duration-200">
            LANJUTKAN PEMBAYARAN
        </button>
    </div>
</div>

@endsection