<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix - Halaman Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
<nav class="bg-gradient-to-br from-[#3b4e20] via-[#556B2F] to-[#a3b67e] text-white p-4 px-6 md:px-20">
  <div class="container mx-auto flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center space-x-4">
          <img src="logo.png" alt="Logo Matrix" class="h-6">
          <h1 class="font-bold text-lg hidden md:block">MATRIX</h1>
      </div>

      <!-- nav links -->
      <div class="hidden md:flex items-center space-x-6">
          <a href="#" class="hover:text-green-900 font-bold">Home</a>
          <a href="#" class="hover:text-green-900 font-bold">Spesifikasi</a>
          <a href="#" class="hover:text-green-900 font-bold">Rekomendasi</a>
          <a href="#" class="hover:text-green-900 font-bold">Tentang</a>

          <!-- search bar -->
          <div class="relative">
              <input type="text" placeholder="cari apa nich?" class="px-3 py-1 rounded-full text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500">
              <svg class="absolute right-2 top-1.5 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                   viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 18a7 7 0 1 1 0-14 7 7 0 0 1 0 14z" />
              </svg>
          </div>
      </div>

      <!-- right icons -->
      <div class="flex items-center space-x-4">
          <!-- mobile menu button -->
          <button id="menuToggle" class="md:hidden p-2 rounded-full bg-white text-green-900">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
          </button>

          <!-- profile & add -->
          <button class="p-1 rounded-full bg-gray-800 text-white hidden md:inline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd"/>
              </svg>
          </button>
          <button class="p-1 rounded-full bg-white text-gray-800 hidden md:inline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4"/>
              </svg>
          </button>
      </div>
  </div>

  <!-- Mobile Menu Dropdown -->
  <div id="mobileMenu" class="md:hidden hidden flex-col px-6 pt-4 pb-2 space-y-2 bg-green-100 text-green-900">
      <a href="#" class="block font-semibold hover:text-green-600">Home</a>
      <a href="#" class="block font-semibold hover:text-green-600">Spesifikasi</a>
      <a href="#" class="block font-semibold hover:text-green-600">Rekomendasi</a>
      <a href="#" class="block font-semibold hover:text-green-600">Tentang</a>
      <div class="relative">
          <input type="text" placeholder="Cari..." class="w-full px-3 py-1 rounded-full text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500">
          <svg class="absolute right-3 top-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35M11 18a7 7 0 1 1 0-14 7 7 0 0 1 0 14z"/>
          </svg>
      </div>
  </div>
</nav>



