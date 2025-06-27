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

        <!-- Jadwal Penyewaan Section -->
        <div class="py-10">
            <h2 class="text-2xl font-bold text-[#556B2F] mb-6">Jadwal Penyewaan</h2>

            @if($product->rentals->count() > 0)
                <div class="overflow-x-auto rounded-2xl shadow-lg">
                    <table class="min-w-full bg-white border-collapse">
                        <thead>
                            <tr class="bg-[#556B2F] text-white">
                                <th class="py-4 px-6 text-left rounded-tl-2xl">Penyewa</th>
                                <th class="py-4 px-6 text-left">Mulai</th>
                                <th class="py-4 px-6 text-left">Selesai</th>
                                <th class="py-4 px-6 text-left">Durasi</th>
                                <th class="py-4 px-6 text-left rounded-tr-2xl">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->rentals as $rental)
                                <tr class="border-b border-gray-200 hover:bg-[#f8f9e8] transition duration-300">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                          <span class="font-mono font-semibold">{{ sensorNama($rental->user->name) }}</span>
                                          <div class="text-xs text-gray-500 mt-1">
                                              @if($rental->status == 'active')
                                                  <span class="flex items-center">
                                                      <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span> Sedang digunakan
                                                  </span>
                                              @endif
                                          </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-medium">{{ \Carbon\Carbon::parse($rental->booked_start)->translatedFormat('d M Y') }}</div>
                                        <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($rental->booked_start)->translatedFormat('H:i') }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-medium">{{ \Carbon\Carbon::parse($rental->booked_end)->translatedFormat('d M Y') }}</div>
                                        <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($rental->booked_end)->translatedFormat('H:i') }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#556B2F] mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-semibold">{{ $rental->duration }} jam</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($rental->status == 'pending')
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 animate-pulse">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                </svg>
                                                Menunggu
                                            </div>
                                        @elseif($rental->status == 'active')
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                Aktif
                                            </div>
                                        @elseif($rental->status == 'completed')
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                Selesai
                                            </div>
                                        @else
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                                Dibatalkan
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="mt-6 flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        Menampilkan {{ $product->rentals->count() }} dari {{ $product->rentals->count() }} penyewaan
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-[#556B2F] text-white rounded-lg hover:bg-[#6e8239] transition disabled:opacity-50" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="px-4 py-2 bg-[#556B2F] text-white rounded-lg hover:bg-[#6e8239] transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            @else
                <div class="text-center py-10 bg-white rounded-2xl shadow-lg">
                    <div class="inline-block p-6 bg-[#f8f9e8] rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#556B2F]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Jadwal Penyewaan</h3>
                    <p class="text-gray-600 max-w-md mx-auto mb-6">
                        Komputer ini belum pernah disewa. Jadilah yang pertama menyewanya!
                    </p>
                    <button data-modal-toggle="rent-modal" data-modal-target="rent-modal" class="bg-[#556B2F] hover:bg-[#6e8239] text-white font-bold px-6 py-3 rounded-full shadow-md transition duration-300 flex items-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Sewa Sekarang
                    </button>
                </div>
            @endif
        </div>
    </div>
  </section>

  <!-- Mapping Product Warnet -->
  <section class="p-8 px-32 mt-6 max-sm:px-4 max-md:px-16 bg-white">
    @include('components.computer-monitor')
  </section>

  <!-- Rent Modal - Versi Lebih Interaktif -->
  <section>
    <!-- Rent Modal - Versi Lebih Interaktif -->
    <div id="rent-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900">
                Sewa/Booking {{ $product->name }}
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="rent-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5 space-y-4">
            <div class="flex flex-row gap-8">
              <div class="w-1/2">
                <form action="{{ route('rent.computer', $product) }}" class="space-y-4 flex flex-col" method="GET" id="rent-form">

                  <!-- Input: Sewa Dari -->
                  <div>
                    <label for="booked_start" class="font-medium text-gray-700 block mb-1">Sewa Mulai:</label>
                    <select id="booked_start" name="booked_start" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 transition">
                      <!-- Diisi oleh JavaScript -->
                    </select>
                  </div>
  
                  <!-- Slider Durasi Interaktif -->
                  <div class="mt-6">
                    <div class="flex justify-between items-center mb-3">
                      <label class="font-medium text-gray-700">Durasi Sewa:</label>
                      <div class="flex items-center bg-lime-100 px-3 py-1 rounded-full">
                        <span id="duration-value" class="text-lg font-bold text-lime-800">1</span>
                        <span class="ml-1 text-lime-700">Jam</span>
                      </div>
                    </div>
                    
                    <!-- Slider dengan track berwarna -->
                    <input type="range" min="1" max="23" value="1" class="w-full h-3 bg-gradient-to-r from-green-200 via-green-400 to-green-600 rounded-lg appearance-none cursor-pointer" id="duration-slider" name="duration">
                    
                    <div class="flex justify-between text-xs text-gray-500 mt-1">
                      <span>1 jam</span>
                      <span>6 jam</span>
                      <span>12 jam</span>
                      <span>18 jam</span>
                      <span>23 jam</span>
                    </div>
                    
                    <!-- Emoji feedback lucu -->
                    <div id="emoji-feedback" class="mt-4 flex justify-center text-4xl">
                      <span class="animate-bounce">😊</span>
                    </div>
                    
                    <!-- Label Emoji -->
                    <div id="emoji-label" class="text-center text-sm text-gray-600 mt-2">Santai aja!</div>
                  </div>
  
                  <!-- Tampilan waktu selesai -->
                  <div class="mt-6 bg-green-50 p-4 rounded-xl border border-green-200">
                    <div class="flex items-center justify-between">
                      <div>
                        <p class="text-green-800 text-sm font-medium">Sewa Selesai:</p>
                        <p id="end-time-display" class="text-green-900 text-lg font-bold">Kamis, 20 Juni 2025 - 11:00 Pagi</p>
                      </div>
                      <div class="bg-green-200 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </div>
                    </div>
                  </div>
  
                  <!-- Tampilan biaya -->
                  <div class="mt-4 p-3 bg-lime-50 rounded-lg border border-lime-200">
                    <div class="flex justify-between items-center">
                      <p class="text-lime-800">Total Biaya:</p>
                      <div class="flex items-baseline">
                        <span id="total-price" class="text-xl font-bold text-lime-800">{{ $product->price }}</span>
                        <span class="ml-1 text-lime-700">TOKEN</span>
                      </div>
                    </div>
                    <p class="text-xs text-lime-600 mt-1">Harga per jam: {{ $product->price }} TOKEN</p>
                  </div>
                  
                  <!-- Input tersembunyi untuk booked_end -->
                  <input type="hidden" id="booked_end" name="booked_end" value="">
              </div>
  
              <div class="w-1/2 items-center my-auto gap-4 flex flex-col p-8">
                <p class="text-lg text-center text-white font-bold inline-block px-2 py-1 bg-lime-800 rounded-full"> {{ $product->name }} </p>
                <div class="relative">
                  <div class="absolute -top-3 -right-3 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full font-bold text-sm transform rotate-6 animate-pulse">
                    <i class="fas fa-bolt mr-1"></i> READY
                  </div>
                  <img id="profilePhoto" src="{{ asset($product->image1) ?? asset('img/ad/placeholder2.png') }}"
                  class="w-full h-auto aspect-square rounded-xl border-4 border-green-400 object-cover shadow-lg" alt="Foto Profil" />
                </div>
                <div class="mt-2 flex items-center">
                  <span class="text-sm text-gray-600 mr-2">Status:</span>
                  @if($product->status == 'available')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>
                      TERSEDIA
                    </span>
                  @elseif($product->status == 'online')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                      </svg>
                      SEDANG DIGUNAKAN
                    </span>
                  @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.049l1.715-5.349L11 6.477V5H9v1.477l-3.8 1.52-1.715 5.349a1 1 0 01-.285 1.049A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.049l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552a2 2 0 00.571 2.065A1.99 1.99 0 005 13c.379 0 .74-.111 1.047-.312a2 2 0 00.57-2.065L6 10.274zm8 0l-.818 2.552a2 2 0 00.571 2.065A1.99 1.99 0 0013 13a1.99 1.99 0 001.247-.312 2 2 0 00.571-2.065L14 10.274z" clip-rule="evenodd" />
                      </svg>
                      DIPESAN
                    </span>
                  @endif
                </div>
                <p class="text-xs text-center text-gray-500 mt-2">Note: <br />Foto produk kemungkinan berbeda dengan produk di Warnet,<br />Konfirmasi dan tanyakan kembali ke operator.</p>
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
            <button type="submit" class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-all transform hover:scale-105">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              Konfirmasi Sewa
            </button>
            <button data-modal-hide="rent-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
              Batal
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Error Modal -->
  <section>
    @include('components.error-modal')
  </section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk mengisi dropdown waktu mulai
    const bookedStart = document.getElementById('booked_start');
    const sekarang = new Date();
    // const offsetMs = sekarang.getTimezoneOffset() * 60 * 1000;

    // Bulatkan ke jam berikutnya jika sekarang belum jam bulat
    const mulaiDari = new Date(sekarang); // langsung gunakan waktu lokal
    if (mulaiDari.getMinutes() > 0 || mulaiDari.getSeconds() > 0) {
        mulaiDari.setHours(mulaiDari.getHours() + 1);
        mulaiDari.setMinutes(0, 0, 0);
    }

    const toLocalISOString = (date) => {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    };

    // Format waktu + tanggal bahasa Indonesia
    const formatWaktuTanggal = (tanggal) => {
      const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

      const jam = tanggal.getHours().toString().padStart(2, '0');
      const menit = tanggal.getMinutes().toString().padStart(2, '0');
      const periode = getWaktuHari(tanggal.getHours()); // Pagi, Siang, Sore, Malam

      const hariText = hari[tanggal.getDay()];
      const tanggalText = tanggal.getDate();
      const bulanText = bulan[tanggal.getMonth()];
      const tahun = tanggal.getFullYear();

      return `${jam}:${menit} ${periode} - ${hariText}, ${tanggalText} ${bulanText} ${tahun}`;
    };

    // Menentukan apakah jam itu Pagi / Siang / Sore / Malam
    const getWaktuHari = (jam) => {
      if (jam >= 4 && jam < 11) return "Pagi";
      if (jam >= 11 && jam < 15) return "Siang";
      if (jam >= 15 && jam < 18) return "Sore";
      return "Malam";
    };

    // Buat pilihan jam (drop-down)
    const buatPilihanJam = (mulai, jumlah = 24) => {
        const opsi = [];
        const waktu = new Date(mulai);

        for (let i = 0; i < jumlah; i++) {
            const value = toLocalISOString(waktu); // Gunakan fungsi baru
            const label = formatWaktuTanggal(waktu);
            opsi.push(`<option value="${value}">${label}</option>`);
            waktu.setHours(waktu.getHours() + 1);
        }
        return opsi;
    };

    // Isi dropdown waktu mulai
    const opsiMulai = buatPilihanJam(mulaiDari, 24);
    bookedStart.innerHTML = opsiMulai.join('');
    
    // Fungsi untuk slider durasi interaktif
    const durationSlider = document.getElementById('duration-slider');
    const durationValue = document.getElementById('duration-value');
    const emojiFeedback = document.getElementById('emoji-feedback');
    const emojiLabel = document.getElementById('emoji-label');
    const endTimeDisplay = document.getElementById('end-time-display');
    const totalPrice = document.getElementById('total-price');
    const hargaPerJam = {{ $product->price }};
    
    // Fungsi untuk menghitung waktu selesai
    const hitungWaktuSelesai = () => {
      const startTime = new Date(bookedStart.value);
      const duration = parseInt(durationSlider.value);
      
      // Hitung waktu selesai
      const endTime = new Date(startTime.getTime() + (duration * 60 * 60 * 1000));
      
      // Format untuk ditampilkan
      const jam = endTime.getHours().toString().padStart(2, '0');
      const menit = endTime.getMinutes().toString().padStart(2, '0');
      const periode = getWaktuHari(endTime.getHours());
      const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'][endTime.getDay()];
      const tanggal = endTime.getDate();
      const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'][endTime.getMonth()];
      const tahun = endTime.getFullYear();
      
      const formatForBackend = (date) => {
          return date.toISOString().slice(0, 16); // Format: YYYY-MM-DDTHH:MM
      };

      // Format untuk input tersembunyi (ISO string)
      document.getElementById('booked_end').value = toLocalISOString(endTime);
      
      return `${hari}, ${tanggal} ${bulan} ${tahun} - ${jam}:${menit} ${periode}`;
    };
    
    // Fungsi untuk update emoji dan label berdasarkan durasi
    const updateEmoji = (duration) => {
      let emoji = '😊';
      let label = 'Santai aja!';
      
      if (duration >= 3 && duration < 6) {
        emoji = '😄';
        label = 'Mulai seru!';
      } else if (duration >= 6 && duration < 9) {
        emoji = '🎮';
        label = 'Gaming marathon!';
      } else if (duration >= 9 && duration < 12) {
        emoji = '🤩';
        label = 'Siap-siap puas!';
      } else if (duration >= 12 && duration < 18) {
        emoji = '😴';
        label = 'Jangan lupa istirahat!';
      } else if (duration >= 18 && duration <= 23) {
        emoji = '💀';
        label = 'Beneran mau sewa segini?';
      }
      
      emojiFeedback.innerHTML = `<span class="animate-bounce">${emoji}</span>`;
      emojiLabel.textContent = label;
    };
    
    // Fungsi untuk update semua nilai
    const updateValues = () => {
      const duration = parseInt(durationSlider.value);
      
      // Update tampilan
      durationValue.textContent = duration;
      endTimeDisplay.textContent = hitungWaktuSelesai();
      totalPrice.textContent = (hargaPerJam * duration).toLocaleString('id-ID');
      updateEmoji(duration);
    };
    
    // Inisialisasi pertama kali
    updateValues();
    
    // Event listeners
    durationSlider.addEventListener('input', updateValues);
    bookedStart.addEventListener('change', updateValues);
    
    // Animasi slider thumb
    durationSlider.addEventListener('mousedown', function() {
      this.classList.add('cursor-grabbing');
    });
    
    durationSlider.addEventListener('mouseup', function() {
      this.classList.remove('cursor-grabbing');
    });
  });
