<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel app')</title>
    <link rel="icon" href="{{ asset('../favicon.ico') }}">
    <!-- Stylesheets -->
    <link href="../styles/flowbite.min.css" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/simple-datatables@9.0.4'></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-white inter max-w-screen">
    @include('components/dashboard')
    <div class="mt-14 sm:ml-64">
        <div class="min-h-screen">
            @yield('content')
        </div>
        @include('components/footer_admin')
    </div>  
    <!-- Scripts -->
    <script src="../styles/flowbite.min.js"></script>
</body>
</html>