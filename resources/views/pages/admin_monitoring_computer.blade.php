@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<!-- Main Content -->
<div class="flex-1 px-8 py-10">

    <section id="title">
        <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900">Monitoring Computer</span>
        </h1>
    </section>

    <section id="computersMap">
        @include('components.computer-monitor', ['monitors' => $monitors])
    </section>

    <section id="product-table" class="bg-white p-6 rounded-2xl border-4 border-slate-800 shadow-xl">
        <table id="filter-table" class="text-left border-separate border-spacing-y-3">
        <thead>
            <tr class="bg-gray-200 text-sm text-gray-700">
            @php
                $headers = ['ID', 'Kode', 'Nama', 'Lantai', 'Ruangan', 'Status'];
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
            @foreach ($products as $product)
            @php
                $badgeClass = $statusColorMap[$product->status] ?? 'bg-gray-300 text-gray-700';
            @endphp
            <tr class="bg-gray-100 rounded-xl">
                <td class="p-3">{{ $product->id }}</td>
                <td class="p-3">{{ $product->code }}</td>

                <td class="p-3 flex items-center gap-3">
                <img src="{{ asset($product->image1) }}" alt="thumb" class="w-10 h-10 rounded object-cover" />
                <span>{{ $product->name }}</span>
                </td>

                <td class="p-3">{{ $product->floor }}</td>
                <td class="p-3 capitalize">{{ $product->room }}</td>

                <td class="p-3">
                <span class="px-3 py-1 text-xs transform transition-transform active:scale-90 font-semibold rounded-full {{ $badgeClass }}">
                    {{ ucfirst($product->status) }}
                </span>
                </td>

            </tr>
            @endforeach
        </tbody>
        </table>

        {{-- Paginate link --}}
        <div class="mt-4">{{ $products->links() }}</div>

    </section>

</div>

<script>
    if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#filter-table", {
            tableRender: (_data, table, type) => {
                if (type === "print") {
                    return table
                }
                const tHead = table.childNodes[0]
                const filterHeaders = {
                    nodeName: "TR",
                    attributes: {
                        class: "search-filtering-row"
                    },
                    childNodes: tHead.childNodes[0].childNodes.map(
                        (_th, index) => ({nodeName: "TH",
                            childNodes: [
                                {
                                    nodeName: "INPUT",
                                    attributes: {
                                        class: "datatable-input",
                                        type: "search",
                                        "data-columns": "[" + index + "]"
                                    }
                                }
                            ]})
                    )
                }
                tHead.childNodes.push(filterHeaders)
                return table
            }
        });
    }
</script>

@endsection
