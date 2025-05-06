@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="w-full flex h-screen">
    <!-- OPEN Button (Left side) -->
    <a href="#" class="w-full h-full" onclick="checkOpenTime()">
    <button type="button" class="w-full h-full text-green-700 hover:text-white border border-none hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-none text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 flex flex-col items-center justify-center cursor-pointer">
        <span class="text-[25px]">OPEN</span>
        <span class="text-lg mt-2">at 07.00 AM</span>
    </button>
    </a>

    <!-- CLOSE Button (Right side) -->
    <a href="#" class="w-full h-full" onclick="checkCloseTime()">
    <button type="button" class="w-full h-full text-red-700 hover:text-white border border-none hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-none text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 flex flex-col items-center justify-center cursor-pointer">
        <span class="text-[25px]">CLOSE</span>
        <span class="text-lg mt-2">at 05.00 PM</span>
    </button>
    </a>
    
</div>

<script>
    function checkCloseTime() {
        const now = new Date();
        const currentHour = now.getHours();
        const currentMinute = now.getMinutes();

        const closeHour = 17;

        if (currentHour < closeHour || (currentHour === closeHour && currentMinute < 0)) {
            alert("Belum Waktunya");
            event.preventDefault();
        } else {
        const confirmation = confirm("Sudah jam 5 PM, yakin mau tutup?");
            alert("Toko berhasil ditutup!");
        }
    }

    function checkOpenTime() {
        alert("Toko berhasil dibuka!");
    }
    </script>
@endsection