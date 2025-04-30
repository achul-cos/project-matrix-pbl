@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="max-w-md mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Header -->
    <div class="bg-[#556B2F] text-white p-4">
        <h1 class="text-xl text-center font-bold">PEMBAYARAN</h1>
    </div>
</div>

<div class=" text-black p-2">
    <h1 class="text-xl text-center font-bold">RINGKASAN PEMBAYARAN</h1>
</div>

<div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">
    <!-- Box with circle on the left and text on the right -->
    <div class="w-full md:w-1/2 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-row items-center gap-4 mb-6 md:mb-0">
      <!-- Circle on the left -->
      <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F] flex-shrink-0"></div>
      
      <!-- Text content on the right -->
      <div class="space-y-4 ml-3">
        <div class="flex justify-between">
          <span class="text-gray-600 mr-10">JUMLAH TOKEN</span>
          <span class="font-medium">50 TOKEN</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">HARGA</span>
          <span class="font-medium"> RP. 50.000</span>
        </div>
      </div>
    </div>
  
  
    <!-- Profile Form -->
    <div class="w-full md:w-2/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-6 space-y-4">
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
              <div class="flex items-center">
                    <input type="radio" id="qris" name="payment" class="mr-2">
                    <label for="qris">QRIS</label>
                </div>
          </div>
          
          <h3 class="font-medium text-gray-700 mb-3">Transfer Bank</h3>
          <div class="space-y-2 pl-4 mb-4">
            <div class="flex items-center">
                <input type="radio" id="bank" name="payment" class="mr-2">
                <label for="bank">BCA</label>
              </div>
              <div class="flex items-center">
                  <input type="radio" id="bank" name="payment" class="mr-2">
                  <label for="bank">BNI<label>
                </div>
                <div class="flex items-center">
                  <input type="radio" id="bank" name="payment" class="mr-2">
                  <label for="bank">Mandiri</label>
                </div>
                
          </div>
    </div>
  </div>
</div>
      
    <div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">
      <!-- Total -->
      <div class="border-t md:w-full bg-white rounded-xl shadow-md border border-[#556B2F] p-4 mb-6 md:mb-0">
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