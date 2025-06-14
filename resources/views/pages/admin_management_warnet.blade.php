@extends('layout.dashboard')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

<div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6 animate__animated animate__fadeIn">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Sistem Manajemen Warnet</h1>
        
        <!-- Status Warnet -->
        <div class="mb-8 p-4 border rounded-lg bg-gray-50">
            <h2 class="text-xl font-semibold mb-4">Status Warnet</h2>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">Status saat ini:</p>
                    <p id="warnet-status-text" class="text-lg font-semibold text-green-600">Sedang Buka</p>
                    <p id="warnet-hours" class="text-sm text-gray-500 mt-1">Jam operasional: 08:00 - 22:00</p>
                </div>
                <button id="toggle-warnet" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Tutup Warnet
                </button>
            </div>
        </div>
        
        <!-- Pengaturan Website -->
        <div class="p-4 border rounded-lg bg-gray-50">
            <h2 class="text-xl font-semibold mb-4">Pengaturan Website</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Status Website:</p>
                        <p id="website-status-text" class="text-lg font-semibold text-green-600">Online</p>
                        <p id="website-status-desc" class="text-sm text-gray-500 mt-1">Pengunjung dapat mengakses website</p>
                    </div>
                    <button id="toggle-website" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition" disabled>
                        Matikan Website
                    </button>
                </div>
                
                <!-- Pesan Maintenance -->
                <div id="maintenance-section" class="hidden mt-4 space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Pesan Maintenance</label>
                        <textarea id="maintenance-message" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Contoh: Website sedang dalam maintenance hingga pukul 14:00"></textarea>
                    </div>
                    <div class="flex space-x-3">
                        <button id="save-maintenance" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Simpan & Aktifkan 
                        </button>
                        <button id="cancel-maintenance" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Log Status -->
        <div class="mt-8 p-4 border rounded-lg bg-gray-50">
            <h2 class="text-xl font-semibold mb-4">Riwayat Perubahan Status</h2>
            <ul id="status-log" class="space-y-2">
                <li class="text-sm text-gray-600">Sistem dimulai - <span class="font-medium">Warnet: Buka, Website: Online</span> - 10:00:42</li>
            </ul>
        </div>
    </div>


