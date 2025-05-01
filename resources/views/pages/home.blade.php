@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<section class="flex flex-col p-4 space-y-4" id="welcome">
    <div class="mt-4 bg-white rounded-xl shadow-xl overflow-hidden transition-transform transform hover:scale-101">
        <div class="px-8 pt-8 pb-4 gap-4 grid grid-cols-12">
            <div class="col-span-2"><hr class="w-auto h-1.75 bg-lime-600 border-0 rounded-lg"></div>
            <div class="col-span-2"><hr class="w-auto h-1.75 bg-red-700 border-0 rounded-lg"></div>
            <div class="col-span-8"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
        </div>
        <div class="p-8 gap-4 grid grid-cols-2 content-start">
            <div class="grid justify-start pl-2 mr-2 grid-rows-2">
                <div class="">
                    <h3 class="text-5xl font-bold">Halo, <span class="text-lime-600">Achul</span> </h3>
                    <p class="text-xl mt-4 text-gray-500">Hari ini sewa komputer apa ya?</p>                        
                </div>
                <div class="flex items-end content-end gap-2">
                    <div class="bg-lime-600 w-5 h-5"></div>
                    <div class="text-lime-600 font-bold">Warnet Online</div>
                </div>
            </div>
            <div class="grid grid-flow-row grid-rows-2 auto-rows-max justify-end gap-4 pr-2 ml-2">
                <div class="flex gap-8 justify-end">
                    <div class="w-1/5 h-1/5 min-h-2/5 min-w-2/5 transition-transform transform hover:scale-110"><a href="/search"><img src="img/ui/tombol_intel.png" alt="" class="shadow-md rounded-lg"></a></div>
                    <div class="w-1/5 h-1/5 min-h-2/5 min-w-2/5 transition-transform transform hover:scale-110"><a href="/search"><img src="img/ui/tombol_amd.png" alt="" class="shadow-md rounded-lg"></a></div>
                </div>
                <div class="flex gap-8 justify-end">
                    <div class="w-1/5 h-1/5 min-h-2/5 min-w-2/5 transition-transform transform hover:scale-110"><a href="/search"><img src="img/ui/tombol_rtx.png" alt="" class="shadow-md rounded-lg"></a></div>
                    <div class="w-1/5 h-1/5 min-h-2/5 min-w-2/5 transition-transform transform hover:scale-110"><a href="/topup"><img src="img/ui/tombol_isi_token.png" alt="" class="shadow-md rounded-lg"></a></div>
                </div>    
            </div>   
        </div>
    </div>
</section>
<section class="flex flex-col p-4 space-y-4 mt-4" id="rekomendasi produk">
    <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center">
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-8 m-auto shadow-md"><span class="flex font-bold lg:text-2xl md:text-xl max-sm:text-xs text-white bg-lime-600 text-center px-2 py-1">Rekomendasi Untukmu</span></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 p-4">
        <div class="transition-transform transform hover:scale-102">
            <a href="#"><img src="img/ad/placeholder1.png" alt="" class="rounded-xl shadow-xl aspect-video object-fit"></a>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <a href="#"><img src="img/ad/placeholder1.png" alt="" class="rounded-xl shadow-xl aspect-video object-fit"></a>
        </div>
    </div>
    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 p-4 justify-items-center">
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="transition-transform transform hover:scale-102">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg aspect-1/1 object-cover" src="img/ad/placeholder1.png" alt="" />
                </a>
                <a href="#">
                    <h5 class="mb-2 text-2xl p-3 font-bold text-center tracking-tight text-white dark:text-white bg-lime-700 ">Komputer A</h5>
                </a>
                <div class="p-5">
                    <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Lorem Ipsum Dolor Sit Amet</p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                        <a href="#" class="inline-flex items-center px-3 py-2 text-lg font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-900 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring--800">
                            SEWA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<section class="flex flex-col p-4 space-y-4 mt-4" id="event">
    <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center">
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-8 m-auto shadow-md"><span class="flex font-bold lg:text-2xl md:text-xl max-sm:text-xs text-white bg-lime-600 text-center px-2 py-1">Event Terbaru</span></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4 p-4">
        <div class="">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-30 -translate-x-full z-10" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-20 translate-x-0 z-30" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-10 translate-x-full z-20" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-30 -translate-x-full z-10 hidden" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-30 -translate-x-full z-10 hidden" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800" aria-current="true" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev="">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"></path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next="">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-30 -translate-x-full z-10" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-20 translate-x-0 z-30" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-10 translate-x-full z-20" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-30 -translate-x-full z-10 hidden" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="duration-700 ease-in-out absolute inset-0 transition-transform transform z-30 -translate-x-full z-10 hidden" data-carousel-item="">
                        <img src="img/ad/placeholder1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800" aria-current="true" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev="">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"></path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next="">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>
