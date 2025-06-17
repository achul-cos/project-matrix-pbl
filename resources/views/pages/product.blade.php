@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

  <!-- Produk Detail Section -->
  <section class="p-8 px-32 mt-6 max-sm:px-4 max-md:px-16 bg-white rounded-2xl grid md:grid-cols-2 gap-10">

    <!-- Gambar -->
    <div>
      <!-- Gambar Utama -->
      <div class="overflow-hidden mb-4 flex items-center justify-center">
        <img src="{{ asset($product->image1) }}" alt="Gambar Produk Utama" class="object-fill h-full w-full rounded-xl aspect-square border-2 p-8 border-gray-800" />
      </div>

      <!-- Gambar Thumbnail -->
      <div class="grid grid-cols-3 gap-3">
        <img src="{{ asset($product->image2) }}" alt="Thumbnail 1" class="rounded-xl object-fill cursor-pointer hover:opacity-80 transition aspect-square border-2 p-4 border-gray-800" />
        <img src="{{ asset($product->image3) }}" alt="Thumbnail 2" class="rounded-xl object-fill cursor-pointer hover:opacity-80 transition aspect-square border-2 p-4 border-gray-800" />
        <img src="{{ asset($product->image4) }}" alt="Thumbnail 3" class="rounded-xl object-fill cursor-pointer hover:opacity-80 transition aspect-square border-2 p-4 border-gray-800" />
      </div>
    </div>

        <!-- Info -->
        <div class="flex flex-col justify-between">
          <div>
            <h1 class="text-4xl font-black text-[#556B2F] mb-2">{{ $product->name }}</h1>
            {{-- <p class="text-sm text-gray-500">Inclusive deal of the day</p>
            <p class="text-sm font-medium text-blue-600">BY ASUS</p> --}}

            <div class="grid grid-cols-2 gap-3 mt-4 text-sm">
              <p><strong>CPU:</strong> <span class="inline-block px-2 py-1 border rounded">{{ $product->cpu }}</span></p>
              <p><strong>Ruangan:</strong> <span class="inline-block px-2 py-1 border rounded">{{ strtoupper($product->room) }} ROOM</span></p>
              <p><strong>GPU:</strong> <span class="inline-block px-2 py-1 border rounded">{{ $product->gpu }}</span></p>
              <p><strong>Lantai:</strong> <span class="inline-block px-2 py-1 border rounded">{{ $product->floor }}</span></p>
              <p><strong>RAM:</strong> <span class="inline-block px-2 py-1 border rounded">{{ $product->ram }} GB</span></p>
              <p><strong>STATUS:</strong> <span class="inline-block px-2 py-1 border rounded">{{ $product->status }}</span></p>
              <p><strong>KODE:</strong> <span class="inline-block px-2 py-1 border rounded">{{ $product->code }}</span></p>
              <p><strong>Jumlah Tersewa:</strong> <span class="inline-block px-2 py-1 border rounded">{{ $product->rent }}</span></p>
            </div>

            <p class="mt-4 text-sm text-gray-700 leading-relaxed">
              {{ $product->desc }}
            </p>

            <div class="flex items-center space-x-4 mt-6">
              <div class="flex items-center space-x-2 bg-[#d7e7a1] text-[#556B2F] font-semibold px-3 py-1 rounded-full">
                <img src="{{ asset('img/icon/Matrix_Token_Icon_Green.svg') }}" class="w-4 h-4 brightness-50" />
                <span>{{ $product->price }} TOKEN / JAM</span>
              </div>
              <button data-modal-toggle="rent-modal" data-modal-target="rent-modal" class="bg-[#556B2F] hover:bg-[#6e8239] text-white font-bold px-6 py-2 rounded-full shadow-md transition duration-300">
                  MULAI SEWA
              </button>
            </div>
          </div>

          <!-- Review -->
          {{-- <div class="mt-8 border-t pt-4">
            <div class="flex items-start space-x-4">
              <div class=""><img src="/img/ad/placeholder1.png" alt="" class="object-cover w-20 h-auto rounded-full aspect-square"></div>
              <div>
                <p class="font-semibold">Ara gamers sejati</p>
                <p class="italic text-sm text-gray-600">"ASUS ROG A1 di sini bener-bener worth it! Performa mantap, nggak ada lag sama sekali. 3 token tapi serasa pake PC puluhan juta"</p>
                <div class="text-yellow-500 mt-1 text-sm">★★★★★</div>
              </div>
            </div>
          </div> --}}
        </div>


  </section>

  <section class="p-8 px-32 mt-6 max-sm:px-4 max-md:px-16 bg-white">
    @include('components/computer-monitor')
  </section>

  <!-- Add Modal -->
  <div id="rent-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow-sm">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
          <h3 class="text-xl font-semibold text-gray-900">
              Sewa/Booking {{ $product->name }}
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="rent-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4">

          {{-- Form Add User --}}

          <div class="flex flex-row gap-8">
            <div class="w-1/2">
              <form action="{{ route('admin.tambahUser') }}" class="space-y-4 flex flex-col" method="POST" enctype="multipart/form-data">
              @csrf
  
              <label for="name" class="font-medium">Nama Pengguna:</label>
              <input type="text" name="name" placeholder="Nama Pengguna" autofocus required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition" value="{{ old('name') }}" />
  
              <label for="name" class="font-medium">Username:</label>
              <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition" value="{{ old('username') }}" />
  
              <label for="name" class="font-medium">Email:</label>
              <div class="relative">
                <button id="emailGuest" type="button" class="absolute right-5 top-2.5 px-2 py-1 shadow-md rounded-lg border-green-600 bg-green-400 text-white transform transition-transform active:scale-80">
                  Guest
                </button>
                <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition" value="{{ old('email') }}" />
                <p class="text-xs mt-2 text-gray-400" id="alertEmailGuest">Email Default Tamu</p>
              </div>
              
              <label for="phone" class="font-medium">Nomor Telepon:</label>
              <div class="relative">
                <button id="phoneGuest" type="button" class="absolute right-5 top-2.5 px-2 py-1 shadow-md rounded-lg border-green-600 bg-green-400 text-white transform transition-transform active:scale-80">
                  Guest
                </button>
                <input type="tel" name="phone" placeholder="No Telepon" required minlength="9" maxlength="14" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition" value="{{ old('phone') }}" />
                <p class="text-xs mt-2 text-gray-400" id="alertPhoneGuest">Nomor Telepon Default Tamu</p>
              </div>
            </div>

            <div class="w-1/2 items-center my-auto gap-4 flex flex-col p-8">
              <p class="text-lg text-center text-white font-bold inline-block px-2 py-1 bg-lime-800 "> {{ $product->name }} </p>
              <img id="profilePhoto" src="{{ asset($product->image1) ?? asset('img/ad/placeholder2.png') }}"
              class="w-full h-auto aspect-square rounded-xl border-4 border-green-400 object-cover" alt="Foto Profil" />
              <p class="text-xs text-center text-gray-500">Note: <br />Foto produk kemungkinan berbeda dengan produk di Warnet,<br />Konfirmasi dan tanyakan kembali ke operator dan cek kembali kode komputernya.</p>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Sewa</button>
            <input data-modal-hide="rent-modal" type="reset" value="Batal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            </form>
        </div>
      </div>
    </div>
  </div>



@endsection
