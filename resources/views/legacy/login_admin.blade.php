<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gradient-to-br from-green-800 to-pink-500 text-white p-4 px-20">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="logo.png" alt="Logo Matrix" class="h-6">
                <h1 class="font-bold text-lg hidden md:block">MATRIX</h1>
            </div>
            <!-- //bg-gradient-to-br from-red-800 to-pink-600 ini buat gradasi gess -->
            
            <div class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-gray-200">Home</a>
                <a href="#" class="hover:text-gray-200">Spesifikasi</a>
                <a href="#" class="hover:text-gray-200">Rekomendasi</a>
                <a href="#" class="hover:text-gray-200">Tentang</a>
            </div>
            
            <div class="flex items-center space-x-4">
                <button class="p-1 rounded-full bg-gray-800 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button class="p-1 rounded-full bg-white text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Login Card -->
    <div class="container mx-auto px-4 py-9">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Left side - Login Form -->
                <div class="w-full md:w-1/2 p-8">
                    <h2 class="text-2xl font-bold mb-8 text-center">MASUK</h2>
                    
                    <form>
                        <div class="mb-4">
                            <input type="text" placeholder="Masukkan username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                        </div>
                        <div class="mb-4">
                            <input type="password" placeholder="Masukkan password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                        </div>
                        <div class="mb-6 flex items-center">
                            <input type="checkbox" id="ingat" class="mr-2">
                            <label for="ingat" class="text-sm">Ingat saya</label>
                        </div>
                        <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-800 transition duration-300">MASUK</button>
                        <div class="text-center mt-4">
                            <a href="#" class="text-sm text-red-500 hover:underline">Belum ada pengguna baru?</a>
                        </div>
                    </form>
                </div>
                
                <!-- Right side - Welcome Message -->
                <div class="w-full md:w-1/2 bg-gradient-to-br bg-pink-600 p-8 text-white flex flex-col justify-center items-center">
                    <img src="logo.png" alt="Logo Matrix" class="h-16 mb-8">
                    <h2 class="text-xl font-bold mb-2">Selamat Datang di Matrix</h2>
                    <p class="text-center">Website untuk praktis, memudahkan jadi asik</p>
                </div>
            </div>
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
                        <li><a href="#" class="text-gray-600 hover:text-red-500">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-red-500">Kontak</a></li>
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
                            <a href="#" class="text-gray-600 hover:text-red-500">Facebook</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-red-500">Twitter</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.058 1.805.249 2.227.419.562.217.96.477 1.382.896.419.42.679.819.896 1.381.17.422.36 1.057.419 2.227.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.058 1.17-.249 1.805-.419 2.227-.217.562-.477.96-.896 1.382-.42.419-.819.679-1.381.896-.422.17-1.057.36-2.227.419-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.058-1.805-.249-2.227-.419-.562-.217-.96-.477-1.382-.896-.419-.42-.679-.819-.896-1.381-.17-.422-.36-1.057-.419-2.227-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.058-1.17.249-1.805.419-2.227.217-.562.477-.96.896-1.382.42-.419.819-.679 1.381-.896.422-.17 1.057-.36 2.227-.419 1.266-.058 1.646-.07 4.85-.07zm0 2.16c-3.064 0-3.428.013-4.684.069-.99.045-1.533.196-1.893.346-.476.186-.816.406-1.172.762-.356.356-.576.696-.762 1.172-.15.36-.3.903-.345 1.893-.056 1.256-.07 1.62-.07 4.684s.014 3.428.07 4.684c.045.99.195 1.533.345 1.893.186.476.406.816.762 1.172.356.356.696.576 1.172.762.36.15.903.3 1.893.345 1.256.056 1.62.07 4.684.07s3.428-.014 4.684-.07c.99-.045 1.533-.195 1.893-.345.476-.186.816-.406 1.172-.762.356-.356.576-.696.762-1.172.15-.36.3-.903.345-1.893.056-1.256.07-1.62.07-4.684s-.014-3.428-.07-4.684c-.045-.99-.195-1.533-.345-1.893-.186-.476-.406-.816-.762-1.172-.356-.356-.696-.576-1.172-.762-.36-.15-.903-.3-1.893-.345-1.256-.056-1.62-.07-4.684-.07zm0 3.678a6 6 0 1 1 0 12 6 6 0 0 1 0-12zm0 9.87a3.87 3.87 0 1 0 0-7.74 3.87 3.87 0 0 0 0 7.74zm7.095-10.87a1.4 1.4 0 1 1-2.8 0 1.4 1.4 0 0 1 2.8 0z"/>
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-red-500">Instagram</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-red-500">Youtube</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Column 4 - Apps -->
                <div>
                    <h3 class="font-bold mb-4">Mitra Kami</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-red-500">ASUS</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-red-500">LENOVO</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-red-500">ACER</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-red-500">INTEL</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-red-500">POLIBATAM</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="bg-gradient-to-br from-green-800 to-pink-600 text-white text-center py-4 text-xs">
        © 2024 MATRIX - All Rights Reserved
    </div>
</body>
</html>