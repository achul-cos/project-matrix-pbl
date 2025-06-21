@extends('layout.dashboard')

@section('title', 'Admin - Kritik dan Saran')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-[#2F5F00]">Manajemen Kritik & Saran</h1>

    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('admin.management_kritik') }}" method="GET" class="flex gap-2">
            <input type="date" name="from" value="{{ request('from') }}" class="border p-2 rounded-md" />
            <input type="date" name="to" value="{{ request('to') }}" class="border p-2 rounded-md" />
            <button type="submit" class="bg-[#2F5F00] text-white px-4 py-2 rounded-md">Filter</button>
        </form>
        <a href="{{ route('suggest.export') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Export Excel</a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg border border-[#A3C57C]">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-[#F3FAE7] text-[#2F5F00]">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Isi Pesan</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kritik as $index => $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $item->message }}</td>
                    <td class="px-4 py-2">{{ $item->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('suggest.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kritik ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
