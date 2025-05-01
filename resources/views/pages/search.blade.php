@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

{{-- Tempat Kode Front End Halaman Search --}}

<!-- drawer init and toggle -->
<button class="" type="button" data-drawer-target="drawer-disabled-backdrop" data-drawer-show="drawer-disabled-backdrop" data-drawer-backdrop="false" aria-controls="drawer-disabled-backdrop">
   <div id="toast-simple" class="z-40 py-2 px-8 fixed bottom-5 left-5 flex items-center max-w-xs space-x-4 rtl:space-x-reverse text-white bg-lime-900 divide-x rtl:divide-x-reverse rounded-full shadow-sm" role="alert">
       <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
           <path d="M1 5h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 1 0 0-2H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2Zm18 4h-1.424a3.228 3.228 0 0 0-6.152 0H1a1 1 0 1 0 0 2h10.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Zm0 6H8.576a3.228 3.228 0 0 0-6.152 0H1a1 1 0 0 0 0 2h1.424a3.228 3.228 0 0 0 6.152 0H19a1 1 0 0 0 0-2Z"/>
       </svg>
       <div class="text-lg font-black">Filter</div>
   </div>
</button>
 
<!-- drawer component -->
<div id="drawer-disabled-backdrop" class="fixed shadow-2xl top-0 left-0 z-100 min-sm:pb-20 min-sm:mt-20 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-disabled-backdrop-label">
   <h5 id="drawer-disabled-backdrop-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Filter</h5>
   <button type="button" data-drawer-hide="drawer-disabled-backdrop" aria-controls="drawer-disabled-backdrop" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
   </button>
   <div class="py-4 overflow-y-auto">
      <ul class="space-y-2 font-medium ml-1">
         <li>
           <!-- Radio Processor / CPU -->
           <div class="text-white py-1 px-2 bg-lime-700 inline-flex mb-5 rounded-md ring-2 ring-lime-700 border-4 border-white">
              <h3 class="text-lg font-bold">CPU</h3>
           </div>
           <ul class="grid w-full gap-4 md:grid-cols-2">
              <li>
                 <input type="radio" id="cpu-intel" name="cpu" value="cpu-intel" class="hidden peer" required />
                 <label for="cpu-intel" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">                           
                    <div class="block">
                          <div class="w-full text-lg font-semibold">Intel</div>
                          <div class="w-full text-xs">Cocok Editing & Design</div>
                    </div>
                 </label>
              </li>
              <li>
                 <input type="radio" id="cpu-amd" name="cpu" value="cpu-amd" class="hidden peer">
                 <label for="cpu-amd" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-600 hover:bg-gray-100">
                    <div class="block">
                          <div class="w-full text-lg font-semibold">AMD</div>
                          <div class="w-full text-xs">Cocok Untuk Multitasking</div>
                    </div>
                 </label>
              </li>
           </ul>
         </li>

         <li class="mt-4">
           <!-- Radio Graphics Card / GPU -->
           <div class="text-white py-1 px-2 bg-red-700 inline-flex mb-5 rounded-md ring-2 ring-red-700 border-4 border-white">
              <h3 class="text-lg font-bold">GPU</h3>
           </div>
           <ul class="grid w-full gap-4 md:grid-cols-2">
              <li>
                 <input type="radio" id="gpu-gtx" name="gpu" value="gpu-gtx" class="hidden peer" required />
                 <label for="gpu-gtx" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-gray-600 peer-checked:text-gray-600 hover:text-gray-600 hover:bg-gray-100">                           
                    <div class="block">
                          <div class="w-full text-lg font-semibold">GTX</div>
                          <div class="w-full text-xs">Grafis & Performa Standar</div>
                    </div>
                 </label>
              </li>
              <li>
                 <input type="radio" id="gpu-rtx" name="gpu" value="gpu-rtx" class="hidden peer">
                 <label for="gpu-rtx" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100">
                    <div class="block">
                          <div class="w-full text-lg font-semibold">RTX</div>
                          <div class="w-full text-xs">Grafis & Performa Terbaik</div>
                    </div>
                 </label>
              </li>
           </ul>
         </li>

         <li class="mt-4">
            <!-- Radio Room / Room -->
            <div class="text-white py-1 px-2 bg-yellow-700 inline-flex mb-5 rounded-md ring-2 ring-yellow-700 border-4 border-white">
               <h3 class="text-lg font-bold">Room</h3>
            </div>
            <ul class="grid w-full gap-4 md:grid-cols-2">
               <li>
                  <input type="radio" id="room-public" name="room" value="room-public" class="hidden peer" required />
                  <label for="room-public" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-slate-600 peer-checked:text-slate-600 hover:text-gray-600 hover:bg-gray-100">                           
                     <div class="block">
                           <div class="w-full text-lg font-semibold">Public</div>
                           <div class="w-full text-xs">Cocok Untuk Tim dan Terbuka</div>
                     </div>
                  </label>
               </li>
               <li>
                  <input type="radio" id="room-private" name="room" value="room-private" class="hidden peer">
                  <label for="room-private" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-orange-600 peer-checked:text-orange-600 hover:text-gray-600 hover:bg-gray-100">
                     <div class="block">
                           <div class="w-full text-lg font-semibold">Private</div>
                           <div class="w-full text-xs">Cocok Untuk Privasi</div>
                     </div>
                  </label>
               </li>
            </ul>
         </li>

         <li class="mt-4">
           <!-- Range RAM / RAM -->
           <div class="text-white py-1 px-2 bg-blue-700 inline-flex mb-5 rounded-md ring-2 ring-blue-700 border-4 border-white">
              <h3 class="text-lg font-bold">RAM</h3>
           </div>
           <div class="relative mb-6">
              <label for="ram-range" class="sr-only">RAM range</label>
              <input id="ram-range" type="range" value="0" min="0" max="16" step="8" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">All</span>
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/2 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">8 GB</span>
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">16 GB</span>
          </div>
         </li>

         <li class="mt-12">
           <!-- Range Token / Token -->
           <div class="text-white py-1 px-2 bg-slate-500 inline-flex mb-5 rounded-md ring-2 ring-slate-500 border-4 border-white">
              <h3 class="text-lg font-bold">Token</h3>
           </div>
           <div class="relative mb-6">
              <label for="token-range" class="sr-only">Token range</label>
              <input id="token-range" type="range" value="1" min="1" max="6" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">All</span>
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/5 -translate-x-1/4 rtl:translate-x-1/4 -bottom-6">2</span>
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/5 -translate-x-1/4 rtl:translate-x-1/4 -bottom-6">3</span>
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-3/5 -translate-x-1/4 rtl:translate-x-1/4 -bottom-6">4</span>
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-4/5 -translate-x-1/4 rtl:translate-x-1/4 -bottom-6">5</span>
              <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">6</span>
          </div>
         </li>

         <!-- Reset and Apply Button -->
         <li class="mt-14">
           <div class="flex justify-between gap-2">
             <button id="reset-filters" class="px-4 py-2 w-full bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 transition">Reset</button>
             <button id="apply-filters" class="px-4 py-2 w-full bg-lime-700 rounded-lg text-white hover:bg-lime-800 transition">Terapkan</button>
           </div>
         </li>
      </ul>
   </div>
