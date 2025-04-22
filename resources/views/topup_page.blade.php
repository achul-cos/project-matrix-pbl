<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Top Up Token | Matrix</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'olive': '#556B2F',
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">
  <!-- Navbar -->
  <nav class="bg-olive shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-4">
        <img src="https://via.placeholder.com/40x40?text=Logo" class="h-10" alt="Logo Matrix">
        <span class="text-white text-xl font-bold">Matrix</span>
      </div>
      <div class="w-1/2">
        <input type="text" placeholder="Cari..." class="w-full px-4 py-2 rounded-full text-sm text-gray-800">
      </div>
      <div class="text-white text-sm">Nabila Maya</div>
    </div>
  </nav>

  <!-- Notification -->
  <div id="notification" class="fixed top-4 right-4 bg-white shadow-lg rounded-lg p-4 hidden z-50 transform transition-transform duration-300 translate-y-0">
    <div class="flex items-center">
      <div class="bg-olive text-white p-2 rounded-full mr-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
      </div>
      <div>
        <p class="font-bold">Melanjutkan ke Pembayaran</p>
        <p class="text-sm text-gray-600">Anda akan diarahkan ke halaman pembayaran</p>
      </div>
      <button onclick="closeNotification()" class="ml-4 text-gray-400 hover:text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  </div>

  <!-- Main Section -->
  <main class="py-12 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-lg">
      <h1 class="text-2xl font-bold text-center text-olive mb-6">Top Up Token</h1>
      <!-- Token Input -->
      <div class="mb-6">
        <label for="token" class="block mb-2 font-semibold">Jumlah Token</label>
        <input type="text" id="token" placeholder="Masukkan jumlah token" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-olive" />
      </div>
      <!-- Quick Select Token Buttons -->
      <div class="grid grid-cols-3 gap-4 mb-8">
        <button class="tokenButton bg-olive hover:bg-olive/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="2">2 Token</button>
        <button class="tokenButton bg-olive hover:bg-olive/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="4">4 Token</button>
        <button class="tokenButton bg-olive hover:bg-olive/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="6">6 Token</button>
        <button class="tokenButton bg-olive hover:bg-olive/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="8">8 Token</button>
        <button class="tokenButton bg-olive hover:bg-olive/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="10">10 Token</button>
        <button class="tokenButton bg-olive hover:bg-olive/80 text-white py-3 rounded-lg font-semibold transition-all active:scale-95" data-value="12">12 Token</button>
      </div>
      <button id="paymentButton" class="w-full bg-black text-white py-3 rounded-lg font-bold hover:bg-gray-800 transition duration-200 active:bg-gray-900 active:scale-[0.99]">
        Lanjutkan Pembayaran
      </button>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-gray-100 py-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-6">
      <div>
        <img src="https://via.placeholder.com/100x40?text=Matrix" alt="Matrix Logo" class="mb-3">
        <div class="flex space-x-3 text-lg">
          <a href="#">📘</a>
          <a href="#">📷</a>
          <a href="#">🐦</a>
        </div>
        <p class="text-sm mt-3">&copy; Matrix 2025</p>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Jelajahi Kami</h4>
        <ul class="space-y-1 text-sm">
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Kontak</a></li>
          <li><a href="#">Bantuan</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Hubungi Kami</h4>
        <ul class="space-y-1 text-sm">
          <li>📞 +62 812345667</li>
          <li>📍 Polibatam</li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-2">Mitra Kami</h4>
        <ul class="space-y-1 text-sm">
          <li>ASUS</li>
          <li>ACER</li>
          <li>LENOVO</li>
          <li>NVIDIA</li>
          <li>INTEL</li>
          <li>AMD</li>
          <li>POLIBATAM</li>
        </ul>
      </div>
    </div>
  </footer>

  <script>
    // Auto-fill token input when clicking quick selection buttons
    const tokenButtons = document.querySelectorAll('.tokenButton');
    const tokenInput = document.getElementById('token');

    tokenButtons.forEach(button => {
      button.addEventListener('click', function() {
        const tokenValue = this.getAttribute('data-value');
        tokenInput.value = tokenValue;

        // Visual feedback - highlight active button
        tokenButtons.forEach(btn => {
          btn.classList.remove('ring-2', 'ring-white', 'ring-opacity-50');
        });
        this.classList.add('ring-2', 'ring-white', 'ring-opacity-50');
      });
    });

    document.getElementById('paymentButton').addEventListener('click', function() {
      // Show notification
      const notification = document.getElementById('notification');
      notification.classList.remove('hidden');
      notification.classList.add('translate-y-0');
      notification.classList.remove('translate-y-full');

      // Hide notification after 5 seconds
      setTimeout(function() {
        closeNotification();
      }, 5000);
    });

    function closeNotification() {
      const notification = document.getElementById('notification');
      notification.classList.add('translate-y-full');
      setTimeout(function() {
        notification.classList.add('hidden');
      }, 300);
    }
  </script>
</body>
</html>
