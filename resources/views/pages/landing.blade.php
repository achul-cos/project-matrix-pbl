@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<!-- Hero Section -->
<section class="flex flex-col p-4 space-y-4" id="welcome">
    <div class="mt-4 bg-white rounded-xl shadow-xl overflow-hidden transition-transform transform hover:scale-101">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Main Banner -->
        <div class="md:col-span-2 h-49 flex items-center justify-center overflow-hidden">
          <a href="#"><img src="img/ad/placeholder1.png" alt="" class="rounded-xl shadow-xl aspect-video object-fit"></a>
        </div>

        <!-- Right Sub Banners -->
        <div class="md:col-span-1 space-y-4">
          <!-- Sub Banner 1 -->
          <div class="h-21 flex items-center justify-center overflow-hidden">
            <a href="#"><img src="img/ad/placeholder1.png" alt="" class="rounded-xl shadow-xl aspect-video object-fit"></a>
          </div>

          <!-- Sub Banner 2 -->
          <div class="h-21 flex items-center justify-center overflow-hidden">
            <a href="#"><img src="img/ad/placeholder1.png" alt="" class="rounded-xl shadow-xl aspect-video object-fit"></a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Popular Computers Section -->
</section>
<section class="flex flex-col p-4 space-y-4 mt-4" id="event">
    <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center">
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-8 m-auto shadow-md"><span class="flex font-bold lg:text-2xl md:text-xl max-sm:text-xs text-white bg-lime-600 text-center px-2 py-1">Komputer Terpopuler</span></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
    </div>
    <div class="overflow-x-auto scroll-smooth scrollbar-hide">
      <div class="flex flex-wrap px-2 justify-center">
        <!-- Carousel Items -->
        <div class="w-64 flex-shrink-0 p-2">
          <div class="bg-gray-200 p-6 flex flex-col items-center justify-center rounded-lg shadow">
            <div class="w-full h-32 mb-2 overflow-hidden rounded">
              <img src="img/ad/placeholder1.png" alt="Computer 2" class="w-full h-full object-cover">
            </div>
            <span class="text-gray-500 font-medium">89 X DISEWA</span>
          </div>
        </div>

        <div class="w-64 flex-shrink-0 p-2">
          <div class="bg-gray-200 p-6 flex flex-col items-center justify-center rounded-lg shadow">
            <div class="w-full h-32 mb-2 overflow-hidden rounded">
              <img src="img/ad/placeholder1.png" alt="Computer 1" class="w-full h-full object-cover">
            </div>
            <span class="text-gray-500 font-medium">99 X DISEWA</span>
          </div>
        </div>

        <div class="w-64 flex-shrink-0 p-2">
          <div class="bg-gray-200 p-6 flex flex-col items-center justify-center rounded-lg shadow">
            <div class="w-full h-32 mb-2 overflow-hidden rounded">
              <img src="img/ad/placeholder1.png" alt="Computer 2" class="w-full h-full object-cover">
            </div>
            <span class="text-gray-500 font-medium">89 X DISEWA</span>
          </div>
        </div>

        <div class="w-64 flex-shrink-0 p-2">
          <div class="bg-gray-200 p-6 flex flex-col items-center justify-center rounded-lg shadow">
            <div class="w-full h-32 mb-2 overflow-hidden rounded">
              <img src="img/ad/placeholder1.png" alt="Computer 3" class="w-full h-full object-cover">
            </div>
            <span class="text-gray-500 font-medium">79 X DISEWA</span>
          </div>
        </div>

        <div class="w-64 flex-shrink-0 p-2">
          <div class="bg-gray-200 p-6 flex flex-col items-center justify-center rounded-lg shadow">
            <div class="w-full h-32 mb-2 overflow-hidden rounded">
              <img src="img/ad/placeholder1.png" alt="Computer 4" class="w-full h-full object-cover">
            </div>
            <span class="text-gray-500 font-medium">69 X DISEWA</span>
          </div>
        </div>

        <div class="w-64 flex-shrink-0 p-2">
          <div class="bg-gray-200 p-6 flex flex-col items-center justify-center rounded-lg shadow">
            <div class="w-full h-32 mb-2 overflow-hidden rounded">
              <img src="img/ad/placeholder1.png" alt="Computer 5" class="w-full h-full object-cover">
            </div>
            <span class="text-gray-500 font-medium">59 X DISEWA</span>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Kategori Pilihan -->
