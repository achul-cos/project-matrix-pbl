@extends('layout.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="text-4xl font-bold text-center text-[#2F5F00] mb-10 animate-pulse">Frequently Asked Questions (FAQ)</h1>

    <div class="space-y-6" id="faq-container">
        @php
            $faqs = [
                [
                    'q' => '1. Apa itu Matrix?',
                    'a' => 'Matrix adalah aplikasi berbasis website yang memungkinkan pengguna untuk menyewa komputer di warung internet (warnet) secara online. Dengan Matrix, Anda bisa melakukan booking komputer dari jauh tanpa harus datang langsung ke warnet.',
                    'gif' => 'https://media.giphy.com/media/f9k1tV7HyORcngKF8v/giphy.gif'
                ],
                [
                    'q' => '2. Mengapa perlu menggunakan Matrix?',
                    'a' => 'Matrix mengatasi masalah umum yang sering dialami pengguna warnet, yaitu: Tidak tahu apakah masih ada komputer yang tersedia, harus datang ke warnet untuk mengecek ketersediaan, membuang waktu, tenaga, dan biaya jika ternyata komputer sudah habis, tidak bisa merencanakan penyewaan dari jauh-jauh hari.',
                    'gif' => 'https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExcnpyNWMxY2owY2E3Y3kwaWR0b2l4d3ZhYnVrdXdmOXhjdnR2M2txOCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/xThuWu82QD3pj4wvEQ/giphy.gif'
                ],
                [
                    'q' => '3. Bagaimana cara melakukan booking komputer?',
                    'a' => 'Login ke akun Anda, cari komputer yang tersedia melalui halaman pencarian, pilih komputer yang diinginkan, pilih durasi penyewaan, lakukan pembayaran menggunakan token atau payment gateway, konfirmasi booking Anda, dan datang ke warnet sesuai waktu yang sudah dibooking.',
                    'gif' => 'https://media.giphy.com/media/jdPMeyv9rn0hZHh8n9/giphy.gif'
                ],
                [
                    'q' => '4. Apa itu sistem token?',
                    'a' => 'Sistem token adalah metode pembayaran dalam Matrix dimana pengguna perlu melakukan top-up saldo terlebih dahulu. Token ini kemudian digunakan untuk membayar penyewaan komputer.',
                    'gif' => 'https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExdWo4OXNxazdrM3FiaTF5d3Jvbmk0ZWRpcnc0czZ6ODA1c25jZW95NCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/FAEEL82CUc1JPBas1V/giphy.gif'
                ],
                [
                    'q' => '5. Apakah data saya aman?',
                    'a' => 'Ya, Matrix dilengkapi dengan sistem autentikasi yang aman dan perlindungan data pengguna. Semua transaksi juga dilindungi dengan sistem keamanan yang memadai.',
                    'gif' => 'https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExMjJjOXoxMXluM28zdWY0dG0xaWp4d3RiZHgwaG0zOXc4N3Z6bGViYiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/LaVp0AyqR5bGsC5Cbm/giphy.gif'
                ],
                [
                    'q' => '6. Bagaimana cara mencari komputer yang tersedia?',
                    'a' => 'Gunakan fitur pencarian di halaman search. Anda dapat menggunakan filter untuk mempermudah pencarian berdasarkan kriteria tertentu seperti lokasi, spesifikasi, atau harga.',
                    'gif' => 'https://media.giphy.com/media/HoffxyN8ghVuw/giphy.gif'
                ],
                [
                    'q' => '7. Bagaimana cara melakukan pembayaran?',
                    'a' => 'Matrix menyediakan dua metode pembayaran: menggunakan token yang sudah di-top up sebelumnya dan payment gateway untuk pembayaran langsung.',
                    'gif' => 'https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExc29vcWZscXA1dWozODZ6OWJ1YXoxYTlzcHRlNWRmaTF3bHF1dzUwcSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/I90rL3aw7iwFNIu2qO/giphy.gif'
                ]
            ];
        @endphp

        @foreach($faqs as $index => $faq)
        <div class="border border-[#A3C57C] rounded-2xl overflow-hidden shadow-md bg-white">
            <button type="button" class="w-full flex items-center justify-between px-6 py-4 text-left text-[#2F5F00] font-semibold text-lg focus:outline-none hover:bg-[#F3FAE7] transition" data-toggle="faq-{{ $index }}">
                <div class="flex items-center gap-4">
                    <img src="{{ $faq['gif'] }}" alt="GIF" class="w-12 h-12 rounded-full border border-[#A3C57C]">
                    <span>{{ $faq['q'] }}</span>
                </div>
                <svg class="w-5 h-5 text-[#2F5F00] transition-transform duration-300 transform" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
            <div id="faq-{{ $index }}" class="px-6 py-4 hidden border-t border-[#A3C57C] text-gray-700">
                {{ $faq['a'] }}
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.querySelectorAll('[data-toggle]').forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-toggle');
            const content = document.getElementById(targetId);
            const icon = button.querySelector('svg');

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        });
    });
</script>


@endsection
