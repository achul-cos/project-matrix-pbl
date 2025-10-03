@extends('layout.dashboard')

@section('title', 'Admin - Kritik dan Saran')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold my-4 text-[#1e293b]">Management Kritik & Saran</h1>

    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('admin.management_kritik') }}" method="GET" class="flex gap-2">
            <input type="date" name="from" value="{{ request('from') }}" class="border border-gray-300 p-2 rounded-md shadow-sm" />
            <input type="date" name="to" value="{{ request('to') }}" class="border border-gray-300 p-2 rounded-md shadow-sm" />
            <button type="submit" class="bg-[#1e293b] text-white px-4 py-2 rounded-md hover:bg-[#334155] transition">Filter</button>
        </form>
        <div class="flex gap-2">
            <a href="{{ route('suggest.export', ['from' => request('from'), 'to' => request('to')]) }}"
                class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">
                Export Excel
            </a>
            <a href="{{ route('suggest.export_pdf', ['from' => request('from'), 'to' => request('to')]) }}"
                class="bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Export PDF
            </a>
        </div>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-2xl border-4 border-slate-800 p-4">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-gray-100 text-[#1e293b] round">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Isi Pesan</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($kritik as $index => $item)
                <tr class="hover:bg-gray-50 border-t border-gray-200">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $item->message }}</td>
                    <td class="px-4 py-3">{{ $item->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-4 py-3">
                        <form action="{{ route('suggest.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kritik ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if(count($kritik) == 0)
                <tr>
                    <td colspan="4" class="text-center px-4 py-4 text-gray-500">Tidak ada data kritik atau saran.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
