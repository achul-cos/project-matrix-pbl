<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@vite('resources/css/app.css')  
<nav class="bg-slate-800 fixed w-full z-100 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse max-sm:hidden">
            <img src="img\logo\Matrix_Icon_Square_Logo_White.png" class="h-12" alt="Matrix Logo" />
            <img src="img\logo\(M)ATRIX Text icon logo white.png" class="h-8" alt="Matrix Logo" />
        </a>

        <div class="flex max-sm:order-2 md:order-1">

            <button type="button" data-modal-target="navbar-search" data-modal-toggle="navbar-search" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 rounded-lg text-sm p-2.5 me-1">
              <div class="flex bg-white rounded-4xl items-center p-1">
                <div class="">
                    <p class="self-center text-center font-bold text-xl text-slate-300 truncate w-15">cari</p>
                </div>
                <div class="px-2">
                  <svg class="text-slate-350 w-5 h-5 p-1 justify-self-end transform transition-transform hover:scale-105" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
                </div>
              </div>
            </button>

            <div class="relative hidden md:block">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-slate-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
              </div>
              <input type="text" id="search-navbar" class="block lg:w-128 md:w-72 sm:w-52 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-4xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Komputer Apa Hari Ini?">
            </div>
        </div>

        <div class="flex items-center max-sm:order-1 md:order-3 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
              <span class="sr-only">Open user menu</span>
              <img class="w-12 h-12 rounded-full object-cover" src="https://static.wikitide.net/hoyodexwiki/3/30/Kaedehara_Kazuha_%28YS-MU%29.png" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
              <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </li>
              </ul>
            </div>
        </div>

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse max-sm:order-3">
            <a href="#">
            <div class="flex bg-white rounded-4xl items-center">
                <div class="px-2">
                    <p class="self-center text-center font-black text-xl text-slate-800 truncate w-15">200000000000</p>
                </div>
                <div class="">
                    <div class="w-10 h-10 justify-self-end invert transform transition-transform hover:scale-105" style="background-image: url(img/icon/Matrix_Token_Icon_white.svg); background-size: cover;"></div>
                </div>
            </div>
            </a>
        </div>
    </div>
</nav>


<div id="navbar-search" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-full shadow-sm">
          <!-- Modal body -->
          <div class="p-4 space-y-4">
            <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-slate-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
              </div>
              <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-4xl bg-gray-50 focus:ring-slate-300 focus:border-slate-300" placeholder="Cari Komputer Apa Hari Ini?">
            </div>
          </div>
      </div>
  </div>
</div>

  
  