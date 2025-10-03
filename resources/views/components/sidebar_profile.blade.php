<!-- Sidebar -->
<div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-4">
    {{-- <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/ad/placeholder1.png') }}" class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F] object-cover" /> --}}
    <img src="{{ Auth::user()->photo_url }}" class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F] object-cover" />
    <h2 class="text-[#556B2F] font-bold text-lg">{{ Auth::user()->username ?? "Lorem Ipsum"}}</h2>
    <ul class="space-y-2 w-full text-center text-sm">
        <li><a href="../profile/rent">Riwayat Penyewaan</a></li>
        <li><a href="../profile/topup">Riwayat Top Up</a></li>
        <li><a href="../profile">Pengaturan Akun</a></li>
        <li><a href="{{ route('profile.password') }}">Ganti Password</a></li>
        <li class="text-red-600 font-semibold"><a href="{{ route('logoutAccount') }}">Keluar Akun</a></li>
       <li class="text-red-600 font-semibold">
  <button data-modal-target="delete-account-modal" data-modal-toggle="delete-account-modal" class="hover:underline w-full text-center">Hapus Akun
  </button>
</li>

<!-- Modal Konfirmasi Hapus Akun -->
<div id="delete-account-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden">
  <div class="relative w-full max-w-md p-4">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="flex justify-between items-center p-4 border-b dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Konfirmasi Untuk Menghapus Akun
        </h3>
        <button type="button" class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600" data-modal-hide="delete-account-modal">
          <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13"/>
          </svg>
        </button>
      </div>
      <div class="p-4">
        <p class="text-gray-500 dark:text-gray-300">
          Apakah kamu yakin ingin menghapus akunmu? Tindakan ini tidak bisa dibatalkan.
        </p>
      </div>
      <!-- Footer -->
      <div class="flex justify-end gap-2 px-4 pb-4">
        <button data-modal-hide="delete-account-modal" type="button" class="text-gray-700 bg-gray-200 hover:bg-gray-300 font-medium rounded-lg text-sm px-4 py-2">
          Batal
        </button>
        <form action="{{ route('hapus.akun') }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2">
            Hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
    </ul>
</div>
