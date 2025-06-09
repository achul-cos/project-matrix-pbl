@extends('layout.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-4xl font-bold mb-8 text-center text-indigo-600 animate-bounce">🤔 Tanya-tanya Seru tentang Matrix Warnet!</h1>

    <div id="accordion-faq" data-accordion="collapse" class="space-y-4">
        @foreach([
            ['q' => 'Apa itu layanan Matrix Warnet?', 'a' => 'Matrix Warnet adalah platform penyewaan komputer berbasis website yang memudahkan pengguna untuk booking, melihat histori penyewaan, dan lainnya secara online.'],
            ['q' => 'Bagaimana cara memesan komputer?', 'a' => 'Cukup login ke akun kamu, lalu pilih komputer yang tersedia dan lakukan pemesanan. Kamu juga bisa memilih durasi penggunaan.'],
            ['q' => 'Apakah bisa membatalkan pemesanan?', 'a' => 'Ya, pembatalan bisa dilakukan sebelum waktu sewa dimulai melalui halaman histori pemesanan.'],
            ['q' => 'Apa saja fitur unggulan Matrix Warnet?', 'a' => 'Fitur real-time availability, pemesanan cepat, laporan penggunaan, dan support 24/7.'],
            ['q' => 'Apakah ada batasan umur untuk pengguna?', 'a' => 'Ya, pengguna minimal berusia 13 tahun dan mendapatkan izin dari orang tua jika di bawah 17.'],
            ['q' => 'Bagaimana Matrix menjaga keamanan data pengguna?', 'a' => 'Kami menggunakan enkripsi SSL dan sistem login yang aman untuk melindungi data kamu.'],
        ] as $index => $item)
        <div class="border border-indigo-300 rounded-xl overflow-hidden shadow-lg bg-white hover:shadow-indigo-300 transition duration-300">
            <h2>
                <button type="button"
                    class="flex items-center justify-between w-full p-5 text-left font-semibold text-indigo-700 bg-indigo-50 hover:bg-indigo-100 focus:outline-none transition"
                    data-accordion-target="#faq-{{ $index }}" aria-expanded="false"
                    aria-controls="faq-{{ $index }}">
                    <span class="text-lg">{{ $item['q'] }}</span>
                    <svg data-accordion-icon class="w-6 h-6 transform transition-transform duration-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </h2>
            <div id="faq-{{ $index }}" class="hidden p-5 text-gray-700 bg-white border-t border-indigo-200">
                {{ $item['a'] }}
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.querySelectorAll('[data-accordion-target]').forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-accordion-target');
            const content = document.querySelector(targetId);
            const icon = button.querySelector('svg');

            const isOpen = !content.classList.contains('hidden');

            // Close all
            document.querySelectorAll('[id^=faq-]').forEach(div => div.classList.add('hidden'));
            document.querySelectorAll('[data-accordion-icon]').forEach(svg => svg.classList.remove('rotate-180'));

            // Open if not already open
            if (!isOpen) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            }
        });
    });
</script>
@endsection