{{-- manajemen warnet --}}
<div class="flex">
    <!-- Main Content -->
    <section class="flex-1 px-8 py-10">
      <h1 class="text-3xl font-bold mb-6">
        <span class="text-slate-900"></span>
      </h1>

      <div class="bg-white p-6 rounded-2xl border-4 border-[#565885] shadow-xl">
        <!-- Tombol Aksi -->
        <div class="flex space-x-3 mb-7">
            <button id="checkAll" class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Semua Tersedia
            </button>
            <button id="uncheckAll" class="px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                Tidak Tersedia
            </button>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header Tabel -->
            <div class="grid grid-cols-4 bg-gray-100 p-4 border-b">
                <div class="font-semibold text-gray-700">Lantai 1</div>
                <div class="font-semibold text-gray-700">Lantai 2</div>
                <div class="font-semibold text-gray-700">Lantai 3</div>
                <div class="font-semibold text-gray-700">Lantai 4</div>
            </div>
            
            <!-- Baris Data -->
            <div class="grid grid-cols-4 p-4 border-b">
                <!-- Kolom L1 -->
                <div class="flex items-center">
                    <input type="checkbox" id="A1" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A1" class="text-gray-800">A1</label>
                </div>
                <!-- Kolom L2 -->
                <div class="flex items-center">
                    <input type="checkbox" id="B1" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B1" class="text-gray-800">B1</label>
                </div>
                <!-- Kolom L3 -->
                <div class="flex items-center">
                    <input type="checkbox" id="C1" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C1" class="text-gray-800">C1</label>
                </div>
                <!-- Kolom L4 -->
                <div class="flex items-center">
                    <input type="checkbox" id="D1" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D1" class="text-gray-800">D1</label>
                </div>
            </div>
            
            <!-- Baris Data 2 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A2" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A2" class="text-gray-800">A2</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B2" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B2" class="text-gray-800">B2</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C2" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C2" class="text-gray-800">C2</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D2" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D2" class="text-gray-800">D2</label>
                </div>
            </div>
            
            <!-- Baris Data 3 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A3" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A3" class="text-gray-800">A3</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B3" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B3" class="text-gray-800">B3</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C3" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C3" class="text-gray-800">C3</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D3" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D3" class="text-gray-800">D3</label>
                </div>
            </div>
            
            <!-- Baris Data 4 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A4" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A4" class="text-gray-800">A4</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B4" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B4" class="text-gray-800">B4</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C4" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C4" class="text-gray-800">C4</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D4" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D4" class="text-gray-800">D4</label>
                </div>
            </div>
            
            <!-- Baris Data 5 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A5" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A5" class="text-gray-800">A5</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B5" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B5" class="text-gray-800">B5</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C5" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C5" class="text-gray-800">C5</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D5" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D5" class="text-gray-800">D5</label>
                </div>
            </div>
            
            <!-- Baris Data 6 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A6" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A6" class="text-gray-800">A6</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B6" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B6" class="text-gray-800">B6</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C6" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C6" class="text-gray-800">C6</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D6" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D6" class="text-gray-800">D6</label>
                </div>
            </div>
            
            <!-- Baris Data 7 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A7" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A7" class="text-gray-800">A7</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B7" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B7" class="text-gray-800">B7</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C7" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C7" class="text-gray-800">C7</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D7" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D7" class="text-gray-800">D7</label>
                </div>
            </div>
            
            <!-- Baris Data 8 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A8" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A8" class="text-gray-800">A8</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B8" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B8" class="text-gray-800">B8</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C8" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C8" class="text-gray-800">C8</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D8" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D8" class="text-gray-800">D8</label>
                </div>
            </div>
            
            <!-- Baris Data 9 -->
            <div class="grid grid-cols-4 p-4 border-b">
                <div class="flex items-center">
                    <input type="checkbox" id="A9" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A9" class="text-gray-800">A9</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B9" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B9" class="text-gray-800">B9</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C9" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C9" class="text-gray-800">C9</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D9" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D9" class="text-gray-800">D9</label>
                </div>
            </div>
            
            <!-- Baris Data 10 -->
            <div class="grid grid-cols-4 p-4">
                <div class="flex items-center">
                    <input type="checkbox" id="A10" class="h-5 w-5 text-blue-600 mr-2">
                    <label for="A10" class="text-gray-800">A10</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="B10" class="h-5 w-5 text-red-600 mr-2">
                    <label for="B10" class="text-gray-800">B10</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="C10" class="h-5 w-5 text-yellow-600 mr-2">
                    <label for="C10" class="text-gray-800">C10</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="D10" class="h-5 w-5 text-green-600 mr-2">
                    <label for="D10" class="text-gray-800">D10</label>
                </div>
            </div>
        </div>
        
        <div class="mt-6 flex justify-end">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Simpan Perubahan
            </button>
        </div>
    </div>


    <script>
        // Status awal
        let warnetStatus = 'open';
        let websiteStatus = 'online';
        let maintenanceMessage = '';
        
        // Elemen DOM
        const warnetStatusText = document.getElementById('warnet-status-text');
        const websiteStatusText = document.getElementById('website-status-text');
        const websiteStatusDesc = document.getElementById('website-status-desc');
        const toggleWarnetBtn = document.getElementById('toggle-warnet');
        const toggleWebsiteBtn = document.getElementById('toggle-website');
        const maintenanceSection = document.getElementById('maintenance-section');
        const statusLog = document.getElementById('status-log');
        
        // Update status warnet
        function updateWarnetStatus(newStatus) {
            warnetStatus = newStatus;
            
            if (newStatus === 'open') {
                warnetStatusText.textContent = 'Sedang Buka';
                warnetStatusText.className = 'text-lg font-medium text-green-600 animate__animated animate__pulse';
                toggleWarnetBtn.textContent = 'Tutup Warnet';
                toggleWarnetBtn.className = 'px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition';
                
                // Jika warnet dibuka, website harus online
                if (websiteStatus === 'maintenance') {
                    updateWebsiteStatus('online');
                }
                toggleWebsiteBtn.disabled = false;
            } else {
                warnetStatusText.textContent = 'Sedang Tutup';
                warnetStatusText.className = 'text-lg font-semibold text-red-600 animate__animated animate__pulse';
                toggleWarnetBtn.textContent = 'Buka Warnet';
                toggleWarnetBtn.className = 'px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition';
                
                // Jika warnet ditutup, website harus maintenance
                updateWebsiteStatus('maintenance');
                toggleWebsiteBtn.disabled = true;
            }
            
            addLogEntry(`Warnet diubah ke: ${newStatus === 'open' ? 'Buka' : 'Tutup'}`);
        }
        
        // Update status website
        function updateWebsiteStatus(newStatus) {
            websiteStatus = newStatus;
            
            if (newStatus === 'online') {
                websiteStatusText.textContent = 'Online';
                websiteStatusText.className = 'text-lg font-medium text-green-600 animate__animated animate__pulse';
                websiteStatusDesc.textContent = 'Pengunjung dapat mengakses website';
                toggleWebsiteBtn.textContent = 'Matikan Website';
                toggleWebsiteBtn.className = 'px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition';
                maintenanceSection.classList.add('hidden');
            } else {
                websiteStatusText.textContent = 'Offline';
                websiteStatusText.className = 'text-lg font-semibold text-red-600 animate__animated animate__pulse';
                websiteStatusDesc.textContent = 'Pengunjung tidak dapat mengakses website';
                toggleWebsiteBtn.textContent = 'Hidupkan Website';
                toggleWebsiteBtn.className = 'px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition';
            }
            
            addLogEntry(`Website diubah ke: ${newStatus === 'online' ? 'Online' : 'Maintenance'}`);
        }
        
        // Tambahkan log
        function addLogEntry(action) {
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            const logEntry = document.createElement('li');
            logEntry.className = 'text-sm text-gray-600';
            logEntry.textContent = `${action} - ${timeString}`;
            statusLog.prepend(logEntry);
        }
        
        // Event listeners
        toggleWarnetBtn.addEventListener('click', function() {
            const newStatus = warnetStatus === 'open' ? 'closed' : 'open';
            
            if (newStatus === 'closed') {
                if (confirm('Apakah yakin ingin menutup warnet? website akan diubah ke mode maintenance.')) {
                    updateWarnetStatus(newStatus);
                }
            } else {
                updateWarnetStatus(newStatus);
            }
        });
        
        toggleWebsiteBtn.addEventListener('click', function() {
            if (websiteStatus === 'online') {
                maintenanceSection.classList.remove('hidden');
            } else {
                updateWebsiteStatus('online');
            }
        });
        
        document.getElementById('save-maintenance').addEventListener('click', function() {
            maintenanceMessage = document.getElementById('maintenance-message').value;
            if (!maintenanceMessage.trim()) {
                alert('Silakan isi pesan maintenance terlebih dahulu');
                return;
            }
            updateWebsiteStatus('maintenance');
            maintenanceSection.classList.add('hidden');
            addLogEntry('Pesan maintenance diperbarui');
        });
        
        document.getElementById('cancel-maintenance').addEventListener('click', function() {
            maintenanceSection.classList.add('hidden');
        });
        
        // Inisialisasi
        addLogEntry('Sistem dimulai - Warnet: Buka, Website: Online');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol Centang Semua
            document.getElementById('checkAll').addEventListener('click', function() {
                const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
                allCheckboxes.forEach(checkbox => {
                    checkbox.checked = true;
                });
            });
            
            // Tombol Batal Semua Centang
            document.getElementById('uncheckAll').addEventListener('click', function() {
                const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');
                allCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
            });
        });
    </script>


@endsection