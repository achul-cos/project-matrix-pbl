<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Monitoring Komputer</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-20 bg-[#8F2D2D] flex flex-col items-center py-6 justify-between">
      <div class="space-y-6">
        <img src="/logo.png" class="w-10" alt="Logo" />
        <nav class="flex flex-col items-center space-y-6">
          <button class="text-white hover:text-[#B9EC74] transition">
            <svg class="w-6 h-6"><!-- icon --></svg>
          </button>
          <button class="text-white hover:text-[#B9EC74] transition">
            <svg class="w-6 h-6"><!-- icon --></svg>
          </button>
          <button class="bg-[#B9EC74] p-2 rounded-full shadow">
            <svg class="w-6 h-6 text-black"><!-- active icon --></svg>
          </button>
        </nav>
      </div>
      <img src="/profile.png" class="w-10 h-10 rounded-full" alt="User" />
    </aside>

    <!-- Main Content -->
    <main class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-[#556B2F]">Monitoring</span>
        <span class="text-[#8F2D2D]">Computer</span>
      </h1>

      <div class="bg-white p-6 rounded-2xl border-4 border-[#8F2D2D] shadow-xl">
        <!-- Search & Add -->
        <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
          <input type="text" placeholder="Search User"
            class="w-full md:w-1/2 px-4 py-2 rounded-xl border border-gray-300 bg-purple-50 focus:outline-none focus:ring-2 focus:ring-[#556B2F]" />
          <button class="bg-purple-50 border border-gray-300 px-4 py-2 rounded-xl text-sm flex items-center gap-2 hover:bg-purple-100 transition">
            <span class="text-xl font-bold">+</span> Add User
          </button>
        </div>

        <!-- Table -->
        <table class="min-w-full text-left border-separate border-spacing-y-3">
          <thead>
            <tr class="bg-gray-200 text-sm text-gray-700">
              <th class="p-3 rounded-l-lg">Nama</th>
              <th class="p-3">Ruangan</th>
              <th class="p-3 rounded-r-lg">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="/pc1.png" class="w-10 h-10 rounded" />
                <span>Lenovo A</span>
              </td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
                <span class="bg-red-200 text-red-800 px-3 py-1 text-xs font-semibold rounded-full">In Use</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="/pc2.png" class="w-10 h-10 rounded" />
                <span>Asus A</span>
              </td>
              <td class="p-3">Public Room</td>
              <td class="p-3">
                <span class="bg-orange-200 text-orange-800 px-3 py-1 text-xs font-semibold rounded-full">Maintenance</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="/pc3.png" class="w-10 h-10 rounded" />
                <span>Acer A</span>
              </td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Available</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="/pc4.png" class="w-10 h-10 rounded" />
                <span>Lenovo B</span>
              </td>
              <td class="p-3">Private Room</td>
              <td class="p-3">
                <span class="bg-gray-300 text-gray-700 px-3 py-1 text-xs font-semibold rounded-full">Unavailable</span>
              </td>
            </tr>
            <tr class="bg-gray-100 rounded-xl">
              <td class="p-3 flex items-center space-x-3">
                <img src="/pc5.png" class="w-10 h-10 rounded" />
                <span>Asus A</span>
              </td>
              <td class="p-3">Public Room</td>
              <td class="p-3">
                <span class="bg-[#B9EC74] text-[#556B2F] px-3 py-1 text-xs font-semibold rounded-full">Available</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
