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
    <p class="text-center text-xl max-md:text-lg">Hasil Pencarian "<span class="font-black">{{ request('search') ?? " "}}</span>"</p>
    <p class="text-center text-lg max-md:text-md mt-2 text-gray-700 font-light italic">Filter Pencarian "<span class="font-bold">Semua Produk</span>"</p>
</section>
<div class="gap-4 grid grid-cols-12 w-(screen)">
    <div class="col-span-2"><hr class="w-auto h-1.75 bg-lime-600 border-0"></div>
    <div class="col-span-2"><hr class="w-auto h-1.75 bg-red-700 border-0"></div>
    <div class="col-span-8"><hr class="w-auto h-1.75 bg-stone-700 border-0"></div>
</div>

<section id="product-list" class="mt-10 p-4 flex flex-wrap gap-8 gap-y-12 justify-center">

   @foreach ($products as $product)
      @include('components.search_card', [
         'id'              => $product['id'],
         'name'            => $product['name'],
         'price'           => $product['price'],
         'image1'          => $product['image1'],
         'cpu_formatted'   => $product['cpu_formatted'],
         'gpu_formatted'   => $product['gpu_formatted'],
         'room'            => $product['room'],
         'floor'           => $product['floor'],
         'ram'             => $product['ram'],
      ])
   @endforeach

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
   const filterDisplaySpan = document.querySelector('.text-center.text-lg span.font-bold');

   // Get all filter inputs
   const cpuIntel = document.getElementById('cpu-intel');
   const cpuAmd = document.getElementById('cpu-amd');
   const gpuGtx = document.getElementById('gpu-gtx');
   const gpuRtx = document.getElementById('gpu-rtx');
   const roomPublic = document.getElementById('room-public');
   const roomPrivate = document.getElementById('room-private');
   const ramRange = document.getElementById('ram-range');
   const tokenRange = document.getElementById('token-range');

   const resetButton = document.getElementById('reset-filters');
   const applyButton = document.getElementById('apply-filters');

   const productCards = document.querySelectorAll('.product-card');

   function collectFilterValues() {
      const filters = [];

      if (cpuIntel?.checked) filters.push('Intel');
      if (cpuAmd?.checked) filters.push('AMD');
      if (gpuGtx?.checked) filters.push('GTX');
      if (gpuRtx?.checked) filters.push('RTX');
      if (roomPublic?.checked) filters.push('Public');
      if (roomPrivate?.checked) filters.push('Private');
      if (ramRange?.value == 8) filters.push('8GB RAM');
      if (ramRange?.value == 16) filters.push('16GB RAM');
      if (tokenRange?.value > 1) filters.push(`${tokenRange.value} Token`);

      return filters;
   }

   function updateFilterDisplay(filters) {
      filterDisplaySpan.textContent = filters.length > 0 ? filters.join(', ') : 'Semua Produk';
   }

   function applyFilters() {
      const activeFilters = collectFilterValues();
      updateFilterDisplay(activeFilters);

      productCards.forEach(card => {
         const cpu = card.dataset.cpu;
         const gpu = card.dataset.gpu;
         const room = card.dataset.room;
         const ram = parseInt(card.dataset.ram);
         const token = parseInt(card.dataset.token);

         const matchesCpu = (!cpuIntel.checked && !cpuAmd.checked) ||
            (cpuIntel.checked && cpu === 'intel') ||
            (cpuAmd.checked && cpu === 'amd');

         const matchesGpu = (!gpuGtx.checked && !gpuRtx.checked) ||
            (gpuGtx.checked && gpu === 'gtx') ||
            (gpuRtx.checked && gpu === 'rtx');

         const matchesRoom = (!roomPublic.checked && !roomPrivate.checked) ||
            (roomPublic.checked && room === 'public') ||
            (roomPrivate.checked && room === 'private');

         const matchesRam = ramRange.value == 0 || ram >= parseInt(ramRange.value);
         const matchesToken = tokenRange.value == 1 || token <= parseInt(tokenRange.value);

         const visible = matchesCpu && matchesGpu && matchesRoom && matchesRam && matchesToken;

         card.style.display = visible ? '' : 'none';
      });

      console.log('Filters applied:', activeFilters);
   }

   function resetFilters() {
      cpuIntel.checked = false;
      cpuAmd.checked = false;
      gpuGtx.checked = false;
      gpuRtx.checked = false;
      roomPublic.checked = false;
      roomPrivate.checked = false;
      ramRange.value = 0;
      tokenRange.value = 1;

      updateFilterDisplay([]);
      productCards.forEach(card => card.style.display = '');
      console.log('Filters reset');
   }

   // Tambahkan event listeners
   const allInputs = document.querySelectorAll('input[type="radio"], input[type="range"]');
   allInputs.forEach(input => input.addEventListener('change', () => updateFilterDisplay(collectFilterValues())));

   if (applyButton) applyButton.addEventListener('click', applyFilters);
   if (resetButton) resetButton.addEventListener('click', resetFilters);

   updateFilterDisplay(collectFilterValues());
});

// Fungsi untuk buka halaman produk
function openProductPage(id) {
   window.location.href = `/product/${id}`;
}
</script>


@endsection
