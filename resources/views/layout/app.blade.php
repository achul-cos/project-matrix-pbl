<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'Laravel app')</title>
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