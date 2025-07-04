@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
<div class="relative max-w-4xl mx-auto px-6 py-10">

    <h1 class="relative text-4xl font-bold text-center text-[#2F5F00] mb-10 animate-pulse z-10">Frequently Asked Questions (FAQ)</h1>

    <div class="space-y-6 z-10 relative" id="faq-container">
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
        <div class="border border-[#A3C57C] rounded-2xl overflow-hidden shadow-md bg-white z--20">
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

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="mt-10 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Saran & Kritik --}}
    <div class=" relative z-10 mt-10 border-t border-gray-300 pt-10">
        <h2 class="text-2xl font-bold text-[#2F5F00] mb-4">Berikan Saran & Kritik</h2>
        <form action="{{ route('suggest.store') }}" method="POST" class="space-y-4">
            @csrf
            <textarea name="message" rows="4" required class="w-full border border-[#A3C57C] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#A3C57C]" placeholder="Tulis saran atau kritik Anda di sini..."></textarea> 
            
             {!! NoCaptcha::display() !!}

            @if ($errors->has('g-recaptcha-response'))
                <span class="text-red-500 text-sm">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
            
            <p>
                note: Form ini bersifat anonim. silakan tulis dengan bebas dan sejujur jujur nya.
            </p>
            <button type="submit" class="bg-[#2F5F00] text-white px-6 py-2 rounded-lg hover:bg-[#3A7500] transition">Kirim</button>
        </form>
       
    </div>

    {{-- Kontak Developer & Lokasi --}}
    <div class="mt-10 text-sm text-gray-700">
        <h2 class="text-xl font-bold text-[#2F5F00] mb-2">Kontak Developer</h2>
        <p>Nama: Tim Matrix Developer</p>
        <p>Email: matrixpolibatam@gmail.com</p>

        <h2 class="text-xl font-bold text-[#2F5F00] mt-6 mb-2">Kontak Pihak Warnet</h2>
        <p>Nama: Matrix Warnet </p>
        <p>Contact person: +6289668914466 </p>

        <h2 class="text-xl font-bold text-[#2F5F00] mt-6 mb-2">Lokasi Warnet</h2>
        <p>Politeknik negeri BATAM</p>
        <!-- Location Section -->
    <section class="max-w-6xl mx-auto p-4 md:p-6 relative z-10">
        <div class="text-center mb-6">
            <h2 class="text-2xl md:text-2xl font-bold text-gray-800 uppercase tracking-wider">LOKASI KAMI</h2>
        </div>
        <div class="w-full h-64 md:h-96 rounded-lg overflow-hidden shadow-lg">
            <iframe
                class="w-full h-full"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127504.44013558096!2d104.00053436241162!3d1.1281182612964378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98c2ff37f7f47%3A0xf4ccdc7f01170586!2sBatam%2C%20Kota%20Batam%2C%20Kepulauan%20Riau!5e0!3m2!1sid!2sid!4v1650450987654!5m2!1sid!2sid"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
    </div>
  <div class="absolute w-full top-0 -bottom-12 -right-14 -left-6 z-0">
    <img class="absolute top-8 -left-3 size-42 animate-spin-slow" src="{{ asset('img/icon/hashtag.png') }}" />
    <img class="absolute bottom-8 -left-12 h-72 w-auto animate-shake-slow" src="{{ asset('img/icon/keyboard.png') }}" />
    <img class="absolute -top-3 -right-12 h-62 w-auto animate-shake-slow" src="{{ asset('img/icon/headset.png') }}" />
    <img class="absolute bottom-8 -right-6 h-60 w-auto animate-spin-slow" src="{{ asset('img/icon/abstract.png') }}" />
  </div>    
</div>

{!! NoCaptcha::renderJs() !!}

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

<style>
@keyframes spin-slow {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@keyframes shake-slow {
  0%, 100% { transform: translate(0, 0); }
  25% { transform: translate(-2px, 1px); }
  50% { transform: translate(2px, -1px); }
  75% { transform: translate(-1px, 2px); }
}

/* Tailwind Custom Animation */
.animate-spin-slow {
  animation: spin-slow 25s linear infinite;
}

.animate-shake-slow {
  animation: shake-slow 3s ease-in-out infinite;
}
</style>

@endsection