</script>

<style>
  /* Styling khusus untuk slider */
  input[type=range] {
    -webkit-appearance: none;
    height: 10px;
    border-radius: 5px;
    outline: none;
  }
  
  input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #fcd34d;
    border: 3px solid #f59e0b;
    cursor: pointer;
    box-shadow: 0 0 8px rgba(245, 158, 11, 0.5);
    transition: all 0.3s ease;
  }
  
  input[type=range]::-webkit-slider-thumb:hover {
    transform: scale(1.1);
    box-shadow: 0 0 12px rgba(245, 158, 11, 0.8);
  }
  
  input[type=range]::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #fcd34d;
    border: 3px solid #f59e0b;
    cursor: pointer;
    box-shadow: 0 0 8px rgba(245, 158, 11, 0.5);
  }
  
  /* Animasi */
  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
  
  .animate-bounce {
    animation: bounce 1s infinite;
  }
  
  .animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }
  
  @keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
  }
  
  /* Efek khusus untuk emoji tengkorak */
  .skull-emoji {
    animation: skull-shake 0.5s infinite;
  }
  
  @keyframes skull-shake {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(10deg); }
    50% { transform: rotate(0deg); }
    75% { transform: rotate(-10deg); }
    100% { transform: rotate(0deg); }
  }
</style>

@endsection