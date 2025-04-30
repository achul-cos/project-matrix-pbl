@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">

        <!-- Sidebar -->
        <div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-4">
          <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F]"></div>
          <h2 class="text-[#556B2F] font-bold text-lg">Achul</h2>
          <ul class="space-y-2 w-full text-center text-sm">
            <li>Riwayat Penyewaan</li>
            <li>Riwayat Top Up</li>
            <li>Pengaturan Akun</li>
            <li>Ganti Password</li>
            <li class="text-red-600 font-semibold">Keluar Akun</li>
            <li class="text-red-700 font-bold">Hapus Akun</li>
          </ul>
        </div>

    <!-- Main Content -->
    <main class="flex-1 bg-white rounded-lg border border-dark-olive min-h-[600px]">
      <div class="p-4">
        <h2 class="text-center font-bold text-lg mb-4">Riwayat Pesanan</h2>

      <!-- Search Orders -->
      <form method="GET" action="" class="flex justify-center mb-6">
        <div class="relative w-full max-w-md">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
          </div>
          <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="w-full pl-10 pr-4 py-2 border rounded-md shadow-sm"
            placeholder="Cari berdasarkan Kode Pesanan atau Nama Komputer"
          />
        </div>
      </form>

        <!-- Order Content -->
        <div class="orders-container space-y-6 px-2">
          <!-- Order item -->
          <div class="order-item cursor-pointer border rounded-md" data-keywords="pc acer aspire c3 core i7-3770 ram 8 gb public room">
            <!-- Order Header -->
            <div class="flex justify-between items-center p-3 border-b">
              <div class="flex items-center gap-2">
                <div class="h-6 w-6 bg-red-600 rounded"></div>
                <span class="font-medium">Kode Pesanan A</span>
              </div>
              <div class="flex items-center gap-2">
                </button>
                <span class="text-red-600 font-medium">SELESAI</span>
              </div>
            </div>

            <!-- Order Details -->
            <div class="p-4 flex flex-col md:flex-row">
              <!-- Computer Image -->
              <div class="mb-4 md:mb-0 md:mr-4">
                <div class="relative">
                  <div class="w-32 h-32 bg-gray-200 rounded flex items-center justify-center overflow-hidden">
                    <img src="img/ad/placeholder1.png" alt="PC Acer" class="w-full h-full object-cover"/>
                  </div>
                  <div class="absolute bottom-0 bg-dark-olive w-full text-center text-white text-xs py-1">
                    ACER ASPIRE C3
                  </div>
                </div>
              </div>

              <!-- Computer Details -->
              <div class="flex-1">
                <div class="flex flex-col md:flex-row md:justify-between">
                  <div>
                    <h3 class="font-medium">PC Acer Aspire C3 - Core i7-3770 - Ram 8 GB</h3>
                    <p class="text-sm text-gray-600">Public Room 3</p>
                    <p class="text-sm text-gray-600">1 Jam</p>
                  </div>
                  <div class="text-left md:text-right mt-3 md:mt-0">
                    <p class="font-medium">TOTAL PESANAN : <span class="text-red-600">2 TOKEN</span></p>
                    <button class="bg-dark-olive text-white px-4 py-1 rounded mt-4">
                      SEWA LAGI
                    </button>
                  </div>
                </div>
                <p class="text-sm text-gray-600 mt-4">Penyewaan pada tanggal 22 February 2025</p>
              </div>
            </div>
          </div>

          <!-- Second order item (for demonstration) -->
          <div class="order-item cursor-pointer border rounded-md" data-keywords="pc dell optiplex core i5-9400 ram 16 gb private room">
            <!-- Order Header -->
            <div class="flex justify-between items-center p-3 border-b">
              <div class="flex items-center gap-2">
                <div class="h-6 w-6 bg-red-600 rounded"></div>
                <span class="font-medium">Kode Pesanan B</span>
              </div>
              <div class="flex items-center gap-2">
                </button>
                <span class="text-red-600 font-medium">SELESAI</span>
              </div>
            </div>

            <!-- Order Details -->
            <div class="p-4 flex flex-col md:flex-row">
              <!-- Computer Image -->
              <div class="mb-4 md:mb-0 md:mr-4">
                <div class="relative">
                  <div class="w-32 h-32 bg-gray-200 rounded flex items-center justify-center overflow-hidden">
                    <img src="/api/placeholder/150/150" alt="PC Dell" class="w-full h-full object-cover"/>
                  </div>
                  <div class="absolute bottom-0 bg-dark-olive w-full text-center text-white text-xs py-1">
                    DELL OPTIPLEX
                  </div>
                </div>
              </div>

              <!-- Computer Details -->
              <div class="flex-1">
                <div class="flex flex-col md:flex-row md:justify-between">
                  <div>
                    <h3 class="font-medium">PC Dell Optiplex - Core i5-9400 - Ram 16 GB</h3>
                    <p class="text-sm text-gray-600">Private Room 2</p>
                    <p class="text-sm text-gray-600">2 Jam</p>
                  </div>
                  <div class="text-left md:text-right mt-3 md:mt-0">
                    <p class="font-medium">TOTAL PESANAN : <span class="text-red-600">3 TOKEN</span></p>
                    <button class="bg-dark-olive text-white px-4 py-1 rounded mt-4">
                      SEWA LAGI
                    </button>
                  </div>
                </div>
                <p class="text-sm text-gray-600 mt-4">Penyewaan pada tanggal 18 February 2025</p>
              </div>
            </div>
          </div>

          <!-- Empty state placeholder -->
          <div id="empty-orders" class="hidden py-12 text-center text-gray-500">
            <p>Tidak ada pesanan yang ditemukan</p>
          </div>
        </div>
      </div>
    </main>
  </div>

@endsection