<body class="bg-gray-100">
    <div class="max-w-md mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-[#556B2F] text-white p-4">
            <h1 class="text-xl font-bold">PEMBAYARAN</h1>
        </div>
        
        <!-- Payment Summary -->
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">RINGKASAN PEMBAYARAN</h2>
            
            <div class="space-y-4 mb-6">
                <div class="flex justify-between">
                    <span class="text-gray-600">JUMLAH TOKEN</span>
                    <span class="font-medium">50 TOKEN</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">HARGA</span>
                    <span class="font-medium">RP. 50.000</span>
                </div>
            </div>
            
            <!-- Payment Methods -->
            <div class="mb-6">
                <h3 class="font-medium text-gray-700 mb-3">E-Wallet</h3>
                <div class="space-y-2 pl-4 mb-4">
                    <div class="flex items-center">
                        <input type="radio" id="dana" name="payment" class="mr-2">
                        <label for="dana">DANA</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="ovo" name="payment" class="mr-2">
                        <label for="ovo">OVO</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="gopay" name="payment" class="mr-2">
                        <label for="gopay">GoPay</label>
                    </div>
                </div>
                
                <h3 class="font-medium text-gray-700 mb-3">Transfer Bank</h3>
                <div class="space-y-2 pl-4 mb-4">
                    <div class="flex items-center">
                        <input type="radio" id="bank" name="payment" class="mr-2">
                        <label for="bank">BCA, BNI, Mandiri, dll.</label>
                    </div>
                </div>
                
                <h3 class="font-medium text-gray-700 mb-3">QRIS</h3>
                <div class="space-y-2 pl-4 mb-4">
                    <div class="flex items-center">
                        <input type="radio" id="qris" name="payment" class="mr-2">
                        <label for="qris">Virtual Account</label>
                    </div>
                </div>
            </div>
            
            <!-- Total -->
            <div class="border-t border-gray-200 pt-4 mb-6">
                <div class="flex justify-between font-semibold text-lg">
                    <span>TOTAL</span>
                    <span>RP. 50.000</span>
                </div>
            </div>
            
            <!-- Continue Button -->
            <button class="w-full bg-[#556B2F] hover:bg-green-950 text-white py-3 px-4 rounded-lg font-medium transition duration-200">
                LANJUTKAN PEMBAYARAN
            </button>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-gray-200 py-12 px-20 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Column 1 - About -->
                <div>
                    <img src="logo.png" alt="Logo Matrix" class="h-8 mb-4">
                    <p class="text-sm text-gray-600">Website untuk praktis, memudahkan jadi asik</p>
                    <p class="text-xs text-gray-500 mt-2">Matrix 2024</p>
                </div>
                
                <!-- Column 2 - Quick Links -->
                <div>
                    <h3 class="font-bold mb-4">Navigasi Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-green-500">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-500">Kontak</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 - Social Media -->
                <div>
                    <h3 class="font-bold mb-4">Ikuti Kami</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12.07C22 6.55 17.67 2 12 2S2 6.55 2 12.07C2 17.08 5.33 21.27 10 22v-7h-2v-3h2V9.5c0-2.5 1.5-4 4-4h2v3h-1c-1 0-1 .5-1 1v1.5h2l-.5 3H14v7c4.67-.73 8-4.92 8-9.93z"/>
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-green-500">Facebook</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-green-500">Twitter</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.058 1.805.249 2.227.419.562.217.96.477 1.382.896.419.42.679.819.896 1.381.17.422.36 1.057.419 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.058 1.17-.249 1.805-.419 2.227-.217.562-.477.96-.896 1.382-.42.419-.819.679-1.381.896-.422.17-1.057.36-2.227.419-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.058-1.805-.249-2.227-.419-.562-.217-.96-.477-1.382-.896-.419-.42-.679-.819-.896-1.381-.17-.422-.36-1.057-.419-2.227-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.058-1.17.249-1.805.419-2.227.217-.562.477-.96.896-1.382.42-.419.819-.679 1.381-.896.422-.17 1.057-.36 2.227-.419 1.266-.058 1.646-.07 4.85-.07zm0 2.16c-3.064 0-3.428.013-4.684.069-.99.045-1.533.196-1.893.346-.476.186-.816.406-1.172.762-.356.356-.576.696-.762 1.172-.15.36-.3.903-.345 1.893-.056 1.256-.07 1.62-.07 4.684s.014 3.428.07 4.684c.045.99.195 1.533.345 1.893.186.476.406.816.762 1.172.356.356.696.576 1.172.762.36.15.903.3 1.893.345 1.256.056 1.62.07 4.684.07s3.428-.014 4.684-.07c.99-.045 1.533-.195 1.893-.345.476-.186.816-.406 1.172-.762.356-.356.576-.696.762-1.172.15-.36.3-.903.345-1.893.056-1.256.07-1.62.07-4.684s-.014-3.428-.07-4.684c-.045-.99-.195-1.533-.345-1.893-.186-.476-.406-.816-.762-1.172-.356-.356-.696-.576-1.172-.762-.36-.15-.903-.3-1.893-.345-1.256-.056-1.62-.07-4.684-.07zm0 3.678a6 6 0 1 1 0 12 6 6 0 0 1 0-12zm0 9.87a3.87 3.87 0 1 0 0-7.74 3.87 3.87 0 0 0 0 7.74zm7.095-10.87a1.4 1.4 0 1 1-2.8 0 1.4 1.4 0 0 1 2.8 0z"/>
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-green-500">Instagram</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-green-500">Youtube</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Column 4 - Apps -->
                <div>
                    <h3 class="font-bold mb-4">Mitra Kami</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-green-500">ASUS</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-500">LENOVO</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-500">ACER</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-500">INTEL</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-500">POLIBATAM</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="bg-gradient-to-br from-[#3b4e20] via-[#556B2F] to-[#a3b67e] text-white text-center py-4 text-xs">
        © 2024 MATRIX - All Rights Reserved
    </div>

    <!-- JS buat toggle mobile menu -->
<script>
  const toggleBtn = document.getElementById("menuToggle");
  const menu = document.getElementById("mobileMenu");

  toggleBtn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
  });
</script>
</body>
</html>