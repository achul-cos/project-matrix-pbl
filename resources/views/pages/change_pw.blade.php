@extends('layout.app')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">

      <!-- Sidebar -->
      <div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-4">
        <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F]"></div>
        <h2 class="text-[#556B2F] font-bold text-lg">Achul</h2>
        <ul class="space-y-2 w-full text-center text-sm">
          <li>Riwayat Penyewaan</li>
          <li>Riwayat Top Up</li>
          <li>Pengaturan Akun</li>
          <li>Ganti Password</li>
          <li class="text-red-600 font-semibold">Keluar Akun</li>
          <li class="text-red-700 font-bold">Hapus Akun</li>
        </ul>
      </div>

     <!-- Edit Password -->
<div class="w-full md:w-3/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Reset Password</h2>
    <form class="space-y-4">
        <!-- Old Password -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <label for="old_password" class="w-full md:w-1/3 text-sm font-medium text-gray-900">Old Password</label>
            <div class="relative w-full md:w-2/3">
                <input type="password" id="old_password" placeholder="Min. 8 karakter" required class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 pr-10 focus:ring-[#556B2F] focus:border-[#556B2F]" />
                <button type="button" onclick="togglePassword('old_password', this)" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-700">
                </button>
            </div>
        </div>

        <!-- New Password -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <label for="new_password" class="w-full md:w-1/3 text-sm font-medium text-gray-900">New Password</label>
            <div class="relative w-full md:w-2/3">
                <input type="password" id="new_password" placeholder="Min. 8 karakter" required class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 pr-10 focus:ring-[#556B2F] focus:border-[#556B2F]" />
                <button type="button" onclick="togglePassword('new_password', this)" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-700">
                </button>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <label for="confirm_password" class="w-full md:w-1/3 text-sm font-medium text-gray-900">Confirm Password</label>
            <div class="relative w-full md:w-2/3">
                <input type="password" id="confirm_password" placeholder="Min. 8 karakter" required class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 pr-10 focus:ring-[#556B2F] focus:border-[#556B2F]" />
                <button type="button" onclick="togglePassword('confirm_password', this)" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-700">
                </button>
            </div>
        </div>
        <div>
            <button type="submit" class="mt-4 px-5 py-2.5 bg-[#556B2F] text-white rounded-lg hover:bg-[#445522] transition font-medium text-sm">
                Simpan
            </button>
        </div>
    </form>
</div>



@endsection
