@extends('layout.dashboard')

@section('title', 'Tambah Kupon')

@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Tambah Kupon</h1>

    <form action="{{ route('admin.coupon.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Nama Kupon</label>
                <input type="text" name="name" class="w-full border p-2" required>
            </div>
            <div>
                <label>Kode Kupon</label>
                <input type="text" name="code" class="w-full border p-2" required>
            </div>
            <div>
                <label>Sponsor</label>
                <input type="text" name="sponsor" class="w-full border p-2">
            </div>
            <div>
                <label>Deskripsi</label>
                <textarea name="desc" class="w-full border p-2"></textarea>
            </div>
            <div>
                <label>Total Bisa Digunakan</label>
                <input type="number" name="qty_can_use" class="w-full border p-2" required>
            </div>
            <div>
                <label>Token</label>
                <input type="number" name="qty_token" class="w-full border p-2" required>
            </div>
            <div>
                <label>Tanggal Expired</label>
                <input type="datetime-local" name="expired" class="w-full border p-2" required>
            </div>
        </div>

        <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