</div>

 <section class="p-4 pt-8 pb-14 content-center">
    <p class="text-center text-xl max-md:text-lg">Hasil Pencarian "<span class="font-black">{{ request('search') ?? "error"}}</span>"</p>
    <p class="text-center text-lg max-md:text-md mt-2 text-gray-700 font-light italic">Filter Pencarian "<span class="font-bold">Semua Produk</span>"</p>
</section>
<div class="gap-4 grid grid-cols-12 w-(screen)">
    <div class="col-span-2"><hr class="w-auto h-1.75 bg-lime-600 border-0"></div>
    <div class="col-span-2"><hr class="w-auto h-1.75 bg-red-700 border-0"></div>
    <div class="col-span-8"><hr class="w-auto h-1.75 bg-stone-700 border-0"></div>
</div>

<section id="list-produk" class="mt-10 p-4 flex flex-wrap gap-8 gap-y-12 justify-center">
   @php
      $cards = [
         [
            'nama_produk' => 'Asus ROG Z1',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/3/17/8de393d6-90a8-406a-a603-a947025b7ee4.jpg',
         ],
         [
            'nama_produk' => 'MSI Stealth 16',
            'harga_sewa' => '2',
            'foto_produk' => 'https://asset.msi.com/resize/image/global/product/product_172016309252e4eeaa75b78a6f56a682acadce8c72.png62405b38c58fe0f07fcef2367d8a9ba1/400.png',
         ],
         [
            'nama_produk' => 'Acer Predator X',
            'harga_sewa' => '2',
            'foto_produk' => 'https://gizmologi.id/wp-content/uploads/2021/05/PREDATORT-ORION-3000-PO3-630_01.jpg',
         ],
         [
            'nama_produk' => 'Lenovo Legion 7',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2023/12/1/80ff5f72-7595-4097-a6e9-f64196fb6e32.jpg',
         ],
         [
            'nama_produk' => 'HP Omen 15',
            'harga_sewa' => '3',
            'foto_produk' => 'https://www.hp.com/wcsstore/hpusstore/Treatment/mdps/Q2FY22_OMEN45L/hero_45l_1.png',
         ],
         [
            'nama_produk' => 'Asus ROG Z1',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/3/17/8de393d6-90a8-406a-a603-a947025b7ee4.jpg',
         ],
         [
            'nama_produk' => 'MSI Stealth 16',
            'harga_sewa' => '2',
            'foto_produk' => 'https://asset.msi.com/resize/image/global/product/product_172016309252e4eeaa75b78a6f56a682acadce8c72.png62405b38c58fe0f07fcef2367d8a9ba1/400.png',
         ],
         [
            'nama_produk' => 'Acer Predator X',
            'harga_sewa' => '2',
            'foto_produk' => 'https://gizmologi.id/wp-content/uploads/2021/05/PREDATORT-ORION-3000-PO3-630_01.jpg',
         ],
         [
            'nama_produk' => 'Lenovo Legion 7',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2023/12/1/80ff5f72-7595-4097-a6e9-f64196fb6e32.jpg',
         ],
         [
            'nama_produk' => 'HP Omen 15',
            'harga_sewa' => '3',
            'foto_produk' => 'https://www.hp.com/wcsstore/hpusstore/Treatment/mdps/Q2FY22_OMEN45L/hero_45l_1.png',
         ],
         [
            'nama_produk' => 'Asus ROG Z1',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/3/17/8de393d6-90a8-406a-a603-a947025b7ee4.jpg',
         ],
         [
            'nama_produk' => 'MSI Stealth 16',
            'harga_sewa' => '2',
            'foto_produk' => 'https://asset.msi.com/resize/image/global/product/product_172016309252e4eeaa75b78a6f56a682acadce8c72.png62405b38c58fe0f07fcef2367d8a9ba1/400.png',
         ],
         [
            'nama_produk' => 'Acer Predator X',
            'harga_sewa' => '2',
            'foto_produk' => 'https://gizmologi.id/wp-content/uploads/2021/05/PREDATORT-ORION-3000-PO3-630_01.jpg',
         ],
         [
            'nama_produk' => 'Lenovo Legion 7',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2023/12/1/80ff5f72-7595-4097-a6e9-f64196fb6e32.jpg',
         ],
         [
            'nama_produk' => 'HP Omen 15',
            'harga_sewa' => '3',
            'foto_produk' => 'https://www.hp.com/wcsstore/hpusstore/Treatment/mdps/Q2FY22_OMEN45L/hero_45l_1.png',
         ],
         [
            'nama_produk' => 'Asus ROG Z1',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/3/17/8de393d6-90a8-406a-a603-a947025b7ee4.jpg',
         ],
         [
            'nama_produk' => 'MSI Stealth 16',
            'harga_sewa' => '2',
            'foto_produk' => 'https://asset.msi.com/resize/image/global/product/product_172016309252e4eeaa75b78a6f56a682acadce8c72.png62405b38c58fe0f07fcef2367d8a9ba1/400.png',
         ],
         [
            'nama_produk' => 'Acer Predator X',
            'harga_sewa' => '2',
            'foto_produk' => 'https://gizmologi.id/wp-content/uploads/2021/05/PREDATORT-ORION-3000-PO3-630_01.jpg',
         ],
         [
            'nama_produk' => 'Lenovo Legion 7',
            'harga_sewa' => '3',
            'foto_produk' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2023/12/1/80ff5f72-7595-4097-a6e9-f64196fb6e32.jpg',
         ],
         [
            'nama_produk' => 'HP Omen 15',
            'harga_sewa' => '3',
            'foto_produk' => 'https://www.hp.com/wcsstore/hpusstore/Treatment/mdps/Q2FY22_OMEN45L/hero_45l_1.png',
         ],
      ];
   @endphp

   @foreach ($cards as $card)
      @include('components.search_card', [
         'nama_produk' => $card['nama_produk'],
         'harga_sewa' => $card['harga_sewa'],
         'foto_produk' => $card['foto_produk'],
      ])
   @endforeach

