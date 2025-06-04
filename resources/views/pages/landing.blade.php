@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<!-- Hero Section -->
<section class="p-4 space-y-4" id="hero-warnet">
  <div class="relative bg-cover bg-center rounded-xl shadow-xl overflow-hidden"
       style="background-image: url('{{ asset('img/pc/pc1.jpg') }}');">

    <div class="px-8 pt-8 pb-4 grid grid-cols-12 gap-4">
      <div class="col-span-2"><hr class="h-1.5 bg-lime-600 rounded-lg border-0"></div>
      <div class="col-span-2"><hr class="h-1.5 bg-red-700 rounded-lg border-0"></div>
      <div class="col-span-8"><hr class="h-1.5 bg-stone-700 rounded-lg border-0"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 items-stretch px-7 pb-7 z-10 relative">
      <div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">
          Komputer Cepat dan Tangguh untuk Warnet Modern
        </h1>
        <p class="text-gray-200 mb-6 text-lg">
          Cocok untuk gaming, kerja, hingga belajar online di lingkungan warnet modern.
        </p>
        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-md transition">
          RENT NOW →
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Carousel Section -->
<section class="relative w-full px-6 py-10">

  <!-- Tombol Panah -->
  <button id="leftBtn" class="absolute left-2 top-1/2 z-10 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-80 p-2 rounded-full">
    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
  </button>

  <button id="rightBtn" class="absolute right-2 top-1/2 z-10 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-80 p-2 rounded-full">
    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
    </svg>
  </button>

  <!-- Carousel Kontainer -->
  <div id="carousel" class="flex overflow-x-auto scroll-smooth space-x-6 px-2 hide-scrollbar">
    @for ($i = 0; $i < 8; $i++)
      <div class="flex-shrink-0 w-1/4">
        <div class="transform transition hover:scale-105">
          <img src="{{ asset('img/pc/pc1.jpg') }}" class="rounded-lg shadow-lg w-full h-auto object-cover" alt="Trending Poster">
          <p class="text-sm mt-2 text-center text-white">Lenovo Region 7</p>
        </div>
      </div>
    @endfor
  </div>
</section>

<!-- Script Geser -->
<script>
  const carousel = document.getElementById('carousel');
  document.getElementById('leftBtn').addEventListener('click', () => {
    carousel.scrollBy({ left: -500, behavior: 'smooth' });
  });
  document.getElementById('rightBtn').addEventListener('click', () => {
    carousel.scrollBy({ left: 500, behavior: 'smooth' });
  });
</script>

<!-- Styling scrollbar -->
<style>
  .hide-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<div class="max-w-6xl mx-auto px-6 py-8">
    <div class="mb-16 md:flex md:items-start">
        <!-- Tulisan di sebelah kiri -->
        <div class="md:w-1/2 md:pr-6 md:pt-4 order-2 md:order-1">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Who We Are</h2>
            <div class="row-span-1">
                <div class="grid grid-cols-12 gap-4 mt-8">
                    <div class="col-span-6"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-lime-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-red-700 border-0 rounded-lg"></div>
                </div>
            </div>
            <p class="text-gray-600 leading-relaxed mt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
            </p>
            <a href="#" class="inline-block mt-4 font-bold text-md px-4 py-2 bg-lime-800 text-white rounded-md hover:bg-lime-700 transition">Baca Selengkapnya</a>
        </div>

        <!-- Gambar di sebelah kanan -->
        <div class="md:w-1/2 md:pl-10 mb-6 md:mb-0 transition-all transform hover:scale-105 active:scale-100 active:shadow-inner order-1 md:order-2">
            <div class="w-full h-64 md:h-80 rounded-lg overflow-hidden">
                <img src="img/ad/placeholder1.png" alt="Gambar artikel pertama" class="w-full h-full object-cover" />
            </div>
        </div>
    </div>
<section>