<section class="flex flex-col p-4 space-y-4 mt-4" id="artikel">
    <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center">
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-8 m-auto shadow-md"><span class="flex font-bold lg:text-2xl md:text-xl max-sm:text-xs text-white bg-lime-600 text-center px-2 py-1">Kamu Perlu Tahu Nih</span></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
    </div>
    <div class="grid grid-cols-12 gap-0 bg-white rounded-xl shadow-xl mx-8 mt-4 max-sm:hidden">
        <div class="col-span-6 rounded-l-xl" style="background-image: url(img/ad/placeholder1.png); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
        <div class="col-span-6 p-8 grid grid-row-4 gap-4">
            <div class="row-span-1">
                <p class="font-bold text-2xl">Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
            <div class="row-span-1">
                <div class="grid grid-cols-12 gap-4 mt-8">
                    <div class="col-span-6"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-lime-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-red-700 border-0 rounded-lg"></div>
                </div>                
            </div>
            <div class="row-span-1">
                <p class="pt-4 text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet.</p>
            </div>
            <div class="row-span-1 mt-8">
                <a href="#" class="font-bold text-md p-4 bg-lime-800 text-white rounded-md">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="grid grid-rows-12 gap-0 bg-white rounded-xl shadow-xl mx-8 mt-4 min-sm:hidden">
        <div class="row-span-6 rounded-t-xl" style="background-image: url(img/ad/placeholder1.png); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
        <div class="row-span-6 p-8">
            <div class="row-span-1">
                <p class="font-bold text-2xl">Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
            <div class="row-span-1">
                <div class="grid grid-cols-12 gap-4 mt-4">
                    <div class="col-span-6"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-lime-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-red-700 border-0 rounded-lg"></div>
                </div>                
            </div>
            <div class="row-span-1">
                <p class="pt-4 text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet.</p>
            </div>
            <div class="row-span-1 mt-8 pb-4">
                <a href="#" class="font-bold text-md p-4 bg-lime-800 text-white rounded-md">Baca Selengkapnya</a>
            </div> 
        </div>
    </div> 
</section>
<section class="flex flex-col p-4 space-y-4 mt-4 pb-20" id="aplikasi">
    <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center">
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-8 m-auto shadow-md"><span class="flex font-bold lg:text-2xl md:text-xl max-sm:text-xs text-white bg-lime-600 text-center px-2 py-1">Game Yang Ada Diwarnet</span></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
    </div>
    <p class="py-4 font-light text-xl text-center">Game Online & Offline</p>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-10 p-8 place-items-center">
        <img src="https://upload.wikimedia.org/wikipedia/id/5/5d/Genshin_Impact_logo.svg" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/en/7/7f/Honkai_Star_Rail_%28logo%29.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/b/bc/Zenless_Zone_Zero_transparent_logo.svg/1200px-Zenless_Zone_Zero_transparent_logo.svg.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Valorant_logo_-_pink_color_version.svg/816px-Valorant_logo_-_pink_color_version.svg.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://static.cdnlogo.com/logos/r/50/roblox.svg" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/id/5/5d/Wuthering_Waves_logo.svg" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/en/d/da/Honkai_Impact_3rd_logo.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/id/f/f9/Lost_Saga_Logo.jpg" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
    </div>
    <p class="py-4 font-light text-xl text-center">Aplikasi Produktif</p>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-10 p-8 place-items-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/2203px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Adobe_Photoshop_CC_icon.svg/1051px-Adobe_Photoshop_CC_icon.svg.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Adobe_Illustrator_CC_icon.svg/2101px-Adobe_Illustrator_CC_icon.svg.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Adobe_Premiere_Pro_CC_icon.svg/2101px-Adobe_Premiere_Pro_CC_icon.svg.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://brandlogos.net/wp-content/uploads/2025/03/coreldraw-logo_brandlogos.net_96dfz.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Visual_Studio_Code_1.35_icon.svg/2048px-Visual_Studio_Code_1.35_icon.svg.png" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/84/Spotify_icon.svg" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        <img src="https://static.cdnlogo.com/logos/d/43/discord.svg" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
    </div>
</section>
@endsection