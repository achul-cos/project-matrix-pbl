<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel app')</title>
    <link rel="icon" href="{{ asset('../favicon.ico') }}">
    <!-- Stylesheets -->
    <link href="../styles/flowbite.min.css" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/simple-datatables@9.0.4'></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=add" />
    @vite('resources/css/app.css')
</head>
<body class="bg-white inter">
    @include('components.dashboard')
    <div class="mt-14 ml-64 max-sm:ml-0">
        <div class="min-h-screen">
            @yield('content')
        </div>
        @include('components.footer_admin')
    </div>
    <!-- Scripts -->
    @vite('resources/css/flowbite.min.js')
    <script src="../styles/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