<!-- Rekomendasi -->
<section class="flex flex-col p-3 space-y-3 mt-3" id="event">
  <!-- Judul -->
  <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center mb-8">
    <div class="col-span-4 sm:col-span-2">
      <hr class="h-1.5 bg-stone-700 border-0 rounded-lg" />
    </div>
    <div class="col-span-4 sm:col-span-8 m-auto shadow-md">
      <span class="flex justify-center font-bold lg:text-2xl md:text-xl text-xs text-white bg-lime-600 px-2 py-1 rounded-md">
        Rekomendasi Untukmu
      </span>
    </div>
    <div class="col-span-4 sm:col-span-2">
      <hr class="h-1.5 bg-stone-700 border-0 rounded-lg" />
    </div>
  </div>

  <!-- Grid Item -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 place-items-center">
    @foreach (['Komputer A', 'Komputer B', 'Komputer C', 'Komputer D', 'Komputer E', 'Komputer F', 'Komputer G', 'Komputer H'] as $item)
      <div class="transition-transform transform hover:scale-105 w-full max-w-xs">
        <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
          <a href="#">
            <img class="rounded-t-lg w-full aspect-square object-cover" src="img/ad/placeholder1.png" alt="{{ $item }}" />
          </a>
          <h5 class="text-xl font-bold text-center text-white bg-lime-700 py-2">{{ $item }}</h5>
          <div class="p-4 flex flex-col justify-between h-full">
            <p class="text-sm text-gray-700 mb-4">Deskripsi singkat dari {{ $item }} untuk pengguna.</p>
            <div class="flex justify-center">
              <a href="#" class="px-4 py-2 text-sm font-semibold text-white bg-lime-700 rounded hover:bg-lime-800 transition">
                SEWA
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
</section>

<!-- Why Choose Us -->
<section class="flex flex-col p-3 space-y-3 mt-3">
  <!-- Judul -->
  <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center">
    <div class="col-span-4 sm:col-span-2">
      <hr class="h-1.5 bg-stone-700 border-0 rounded-lg" />
    </div>
    <div class="col-span-4 sm:col-span-8 m-auto shadow-md">
      <span class="flex justify-center font-bold lg:text-2xl md:text-xl text-xs text-white bg-lime-600 px-2 py-1 rounded-md">
        Apa Itu Matrix?
      </span>
    </div>
    <div class="col-span-4 sm:col-span-2">
      <hr class="h-1.5 bg-stone-700 border-0 rounded-lg" />
    </div>
  </div>
</div>
</section>

  <!-- Fitur Keunggulan -->
  <div class="flex flex-wrap justify-center gap-6">
    <div class="space-y-12 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
      <!-- Item 1 -->
      <div class="text-center">
        <div class="flex justify-center items-center mx-auto mb-4 w-14 h-14 rounded-full bg-green-900">
          <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
        <h3 class="mb-2 text-xl font-bold">Sewa Mudah</h3>
        <p class="text-spuruce-500">Kelola penyewaan komputer dengan sistem yang mudah digunakan, memudahkan kamu dalam mengatur waktu sewa dan pemesanan tanpa ribet.</p>
      </div>

      <!-- Item 2 -->
      <div class="text-center">
        <div class="flex justify-center items-center mx-auto mb-4 w-14 h-14 rounded-full bg-green-900">
          <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
          </svg>
        </div>
        <h3 class="mb-2 text-xl font-bold">Perangkat Prima</h3>
        <p class="text-spuruce-500">Kami pastikan semua komputer dalam kondisi prima dan siap digunakan kapan saja, memberikan pengalaman terbaik bagi pelanggan warung internet kamu.</p>
      </div>
      <!-- Item 3 -->
      <div class="text-center">
        <div class="flex justify-center items-center mx-auto mb-4 w-14 h-14 rounded-full bg-green-900">
          <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
          </svg>
        </div>
        <h3 class="mb-2 text-xl font-bold">Layanan Cepat dan Ramah</h3>
        <p class="text-spuruce-500">Dukungan kami selalu siap membantu dengan respons cepat, sehingga kamu dan pelanggan mendapatkan pengalaman sewa yang nyaman dan tanpa hambatan.</p>
      </div>
    </div>
  </div>
</section>
<div>

<!-- Hero Banner Warnet -->
<section class="relative w-full h-64 md:h-80 lg:h-96 overflow-hidden rounded-t-2xl shadow-lg mt-10">
  <!-- Gambar latar -->
  <img src="{{ asset('img/pc/pc3.jpg') }}" alt="Warnet Banner" class="absolute inset-0 w-full h-full object-cover">

  <!-- Overlay gelap agar teks terbaca -->
  <div class="absolute inset-0 bg-gradient-to-t from-lime-950 to-white opacity-80"></div>

  <!-- Konten teks di tengah -->
  <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
    <h2 class="text-lg md:text-2xl font-medium mb-1 drop-shadow">Punya pengalaman seru di warnet?</h2>
    <h1 class="text-xl md:text-3xl font-bold mb-4 drop-shadow">Bagikan ceritamu di sini!</h1>
    <a href="{{ route('login') }}" class="bg-yellow-400 text-black font-semibold px-4 py-2 rounded hover:bg-yellow-500 transition">
      Rent Now
    </a>
  </div>
</section>

@endsection
