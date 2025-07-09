@extends('layout.dashboard')

@section('title', 'Admin - Management Voucher')

@section('content')
<div class="flex-1 px-8 py-10">
  <section id="title">
    <h1 class="text-3xl font-bold mb-6 text-slate-900">Manajemen Voucher</h1>
  </section>

  {{-- Form Tambah Voucher --}}
  <section class="flex flex-row flex-wrap gap-4 p-4 bg-gray-100 rounded-xl mb-10">
    <div class="p-4 bg-white border-2 border-gray-300 shadow-lg rounded-2xl min-w-[14rem]">
      <div data-modal-target="add-coupon-modal" data-modal-toggle="add-coupon-modal" class="transform transition-transform hover:scale-105 justify-items-center active:scale-95 group -mt-2 cursor-pointer">
        <div class="inline-block relative scale-90 bg-gray-500 p-4 rounded-full border-4 border-white z-10">
          <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
        </div>
        <div class="-mt-10 bg-gray-400 p-4 w-auto rounded-lg z-0 justify-center">
          <div class="mt-6 text-white font-bold text-center text-xl tracking-widest">TAMBAH</div>
          <hr class="w-auto mt-3 h-0.5 bg-white border-0 mx-6">
          <div class="font-light text-sm text-white text-center max-w-36 mt-4">Tambah Voucher Baru</div>
        </div>
      </div>
    </div>
  </section>

  {{-- Tabel Voucher --}}
  <section class="bg-white p-6 rounded-2xl border-4 border-gray-700 shadow-xl">
    <table id="couponTable" class="text-left border-separate border-spacing-y-3 w-full">
      <thead>
        <tr class="bg-gray-200 text-sm text-gray-700">
          @php
            $headers = ['ID', 'Nama', 'Kode', 'Sponsor', 'Token', 'Tersisa', 'Kadaluarsa', 'Aksi'];
          @endphp
          @foreach($headers as $i => $h)
            <th class="p-3 {{ $i==0?'rounded-l-lg':'' }} {{ $i==count($headers)-1?'rounded-r-lg':'' }}">
              <span class="flex items-center">
                {{ $h }}
                <svg class="w-4 h-4 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/></svg>
              </span>
            </th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($coupons as $coupon)
          <tr class="bg-gray-50 rounded-xl">
            <td class="p-3">{{ $coupon->id }}</td>
            <td class="p-3">{{ $coupon->name }}</td>
            <td class="p-3">{{ $coupon->code }}</td>
            <td class="p-3">{{ $coupon->sponsor }}</td>
            <td class="p-3">{{ $coupon->qty_token }}</td>
            <td class="p-3">{{ $coupon->qty_can_use - $coupon->qty_use }}</td>
            <td class="p-3">{{ $coupon->expired }}</td>
            <td class="p-3">
              <form action="{{ route('admin.coupon.destroy', $coupon->id) }}" method="POST" onsubmit="return confirm('Yakin hapus Voucher ini?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>
</div>

{{-- Modal Tambah Voucher --}}
<div id="add-coupon-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-black/30">
  <div class="relative w-full max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-lg shadow-xl">
      <div class="flex items-center justify-between p-4 border-b bg-gray-700 rounded-t">
        <h3 class="text-lg font-semibold text-white">Tambah Voucher Baru</h3>
        <button type="button" class="text-white hover:text-gray-200" data-modal-hide="add-coupon-modal">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-6">
        <form action="{{ route('admin.coupon.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          @csrf
          <input type="text" name="name" placeholder="Nama Voucher" required class="w-full border px-4 py-2 rounded-lg">
          <input type="text" name="code" placeholder="(Kosongkan untuk kode otomatis)" class="w-full border px-4 py-2 rounded-lg">
          <input type="text" name="sponsor" placeholder="Sponsor" class="w-full border px-4 py-2 rounded-lg">
          <input type="text" name="desc" placeholder="Deskripsi" class="w-full border px-4 py-2 rounded-lg">
          <input type="number" name="qty_token" placeholder="Jumlah Token" required class="w-full border px-4 py-2 rounded-lg">
          <input type="number" name="qty_can_use" placeholder="Jumlah Pemakaian" required class="w-full border px-4 py-2 rounded-lg">
          <input type="datetime-local" name="expired" placeholder="Tanggal Kadaluarsa" required class="w-full border px-4 py-2 rounded-lg">
          <div class="md:col-span-2 flex justify-end">
            <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg">Tambah Voucher</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
