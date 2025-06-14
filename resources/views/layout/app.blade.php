<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'Laravel app')</title>
    <!-- Stylesheets -->
    <link href="styles/flowbite.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-white inter">
    @include('components.navbar')
    <div class="pt-20 min-h-dvh pb-10">
        @yield('content')
    </div>
    @include('components.footer')
    <!-- Scripts -->
    <script src="styles/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    @vite('resources/js/app.js')
    <!-- Flowbite JS -->
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>
</html>     