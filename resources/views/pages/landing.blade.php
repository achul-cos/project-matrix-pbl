@extends('layout.landing')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<!-- Hero Banner Warnet -->
<section class="relative w-full h-screen flex items-center justify-center overflow-hidden rounded-t-2xl">
  <!-- Gambar latar -->
  <img src="{{ asset('img/ad/background-landing.gif') }}" alt="Warnet Banner" class="absolute inset-0 w-full h-full object-cover">
  <img src="{{ asset('img/ad/background-landing-2.gif') }}" alt="Warnet Banner" class="absolute inset-0 z-20 w-full h-full object-cover">

  <!-- Overlay gelap agar teks terbaca -->
  <div class="absolute inset-0 bg-gradient-to-t from-white to-transparent "></div>

  <!-- Intro Matrix -->
  <img id="introImage" src="{{ asset('img/ad/background-landing-3.gif') }}" class="absolute inset-0 z-20 w-full h-full object-cover fade visible">
  <div id="introContent" class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-30 relative fade">
      <a href="#" class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-green-700 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300 hover:bg-green-200 dark:hover:bg-green-800">
          <span class="text-xs bg-green-600 rounded-full text-white px-4 py-1.5 me-3">New</span> <span class="text-sm font-medium">MATRIX Under Development Version 0.1</span> 
          <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
      </a>
      <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">Are You Ready To Enter <span class="text-green-500 matrix-text" data-text="MATRIX">MATRIX</span> World!</h1>
      <p class="mb-8 text-lg font-normal text-gray-50 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Warnet bukan hanya sekedar tempat pelarian seorang pencundang atau pemalas. Pernahkah Kamu berpikir? Seberapa luas dunia saat kamu benar-benar hanyut didunia internet bersama MATRIX?</p>
      <form action="/search" method="get" name="search" id="search" class="w-full max-w-md mx-auto">
          <div class="relative">
              <div class="absolute inset-y-0 rtl:inset-x-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
              </div>
              <input type="text" name="search" value="{{ request('search') }}" id="search-navbar" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Cari Komputer Impianmu..." required />
              <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Cari</button>
          </div>
      </form>
  </div>
</section>

<div class="gap-y-18 px-12 mt-12">

  <!-- Carousel Section -->
  <section class="relative w-full py-10 fade-in">

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

  <!-- Tulisan di sebelah kiri -->
  <section class="mb-16 md:flex md:gap-8 md:items-start fade-in">
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
    </div>

    <!-- Gambar di sebelah kanan -->
    <div class="md:w-1/2 md:pl-10 mb-6 md:mb-0 transition-all transform hover:scale-105 active:scale-100 active:shadow-inner order-1 md:order-2">
        <div class="w-full h-64 md:h-80 rounded-lg overflow-hidden">
            <img src="img/ad/placeholder1.png" alt="Gambar artikel pertama" class="w-full h-full object-cover" />
        </div>
    </div>
  </section>

  <!-- Rekomendasi -->
  <section class="flex flex-col space-y-3 mt-3 fade-in" id="event">
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
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 place-items-center mt-8">
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
  </section>

  <!-- Why Choose Us -->
  <section class="flex flex-col space-y-3 mt-12 fade-in">
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
  </section>

  <!-- Fitur Keunggulan -->
  <section class="flex flex-wrap justify-center gap-6 mb-16 fade-in">
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
  </section>

</div>

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
.matrix-container {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  z-index: 2; /* Ensure it stays above the rain effect */
}

.matrix-text {
  color: #0f0;
  font-size: 70px;
  font-family: monospace;
  position: relative;
  text-shadow: 0 0 10px #0f0, 0 0 20px #0f0, 0 0 30px #0f0;
  z-index: 2; /* Ensure it stays above the rain effect */
}

.matrix-text::before {
  content: attr(data-text);
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  animation: glitch 2s infinite;
  clip-path: polygon(0 0, 100% 0, 100% 45%, 0 45%);
  transform: translate(-2px, -2px);
  color: #0f0;
  text-shadow: 0 0 5px #0f0, 0 0 15px #0f0;
}

.rain {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: repeating-linear-gradient(
    0deg,
    rgba(0, 255, 0, 0.1) 0,
    rgba(0, 255, 0, 0.2) 2px,
    transparent 4px
  );
  animation: rain 10s linear infinite;
  z-index: 1; /* Place it behind the text */
}

/* Animation for the rain effect */
@keyframes rain {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(100%);
  }
}

/* Glitch effect for the text */
@keyframes glitch {
  0%, 100% {
    clip-path: polygon(0 0, 100% 0, 100% 45%, 0 45%);
    transform: translate(0);
  }
  33% {
    clip-path: polygon(0 0, 100% 0, 100% 15%, 0 15%);
    transform: translate(-5px, -5px);
  }
  66% {
    clip-path: polygon(0 85%, 100% 85%, 100% 100%, 0 100%);
    transform: translate(5px, 5px);
  }
}

</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.fade-in');

    const options = {
      root: null, // viewport
      rootMargin: '0px',
      threshold: 0.1 // 10% dari section harus terlihat
    };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target); // Hentikan pengamatan setelah muncul
        }
      });
    }, options);

    sections.forEach(section => {
      observer.observe(section);
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    setTimeout(() => {
      const introImage = document.getElementById('introImage');
      const introContent = document.getElementById('introContent');
      // Menghilangkan gambar dengan transisi
      introImage.classList.remove('visible');
      // Menambahkan kelas visible ke konten setelah gambar menghilang
      setTimeout(() => {
        introContent.classList.add('visible');
      }, 500); // Waktu yang sama dengan durasi transisi
    }, 2500); // Ganti setelah 3 detik
  });
</script>

@endsection
