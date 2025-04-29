{{-- Create a file named computer-monitor.blade.php in your components directory --}}

@php
// Map status to indicator colors
$statusIndicatorMap = [
    'available' => 'lime-600',
    'online' => 'orange-600',
    'offline' => 'red-600',
    'maintenance' => 'indigo-600',
    'prepare' => 'yellow-300',
    'undefined' => 'gray-600'
];

// Group computers by floor
$computersByFloor = collect($monitors)->groupBy('lantai_komputer');

// Ensure all color classes are generated for Tailwind
// This prevents purging of these classes when they're used dynamically
$allColorClasses = [
    'bg-lime-600',
    'bg-orange-600',
    'bg-red-600',
    'bg-indigo-600',
    'bg-yellow-300',
    'bg-gray-600'
];
@endphp

{{-- Add hidden elements to force Tailwind to include all needed color classes --}}
<div class="hidden">
    <div class="bg-lime-600"></div>
    <div class="bg-orange-600"></div>
    <div class="bg-red-600"></div>
    <div class="bg-indigo-600"></div>
    <div class="bg-yellow-300"></div>
    <div class="bg-gray-600"></div>
</div>

<section id="monitoring-komputer-lantai" class="mb-20">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
            @for ($floor = 1; $floor <= 4; $floor++)
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg {{ $floor === 1 ? 'active' : 'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}" 
                            id="lantai_{{ $floor }}-tab" 
                            data-tabs-target="#lantai_{{ $floor }}" 
                            type="button" 
                            role="tab" 
                            aria-controls="lantai_{{ $floor }}" 
                            aria-selected="{{ $floor === 1 ? 'true' : 'false' }}">
                        Lantai {{ $floor }}
                    </button>
                </li>
            @endfor
        </ul>
    </div>

    <div id="default-styled-tab-content">
        @for ($floor = 1; $floor <= 4; $floor++)
            <div class="{{ $floor === 1 ? '' : 'hidden' }} p-4 rounded-lg bg-gray-50 dark:bg-gray-800" 
                id="lantai_{{ $floor }}" 
                role="tabpanel" 
                aria-labelledby="lantai_{{ $floor }}-tab">
                <div class="flex flex-wrap gap-8 justify-center lg:mx-130 md:mx-48 md:gap-6">
                    @forelse ($computersByFloor->get((string)$floor, []) as $computer)
                        @php
                            $status = strtolower($computer['status_komputer']);
                            $indikator_komputer = $statusIndicatorMap[$status] ?? 'gray-600';
                        @endphp
                        <div class="bg-{{ $indikator_komputer }} lg:p-8 md:p-4 p-4 inline-flex shadow-xl border-1 border-black rounded-2xl text-white lg:text-xl md:text-base font-mono cursor-pointer"
                             id="komputer-{{ $computer['id_komputer'] }}-lantai-{{ $computer['lantai_komputer'] }}"
                             data-popover-target="popover-komputer-{{ $computer['id_komputer'] }}-lantai-{{ $computer['lantai_komputer'] }}">
                            {{ $computer['kode_komputer'] }}
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">Tidak ada komputer di lantai {{ $floor }}</p>
                    @endforelse
                </div>
                <div class="flex flex-row flex-wrap gap-4 justify-center mt-15" id="legend_indicator">
                    <div class="flex-row flex gap-2 items-center">
                        <div class="">
                            <span class="flex w-2.5 h-2.5 bg-lime-600 rounded-full me-1.5 shrink-0"></span>
                        </div>
                        <div class="flex flex-col">
                            <p class="font-bold text-gray-800">
                                Available
                            </p>
                            <p class="text-xs text-gray-600 w-40">
                                Komputer Tersedia, Sedang Tidak Digunakan dan Belum Disewa
                            </p>
                        </div>
                    </div>
                    <div class="flex-row flex gap-2 items-center">
                        <div class="">
                            <span class="flex w-2.5 h-2.5 bg-orange-600 rounded-full me-1.5 shrink-0"></span>
                        </div>
                        <div class="flex flex-col">
                            <p class="font-bold text-gray-800">
                                Online/On Use
                            </p>
                            <p class="text-xs text-gray-600 w-40">
                                Komputer Tidak Tersedia, Sedang Digunakan dan Telah Disewa Sekarang
                            </p>
                        </div>
                    </div>
                    <div class="flex-row flex gap-2 items-center">
                        <div class="">
                            <span class="flex w-2.5 h-2.5 bg-red-800 rounded-full me-1.5 shrink-0"></span>
                        </div>
                        <div class="flex flex-col">
                            <p class="font-bold text-gray-800">
                                Offline/Close
                            </p>
                            <p class="text-xs text-gray-600 w-40">
                                Komputer Tidak Tersedia, Tidak Dapat Digunakan atau Warnet Tutup
                            </p>
                        </div>
                    </div>
                    <div class="flex-row flex gap-2 items-center">
                        <div class="">
                            <span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 shrink-0"></span>
                        </div>
                        <div class="flex flex-col">
                            <p class="font-bold text-gray-800">
                                Maintenance
                            </p>
                            <p class="text-xs text-gray-600 w-40">
                                Komputer Tidak Tersedia, Sedang Perbaikan atau Telah Digunakan
                            </p>
                        </div>
                    </div>
                    <div class="flex-row flex gap-2 items-center">
                        <div class="">
                            <span class="flex w-2.5 h-2.5 bg-yellow-300 rounded-full me-1.5 shrink-0"></span>
                        </div>
                        <div class="flex flex-col">
                            <p class="font-bold text-gray-800">
                                Prepare
                            </p>
                            <p class="text-xs text-gray-600 w-40">
                                Komputer Tidak Tersedia, Telah Disewa dan Akan Digunakan Segera.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    {{-- Generate popovers for each computer --}}
    @foreach ($monitors as $computer)
        @php
            $status = strtolower($computer['status_komputer']);
            $indikator_komputer = $statusIndicatorMap[$status] ?? 'gray-600';
        @endphp
        <div data-popover id="popover-komputer-{{ $computer['id_komputer'] }}-lantai-{{ $computer['lantai_komputer'] }}" 
             role="tooltip" 
             class="absolute z-60 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">{{ $computer['nama_komputer'] }} - {{ $computer['kode_komputer'] }} - Lantai {{ $computer['lantai_komputer'] }}</h3>
            </div>
            <div class="px-3 py-2">
                <div class="flex flex-row items-center" id="indicator_status">
                    <div class="inline-flex" id="indicator">
                        <span class="absolute flex w-3 h-3 me-3 bg-{{ $indikator_komputer }} rounded-full animate-ping"></span>
                        <span class="relative flex w-3 h-3 me-3 bg-{{ $indikator_komputer }} rounded-full"></span>
                    </div>
                    <p class="inline-flex">{{ $computer['status_komputer'] }}</p>
                </div>
                <p id="booking_komputer" class="mt-2 font-bold">
                    Booked : {{ $computer['jam_awal_booking_komputer'] }} - {{ $computer['jam_akhir_booking_komputer'] }}
                </p>
                <div class="grid grid-cols-2 mt-2" id="informasi_komputer">
                    <div class="flex flex-col gap-y-2">
                        <p id="id_komputer">
                            ID : {{ $computer['id_komputer'] }}
                        </p>
                        <p id="nama_komputer">
                            Nama : {{ $computer['nama_komputer'] }}
                        </p>
                        <p id="kode_komputer">
                            Kode : {{ $computer['kode_komputer'] }}
                        </p>
                        <p id="cpu_komputer">
                            CPU : {{ $computer['cpu_komputer'] }}
                        </p>
                        <p id="gpu_komputer">
                            GPU : {{ $computer['gpu_komputer'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <p id="RAM_komputer">
                            RAM : {{ $computer['ram_komputer'] }} GB
                        </p>
                        <p id="lantai_komputer">
                            Lantai : {{ $computer['lantai_komputer'] }}
                        </p>
                        <p id="biaya_komputer">
                            Biaya : {{ $computer['biaya_komputer'] }} maxcoin/jam
                        </p>
                        <p id="room_komputer">
                            Room : {{ $computer['room_komputer'] }}
                        </p>
                        <p id="status_komputer">
                            Status : {{ $computer['status_komputer'] }}
                        </p>
                    </div>
                </div>
            </div>
            <div data-popper-arrow></div>
        </div>
    @endforeach
</section>