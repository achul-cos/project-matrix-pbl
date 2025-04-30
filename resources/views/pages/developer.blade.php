@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

{{-- Tempat Kode Front End Halaman Developer --}}

<section class="pt-8 pb-8 content-center" id="header">
    <div class="mb-10 mt-10 flex flex-col gap-6">
        <p class="text-center text-3xl max-md:text-lg bg-lime-800 text-white font-black px-2 py-1 shadow-lg inline-flex self-center">Tentang Pengembang</p>
        <div class="flex flex-row self-center items-center gap-4">
            <p class="text-center mt-0 text-lg max-md:text-md text-gray-700 font-light italic">
                <a href="#pengembang" class="hover:underline">Tim Pengembang</a>
            </p>
            <svg class="w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
            </svg>
            <p class="text-center mt-0 text-lg max-md:text-md text-gray-700 font-light italic">
                <a href="#latarbelakang" class="hover:underline">Latar Belakang Matrix</a>
            </p>
            <svg class="w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
            </svg>
            <p class="text-center mt-0 text-lg max-md:text-md text-gray-700 font-light italic">
                <a href="#teknologi" class="hover:underline">Teknologi Matrix</a>
            </p>
            <svg class="w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"></path>
            </svg>
            <p class="text-center mt-0 text-lg max-md:text-md text-gray-700 font-light italic">
                <a href="#dokumentasi" class="hover:underline">Dokumentasi Proyek</a>
            </p>
        </div>
    </div>
    <div class="gap-4 grid grid-cols-12 w-(screen)">
        <div class="col-span-2"><hr class="w-auto h-1.75 bg-lime-600 border-0"></div>
        <div class="col-span-2"><hr class="w-auto h-1.75 bg-red-700 border-0"></div>
        <div class="col-span-8"><hr class="w-auto h-1.75 bg-stone-700 border-0"></div>
    </div>
</section>

<section class="mt-20 p-4 px-10" id="pengembang">
    <div class="flex gap-12 flex-wrap justify-center">
        @php
            $developers = config('developer.developer');
        @endphp
        @foreach ($developers as $developer)
            @include('components.developer_card', [
                'id_pengembang' => $developer['id_pengembang'] ?? null,
                'nama_pengembang' => $developer['nama_pengembang'] ?? null,
                'role_pengembang' => $developer['role_pengembang'] ?? null,
                'deskripsi_pengembang' => $developer['deskripsi_pengembang'] ?? null,
                'biografi_pengembang' => $developer['biografi_pengembang'] ?? null,
                'foto_pengembang' => $developer['foto_pengembang'] ?? null,
                'instagram_pengembang' => $developer['instagram_pengembang'] ?? null,
                'linkedin_pengembang' => $developer['linkedin_pengembang'] ?? null,
            ])
        @endforeach
    </div>
</section>

<section class="mt-20 p-4 px-24 max-md:px-24 max-sm:px-12" id="latarbelakang">
    <div class="flex flex-wrap justify-between gap-y-12">
        @include('components/article_card_1', [
            // 'foto_card_artikel' => '',
            'judul_card_artikel' => 'Latar Belakang Muncul Matrix Karena Masalah Dari Ketua Tim Sendiri?',
            // 'isi_card_artikel' => '',            
        ])
        
        @include('components/article_card_2', [
            // 'foto_card_artikel' => '',
            'judul_card_artikel' => 'Logo Matrix Terinspirasi Dari Logo Prodi GIM Polibatam?',
            // 'isi_card_artikel' => '',            
        ])
    </div>
</section>

<section class="mt-20 p-4 px-24 max-md:px-24 max-sm:px-12" id="teknologi">
    <x-gallery_grid 
    title="Teknologi Matrix"
    :images="[
        'https://static.cdnlogo.com/logos/l/23/laravel.svg', 
        'https://static.cdnlogo.com/logos/t/34/tailwind-css.svg',
        'https://cdn.dribbble.com/userupload/4053517/file/original-3faf74424407b341ee34db992111f2d5.png',
        'https://static.cdnlogo.com/logos/f/54/figma.svg',
        ]" 
    />
</section>

<section class="mt-20 mb-20 p-4 px-24 max-md:px-24 max-sm:px-12" id="dokumentasi">
    <x-gallery 
    title="Dokumentasi Proyek"
    :images="[
        'images/dokumentasi/dokumentasi1.jpg',
        'images/dokumentasi/dokumentasi2.jpg',
        'images/dokumentasi/dokumentasi3.jpg',
        'images/dokumentasi/dokumentasi4.jpg',
        'images/dokumentasi/dokumentasi5.jpg',
        'images/dokumentasi/dokumentasi6.jpg',
        'images/dokumentasi/dokumentasi7.jpg',
        'images/dokumentasi/dokumentasi8.jpg',
        'images/dokumentasi/dokumentasi9.jpg',
        'images/dokumentasi/dokumentasi10.jpg',
        'images/dokumentasi/dokumentasi11.jpg',
        'images/dokumentasi/dokumentasi12.jpg',
        'images/dokumentasi/dokumentasi13.jpg',
        'images/dokumentasi/dokumentasi14.jpg',
        'images/dokumentasi/dokumentasi15.jpg',
        'images/dokumentasi/dokumentasi16.jpg',
        'images/dokumentasi/dokumentasi17.jpg',
        'images/dokumentasi/dokumentasi18.jpg',
        'images/dokumentasi/dokumentasi19.jpg',
        'images/dokumentasi/dokumentasi20.jpg',
        'images/dokumentasi/dokumentasi21.jpg',
        'images/dokumentasi/dokumentasi22.jpg',
        'images/dokumentasi/dokumentasi23.jpg',
        'images/dokumentasi/dokumentasi24.jpg',
    ]" />

</section>

@endsection