<section class="flex flex-col p-4 space-y-4 mt-4" id="event">
    <div class="px-8 py-2 gap-4 sm:gap-2 grid grid-cols-12 items-center">
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-8 m-auto shadow-md"><span class="flex font-bold lg:text-2xl md:text-xl max-sm:text-xs text-white bg-lime-600 text-center px-2 py-1">Kategori Pilihan</span></div>
        <div class="col-span-4 lg:col-span-4 sm:col-span-2"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
    </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Category Items -->
            <div class="transition-transform transform hover:scale-102 px-4">
                <div class="w-full max-w-xl mx-auto bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                  <div class="bg-[url('img/ad/placeholder1.png')] bg-cover bg-center text-center pt-16 pb-10">
                    <h5 class="text-2xl font-bold text-white">Komputer A</h5>
                  </div>
                  <div class="p-5 bg-gray-900">
                    <p class="mb-5 font-normal text-gray-300 text-center">
                      Lorem Ipsum Dolor Sit Amet
                    </p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                      <a href="#" class="inline-flex items-center px-5 py-2 text-lg font-medium text-white bg-lime-600 rounded-lg hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-900">
                        SEWA
                      </a>
                    </div>
                  </div>

                </div>
              </div>
              <div class="transition-transform transform hover:scale-102 px-4">
                <div class="w-full max-w-xl mx-auto bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                  <div class="bg-[url('img/ad/placeholder1.png')] bg-cover bg-center text-center pt-16 pb-10">
                    <h5 class="text-2xl font-bold text-white">Komputer B</h5>
                  </div>
                  <div class="p-5 bg-gray-900">
                    <p class="mb-5 font-normal text-gray-300 text-center">
                      Lorem Ipsum Dolor Sit Amet
                    </p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                      <a href="#" class="inline-flex items-center px-5 py-2 text-lg font-medium text-white bg-lime-600 rounded-lg hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-900">
                        SEWA
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="transition-transform transform hover:scale-102 px-4">
                <div class="w-full max-w-xl mx-auto bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                  <div class="bg-[url('img/ad/placeholder1.png')] bg-cover bg-center text-center pt-16 pb-10">
                    <h5 class="text-2xl font-bold text-white">Komputer C</h5>
                  </div>
                  <div class="p-5 bg-gray-900">
                    <p class="mb-5 font-normal text-gray-300 text-center">
                      Lorem Ipsum Dolor Sit Amet
                    </p>
                    <div class="py-2 px-5 flex items-center justify-center h-full">
                      <a href="#" class="inline-flex items-center px-5 py-2 text-lg font-medium text-white bg-lime-600 rounded-lg hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-900">
                        SEWA
                      </a>
                    </div>
                  </div>
                </div>
              </div>
    </section>


    <!-- Features Section -->
    <div class="max-w-6xl mx-auto px-6 py-8">
        <!-- First Article Section - Image Left -->
        <div class="mb-16 md:flex md:items-start">
            <div class="md:w-1/2 md:pr-10 mb-6 md:mb-0">
                <div class="w-full h-64 md:h-80 rounded-lg overflow-hidden">
                    <img src="img/ad/placeholder1.png" alt="Gambar artikel pertama" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="md:w-1/2 md:pr-6 md:pt-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Komputer Berkualitas</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Kami menyediakan komputer dengan kualitas terbaik dan performa maksimal untuk kebutuhan Anda.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                </p>
            </div>
        </div>

        <!-- Second Article Section - Image Right -->
        <div class="md:flex md:items-start">
            <div class="md:w-1/2 md:pr-6 mb-6 md:mb-0 md:order-1 md:pl-10">
                <div class="w-full h-64 md:h-80 rounded-lg overflow-hidden">
                    <<img src="img/ad/placeholder1.png" alt="Gambar artikel kedua" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="md:w-1/2 md:order-0 md:pt-4 md:pr-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Layanan Profesional</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Tim teknisi kami siap membantu Anda dengan masalah teknis kapanpun Anda membutuhkan.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
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
@endsection
