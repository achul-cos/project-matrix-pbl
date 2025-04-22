<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Pesanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'dark-olive': '#556B2F',
          },
        },
      },
    }
  </script>
  <style>
    .bg-dark-olive {
      background-color: #556B2F;
    }
    .text-dark-olive {
      color: #556B2F;
    }
    .border-dark-olive {
      border-color: #556B2F;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-lime-100 font-sans">
  <!-- Header -->
  <header class="flex items-center justify-between px-6 py-3 bg-dark-olive text-white">
    <div class="flex items-center">
      <button class="text-xl mr-3">≡</button>
      <div class="text-xl font-bold">🏠</div>
    </div>
    <div class="flex-1 mx-4">
      <div class="relative">
        <input type="text" placeholder="Search" class="w-full px-3 py-1 rounded-full text-black bg-gray-100" />
        <span class="absolute right-3 top-1">🔍</span>
      </div>
    </div>
    <div class="flex items-center space-x-3">
      <span class="font-semibold">Nabila Maya</span>
      <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center text-white">👤</div>
      <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xl bg-dark-olive">+</div>
    </div>
  </header>

  <div class="flex p-4 gap-4">
    <!-- Sidebar dengan height yang sama dengan main content -->
    <div class="w-72">
      <aside class="bg-white rounded-lg border border-dark-olive p-4 flex flex-col h-full">
        <div class="text-center border-b pb-4">
          <div class="w-20 h-20 bg-red-100 rounded-full mx-auto mb-2 flex items-center justify-center text-red-600 text-4xl">👤</div>
          <p class="font-semibold">Nabila Maya</p>
          <p class="text-sm text-gray-500">+62895364095999</p>
        </div>
        <nav class="mt-4 flex-grow">
          <div class="flex items-center py-2 border-b cursor-pointer" onclick="toggleAccountMenu()">
            <span class="mr-2">👤</span>
            <div class="font-semibold text-dark-olive">Akun Saya</div>
            <span id="account-arrow" class="ml-auto text-black">▶</span>
          </div>
          <ul id="account-menu" class="py-2 space-y-2 border-b hidden">
            <li class="text-gray-700 hover:text-black cursor-pointer pl-6">Profil Saya</li>
            <li class="text-gray-700 hover:text-black cursor-pointer pl-6">Pengaturan akun</li>
            <li class="text-gray-700 hover:text-black cursor-pointer pl-6">Ganti password</li>
          </ul>
          <div class="flex items-center py-2 border-b cursor-pointer">
            <span class="mr-2">📋</span>
            <div class="font-semibold text-dark-olive">Riwayat Pesanan</div>
          </div>
          <div class="flex items-center py-2 border-b cursor-pointer">
            <span class="mr-2">🪙</span>
            <div class="font-semibold text-dark-olive">Riwayat Top Up</div>
          </div>
        </nav>
        <!-- Keluar button placed at the bottom -->
        <div class="mt-auto flex items-center text-red-600 cursor-pointer pt-4">
          <span class="mr-2">↩️</span>
          <span class="font-medium">Keluar</span>
        </div>
      </aside>
    </div>

    <!-- Main Content -->
    <main class="flex-1 bg-white rounded-lg border border-dark-olive min-h-[600px]">
      <!-- Tabs -->
      <div class="flex border-b">
        <button onclick="switchTab('account')" class="px-4 py-2 text-white font-semibold flex-1 text-center cursor-pointer bg-dark-olive">Akun Saya</button>
        <button class="px-4 py-2 font-semibold flex-1 text-center bg-lime-200">Riwayat Pesanan</button>
        <button onclick="switchTab('topup')" class="px-4 py-2 text-white font-semibold flex-1 text-center cursor-pointer bg-dark-olive">Riwayat Top Up</button>
      </div>

      <div class="p-4">
        <h2 class="text-center font-bold text-lg mb-4">Riwayat Pesanan</h2>

        <!-- Search Orders -->
        <div class="flex justify-center mb-6">
          <div class="relative w-full max-w-md">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <i class="fas fa-search text-gray-400"></i>
            </div>
            <input
              type="text"
              id="search-input"
              class="w-full pl-10 pr-4 py-2 border rounded-md shadow-sm"
              placeholder="Kamu bisa cari berdasarkan Kode Pesanan dan Nama Komputer"
            />
          </div>
        </div>

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
                <button class="flex items-center gap-1 border rounded-md px-2 py-1 text-xs">
                  <i class="fas fa-desktop"></i>
                  <span>Lihat Komputer Lainnya</span>
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
                    <img
                      src="/api/placeholder/150/150"
                      alt="PC Acer"
                      class="w-full h-full object-cover"
                    />
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
                <button class="flex items-center gap-1 border rounded-md px-2 py-1 text-xs">
                  <i class="fas fa-desktop"></i>
                  <span>Lihat Komputer Lainnya</span>
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
                    <img
                      src="/api/placeholder/150/150"
                      alt="PC Dell"
                      class="w-full h-full object-cover"
                    />
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

  <script>
    // Ketika dokumen sudah dimuat sepenuhnya
    document.addEventListener('DOMContentLoaded', function() {
      setupListeners();
    });

    function setupListeners() {
      // Setup pencarian
      const searchInput = document.getElementById('search-input');
      if (searchInput) {
        searchInput.addEventListener('input', function() {
          searchOrders(this.value);
        });
      }
    }

    function toggleAccountMenu() {
      const accountMenu = document.getElementById('account-menu');
      const accountArrow = document.getElementById('account-arrow');
      accountMenu.classList.toggle('hidden');
      // Ubah arah panah
      if (accountMenu.classList.contains('hidden')) {
        accountArrow.innerHTML = '▶';
      } else {
        accountArrow.innerHTML = '▼';
      }
    }

    function switchTab(tabName) {
      // Fungsi untuk mengganti tab yang aktif
      console.log(`Switching to ${tabName} tab`);
      // Implementasi untuk pindah halaman bisa ditambahkan di sini
    }

    function searchOrders(query) {
      // Implementasi pencarian pesanan yang ditingkatkan
      query = query.toLowerCase();
      const orderItems = document.querySelectorAll('.order-item');
      let hasResults = false;

      orderItems.forEach(order => {
        // Mencari di teks yang ditampilkan dan juga dari data-keywords
        const orderText = order.textContent.toLowerCase();
        const orderKeywords = order.getAttribute('data-keywords').toLowerCase();

        if (orderText.includes(query) || orderKeywords.includes(query)) {
          order.classList.remove('hidden');
          hasResults = true;
        } else {
          order.classList.add('hidden');
        }
      });

      // Tampilkan placeholder jika tidak ada hasil
      const emptyState = document.getElementById('empty-orders');
      if (hasResults) {
        emptyState.classList.add('hidden');
      } else {
        emptyState.classList.remove('hidden');
      }
    }
  </script>
</body>
</html>
