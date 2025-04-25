@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

    <!-- Hero Section -->
    <section class="container mx-auto my-6 px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Main Banner -->
            <div class="md:col-span-2 h-48 flex items-center justify-center overflow-hidden">
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97" alt="Main Banner" class="w-full h-full object-cover">
            </div>

            <div class="md:col-span-1 space-y-4">
                <!-- Sub Banner 1 -->
                <div class="h-20 flex items-center justify-center overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1593640495253-23196b27a87f" alt="Sub Banner 1" class="w-full h-full object-cover">
                </div>

                <!-- Sub Banner 2 -->
                <div class="h-20 flex items-center justify-center overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1587831990711-23ca6441447b" alt="Sub Banner 2" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Computers Section -->
    <section class="container mx-auto my-6 px-4">
        <h2 class="text-center font-bold text-xl mb-6">KOMPUTER TERPOPULER</h2>

        <div class="relative">
            <!-- Left Arrow -->
            <button id="prev-btn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-2 z-10 shadow-md focus:outline-none hover:bg-opacity-100 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Carousel -->
            <div class="overflow-hidden">
                <div id="carousel" class="flex transition-all duration-300 ease-in-out">
                    <!-- Carousel Items -->
                    <div class="w-1/5 flex-shrink-0 p-2">
                        <div class="bg-gray-200 p-6 flex flex-col items-center justify-center">
                            <div class="w-full h-32 mb-2 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1640955014216-75201056c829" alt="Computer 1" class="w-full h-full object-cover">
                            </div>
                            <span class="text-gray-500 font-medium">99 X DISEWA</span>
                        </div>
                    </div>

                    <div class="w-1/5 flex-shrink-0 p-2">
                        <div class="bg-gray-200 p-6 flex flex-col items-center justify-center">
                            <div class="w-full h-32 mb-2 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1547082299-de196ea013d6" alt="Computer 2" class="w-full h-full object-cover">
                            </div>
                            <span class="text-gray-500 font-medium">89 X DISEWA</span>
                        </div>
                    </div>

                    <div class="w-1/5 flex-shrink-0 p-2">
                        <div class="bg-gray-200 p-6 flex flex-col items-center justify-center">
                            <div class="w-full h-32 mb-2 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1547082299-de196ea013d6" alt="Computer 3" class="w-full h-full object-cover">
                            </div>
                            <span class="text-gray-500 font-medium">79 X DISEWA</span>
                        </div>
                    </div>

                    <div class="w-1/5 flex-shrink-0 p-2">
                        <div class="bg-gray-200 p-6 flex flex-col items-center justify-center">
                            <div class="w-full h-32 mb-2 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1591370874773-6702e8f12fd8" alt="Computer 4" class="w-full h-full object-cover">
                            </div>
                            <span class="text-gray-500 font-medium">69 X DISEWA</span>
                        </div>
                    </div>

                    <div class="w-1/5 flex-shrink-0 p-2">
                        <div class="bg-gray-200 p-6 flex flex-col items-center justify-center">
                            <div class="w-full h-32 mb-2 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45" alt="Computer 5" class="w-full h-full object-cover">
                            </div>
                            <span class="text-gray-500 font-medium">59 X DISEWA</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Arrow -->
            <button id="next-btn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-2 z-10 shadow-md focus:outline-none hover:bg-opacity-100 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="container mx-auto my-12 px-4">
        <h2 class="text-center font-medium text-lg mb-6">Kategori Pilihan</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Category Items -->
            <div class="border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="w-32 h-32 mx-auto mb-4 flex items-center justify-center overflow-hidden rounded-md">
                    <img src="https://images.unsplash.com/photo-1603969072881-b0fc7f3d77d7" alt="Komputer 1" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold mb-2 text-center">Komputer Gaming</h3>
                <p class="text-sm text-gray-600">
                    Komputer dengan performa tinggi untuk pengalaman gaming yang maksimal.
                </p>
            </div>

            <div class="border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="w-32 h-32 mx-auto mb-4 flex items-center justify-center overflow-hidden rounded-md">
                    <img src="https://images.unsplash.com/photo-1516387938699-a93567ec168e" alt="Komputer 2" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold mb-2 text-center">Komputer Kantor</h3>
                <p class="text-sm text-gray-600">
                    Solusi komputer yang efisien untuk kebutuhan bisnis dan produktivitas.
                </p>
            </div>

            <div class="border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="w-32 h-32 mx-auto mb-4 flex items-center justify-center overflow-hidden rounded-md">
                    <img src="https://images.unsplash.com/photo-1542744095-291d1f67b221" alt="Komputer 3" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold mb-2 text-center">Workstation</h3>
                <p class="text-sm text-gray-600">
                    Komputer performa tinggi untuk desain grafis dan pengolahan data berat.
                </p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <div class="max-w-6xl mx-auto px-6 py-8">
        <!-- First Article Section - Image Left -->
        <div class="mb-16 md:flex md:items-start">
            <div class="md:w-1/2 md:pr-10 mb-6 md:mb-0">
                <div class="w-full h-64 md:h-80 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1593642532744-d377ab507dc8" alt="Gambar artikel pertama" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="md:w-1/2 md:pr-6 md:pt-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Komputer Berkualitas</h2>
                <h3 class="text-lg text-gray-500 mb-4">Performa Maksimal</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Kami menyediakan komputer dengan kualitas terbaik dan performa maksimal untuk kebutuhan Anda.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Dengan komponen pilihan dan perakitan yang rapi, komputer kami siap melayani kebutuhan komputasi Anda.
                </p>
            </div>
        </div>

        <!-- Second Article Section - Image Right -->
        <div class="md:flex md:items-start">
            <div class="md:w-1/2 md:pr-6 mb-6 md:mb-0 md:order-1 md:pl-10">
                <div class="w-full h-64 md:h-80 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1593642634367-d91a135587b5" alt="Gambar artikel kedua" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="md:w-1/2 md:order-0 md:pt-4 md:pr-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Layanan Profesional</h2>
                <h3 class="text-lg text-gray-500 mb-4">Support 24/7</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Tim teknisi kami siap membantu Anda dengan masalah teknis kapanpun Anda membutuhkan.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Dukungan teknis 24/7 dengan garansi yang terpercaya untuk ketenangan pikiran Anda.
                </p>
            </div>
        </div>
    </div>

    <!-- Location Section -->
    <section class="max-w-6xl mx-auto p-4 md:p-6">
        <div class="text-center mb-6">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 uppercase tracking-wider">LOKASI KAMI</h2>
        </div>

        <div class="w-full h-64 md:h-96 rounded-lg overflow-hidden shadow-lg">
            <iframe
                class="w-full h-full"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127504.44013558096!2d104.00053436241162!3d1.1281182612964378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98c2ff37f7f47%3A0xf4ccdc7f01170586!2sBatam%2C%20Kota%20Batam%2C%20Kepulauan%20Riau!5e0!3m2!1sid!2sid!4v1650450987654!5m2!1sid!2sid"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>


    <script>
        // Carousel functionality using vanilla JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carousel');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const items = carousel.querySelectorAll('div[class^="w-1/5"]');
            let position = 0;
            const totalItems = items.length;
            const visibleItems = 5;

            // Function to update carousel position
            function updateCarouselPosition() {
                const itemWidth = items[0].offsetWidth;
                carousel.style.transform = `translateX(${position * itemWidth}px)`;
            }

            // Next button click handler
            nextBtn.addEventListener('click', () => {
                if (position > -(totalItems - visibleItems)) {
                    position--;
                    updateCarouselPosition();
                }
            });

            // Previous button click handler
            prevBtn.addEventListener('click', () => {
                if (position < 0) {
                    position++;
                    updateCarouselPosition();
                }
            });

            // Hide/show navigation arrows based on position
            function updateArrowVisibility() {
                prevBtn.classList.toggle('opacity-50', position === 0);
                nextBtn.classList.toggle('opacity-50', position === -(totalItems - visibleItems));
            }

            // Initialize arrow visibility
            updateArrowVisibility();

            // Update arrow visibility after each navigation
            prevBtn.addEventListener('click', updateArrowVisibility);
            nextBtn.addEventListener('click', updateArrowVisibility);

            // Handle window resize
            window.addEventListener('resize', () => {
                position = 0;
                updateCarouselPosition();
                updateArrowVisibility();
            });
        });
    </script>

@endsection