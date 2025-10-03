<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Meta SEO Dasar -->
    <meta name="description" content="WarnetMatrix - Sewa komputer warnet dengan mudah, cepat, dan online!">
    <meta name="keywords" content="warnet, penyewaan komputer, komputer warnet, matrix warnet, warnet online">
    <meta name="author" content="Matrix Team">

    <!-- Meta Sosial Media -->
    <meta property="og:title" content="WarnetMatrix - Sewa Komputer Online">
    <meta property="og:description" content="Platform warnet berbasis website untuk booking komputer, top up, dan monitoring real-time.">
    <meta property="og:url" content="https://www.warnetmatrix.online">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.warnetmatrix.online/public/img/public/img/logo/Matrix_Icon_Square_Logo_Green.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'Matrix')</title>
    <!-- Stylesheets -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> --}}
    <link href="../styles/flowbite.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-white inter">
    @include('components.navbar')
    <div class="pt-20 min-h-dvh pb-10">
        @yield('content')
    </div>
    @include('components.footer')
    <!-- Scripts -->
    {{-- <script src="styles/flowbite.min.js"></script> --}}
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    @vite('resources/js/app.js')
    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>     