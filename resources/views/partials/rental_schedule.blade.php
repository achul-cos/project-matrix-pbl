@if(count($rentals) > 0)
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
                @foreach($rentals as $rental)
                    <tr class="border-b border-gray-200 hover:bg-[#f8f9e8] transition duration-300">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                              <span class="font-mono font-semibold">{{ $rental->user ? sensorNama($rental->user->name) : 'Unknown' }}</span>
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
            Menampilkan {{ $firstItem }} - {{ $lastItem }} dari {{ $total }} penyewaan
        </div>
        <div class="flex space-x-2">
            @if ($currentPage > 1)
                <button onclick="loadRentalsPage({{ $currentPage - 1 }})" class="px-4 py-2 bg-[#556B2F] text-white rounded-lg hover:bg-[#6e8239] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @else
                <button class="px-4 py-2 bg-[#556B2F] text-white rounded-lg hover:bg-[#6e8239] transition disabled:opacity-50" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @endif

            @if ($hasMorePages)
                <button onclick="loadRentalsPage({{ $currentPage + 1 }})" class="px-4 py-2 bg-[#556B2F] text-white rounded-lg hover:bg-[#6e8239] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @else
                <button class="px-4 py-2 bg-[#556B2F] text-white rounded-lg hover:bg-[#6e8239] transition disabled:opacity-50" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @endif
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