</section>

<script>
   // JavaScript to update filter display text based on selected filters
   document.addEventListener('DOMContentLoaded', function() {
      // Get reference to the filter display span
      const filterDisplaySpan = document.querySelector('.text-center.text-lg span.font-bold');
      
      // Function to update filter display text
      function updateFilterDisplay() {
         let activeFilters = [];
         
         // Check CPU filters
         const cpuIntel = document.getElementById('cpu-intel').checked;
         const cpuAmd = document.getElementById('cpu-amd').checked;
         if (cpuIntel) activeFilters.push('Intel');
         if (cpuAmd) activeFilters.push('AMD');
         
         // Check GPU filters
         const gpuGtx = document.getElementById('gpu-gtx').checked;
         const gpuRtx = document.getElementById('gpu-rtx').checked;
         if (gpuGtx) activeFilters.push('GTX');
         if (gpuRtx) activeFilters.push('RTX');
         
         // Check Room filters
         const roomPublic = document.getElementById('room-public').checked;
         const roomPrivate = document.getElementById('room-private').checked;
         if (roomPublic) activeFilters.push('Public');
         if (roomPrivate) activeFilters.push('Private');
         
         // Check RAM filters (range input)
         const ramRange = document.querySelector('input[type="range"][min="0"][max="16"]').value;
         if (ramRange == 8) activeFilters.push('8GB RAM');
         if (ramRange == 16) activeFilters.push('16GB RAM');
         
         // Check Token filters (range input)
         const tokenRange = document.querySelector('input[type="range"][min="1"][max="6"]').value;
         if (tokenRange > 1) activeFilters.push(`${tokenRange} Token`);
         
         // Update display text
         if (activeFilters.length > 0) {
               filterDisplaySpan.textContent = activeFilters.join(', ');
         } else {
               filterDisplaySpan.textContent = 'Semua Produk'; // Default text when no filters are active
         }
      }
      
      // Add event listeners to all filter inputs
      const radioInputs = document.querySelectorAll('input[type="radio"]');
      radioInputs.forEach(input => {
         input.addEventListener('change', updateFilterDisplay);
      });
      
      // Add event listeners to range inputs
      const rangeInputs = document.querySelectorAll('input[type="range"]');
      rangeInputs.forEach(input => {
         input.addEventListener('input', updateFilterDisplay);
      });
      
      // Initialize display
      updateFilterDisplay();
   });

   // JavaScript to update filter display text based on selected filters
   document.addEventListener('DOMContentLoaded', function() {
      // Get reference to the filter display span
      const filterDisplaySpan = document.querySelector('.text-center.text-lg span.font-bold');
      
      // Get references to filter inputs
      const cpuIntel = document.getElementById('cpu-intel');
      const cpuAmd = document.getElementById('cpu-amd');
      const gpuGtx = document.getElementById('gpu-gtx');
      const gpuRtx = document.getElementById('gpu-rtx');
      const roomPublic = document.getElementById('room-public');
      const roomPrivate = document.getElementById('room-private');
      const ramRange = document.getElementById('ram-range');
      const tokenRange = document.getElementById('token-range');
      
      // Get references to action buttons
      const resetButton = document.getElementById('reset-filters');
      const applyButton = document.getElementById('apply-filters');
      
      let activeFilters = [];
      let pendingFilters = [];
      
      // Function to update filter display text
      function updateFilterDisplay(filtersArray) {
         if (filtersArray.length > 0) {
               filterDisplaySpan.textContent = filtersArray.join(', ');
         } else {
               filterDisplaySpan.textContent = 'Semua Produk'; // Default text when no filters are active
         }
      }
      
      // Function to collect current filter values
      function collectFilterValues() {
         let filters = [];
         
         // Check CPU filters
         if (cpuIntel.checked) filters.push('Intel');
         if (cpuAmd.checked) filters.push('AMD');
         
         // Check GPU filters
         if (gpuGtx.checked) filters.push('GTX');
         if (gpuRtx.checked) filters.push('RTX');
         
         // Check Room filters
         if (roomPublic.checked) filters.push('Public');
         if (roomPrivate.checked) filters.push('Private');
         
         // Check RAM filters (range input)
         if (ramRange.value == 8) filters.push('8GB RAM');
         if (ramRange.value == 16) filters.push('16GB RAM');
         
         // Check Token filters (range input)
         if (tokenRange.value > 1) filters.push(`${tokenRange.value} Token`);
         
         return filters;
      }
      
      // Function to handle input changes (collect pending filters but don't apply yet)
      function handleInputChange() {
         pendingFilters = collectFilterValues();
      }
      
      // Function to apply filters
      function applyFilters() {
         activeFilters = pendingFilters;
         updateFilterDisplay(activeFilters);
         
         // Here you would typically also update the product list based on filters
         console.log('Filters applied:', activeFilters);
         
         // Close the drawer after applying filters
         const drawerElement = document.getElementById('drawer-disabled-backdrop');
         if (typeof window.Flowbite !== 'undefined' && drawerElement) {
               const drawer = window.Flowbite.getInstance('Drawer', drawerElement);
               if (drawer) drawer.hide();
         }
      }
      
      // Function to reset filters
      function resetFilters() {
         // Reset radio inputs
         cpuIntel.checked = false;
         cpuAmd.checked = false;
         gpuGtx.checked = false;
         gpuRtx.checked = false;
         roomPublic.checked = false;
         roomPrivate.checked = false;
         
         // Reset range inputs
         ramRange.value = 0;
         tokenRange.value = 1;
         
         // Update pending filters
         pendingFilters = [];
         
         // Also update active filters and display immediately
         activeFilters = [];
         updateFilterDisplay(activeFilters);
         
         console.log('Filters reset');
      }
      
      // Add event listeners to all filter inputs
      const radioInputs = document.querySelectorAll('input[type="radio"]');
      radioInputs.forEach(input => {
         input.addEventListener('change', handleInputChange);
      });
      
      // Add event listeners to range inputs
      const rangeInputs = document.querySelectorAll('input[type="range"]');
      rangeInputs.forEach(input => {
         input.addEventListener('input', handleInputChange);
      });
      
      // Add event listeners to buttons
      if (resetButton) resetButton.addEventListener('click', resetFilters);
      if (applyButton) applyButton.addEventListener('click', applyFilters);
      
      // Initialize filters
      pendingFilters = collectFilterValues();
      activeFilters = pendingFilters;
      updateFilterDisplay(activeFilters);
      
      // If using Flowbite, initialize the drawer
      if (typeof window.Flowbite !== 'undefined') {
         const drawerElement = document.getElementById('drawer-disabled-backdrop');
         if (drawerElement) {
               const drawer = window.Flowbite.getInstance('Drawer', drawerElement);
               if (!drawer) {
                  new window.Flowbite.Drawer(drawerElement);
               }
         }
      }
   });
</script>

@endsection