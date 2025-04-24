<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel app')</title>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
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
</body>
</html>