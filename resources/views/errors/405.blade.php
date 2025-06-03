@extends('layout.error')

@section('title', '405 - Method Error Matrix')

@section('content')

<div class="flex flex-col justify-center items-center min-h-screen text-center -mt-20">
    <img src="../img/icon/kazuha_chibi.png" alt="" class="w-20 h-20 object-fill mb-4">
    <p class="lg:text-3xl md:text-xl sm:text-lg text-lime-900 opacity-80 font-bold mt-6">
        "Maaf Server Kami Menduga Hal Mencurigakan"
    </p>
    <p class="lg:text-sm md:text-lg sm:text-sm text-lime-900 font-bold mt-4">
        <span class="opacity-60"> Silahkan Coba lagi atau Pencet </span> <a href="/home" class="opacity-80 font-black hover:underline duration-100 ease-in">Home</a> <span class="opacity-60"> Jika Perlu. </span>
    </p>

    <p class="text-xs text-black opacity-45 font-black  mt-10 font-mono">
        Erorr 405 - Method Not Allowed
    </p>
</div>



@endsection
