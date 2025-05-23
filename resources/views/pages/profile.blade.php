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
          <li><a href="/profile/rent">Riwayat Penyewaan</a></li>
          <li><a href="profile/topup">Riwayat Top Up</a></li>
          <li><a href="/profile">Pengaturan Akun</a></li>
          <li><a href="/profile">Ganti Password</a></li>
          <li class="text-red-600 font-semibold"><a href="/">Keluar Akun</a></li>
          <li class="text-red-700 font-bold"><a href="/">Hapus Akun</a></li>
        </ul>
      </div>
  
      <!-- Profile Form -->

      <form action="{{ route('update.account') }}" method="POST" class="w-full md:w-2/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-6 space-y-4">
          @csrf
          <div class="grid grid-cols-1 gap-4 text-sm text-black">
              <div class="flex justify-between">
                  <label>Nama Lengkap :</label>
                  <input type="text" value="{{ Auth::user()->name ?? 'Nama Lengkap' }}" readonly class="border border-[#556B2F] px-3 py-1 rounded transition hover:border-[#334422] focus:outline-none" />
              </div>
              <div class="flex justify-between items-center">
                  <label>Username :</label>
                  <input type="text" name="username" value="{{ Auth::user()->username ?? 'User  Name' }}" autofocus required class="border border-[#556B2F] px-3 py-1 rounded transition hover:border-[#334422] focus:outline-none" />
              </div>
              <div class="flex justify-between items-center">
                  <label>Email :</label>
                  <input type="email" name="email" value="{{ Auth::user()->email ?? 'Email' }}" required class="border border-[#556B2F] px-3 py-1 rounded transition hover:border-[#334422] focus:outline-none" />
              </div>
              <div class="flex justify-between items-center">
                  <label>Nomor Telepon :</label>
                  <input type="text" name="phone" value="{{ Auth::user()->phone ?? 'Nomor Telepon' }}" required class="border border-[#556B2F] px-3 py-1 rounded transition hover:border-[#334422] focus:outline-none" />
              </div>
              <div class="flex justify-between items-center">
                  <label>Kata Sandi :</label>
                  <input type="password" name="password" placeholder="Min. 8 karakter" class="border border-[#556B2F] px-3 py-1 rounded" />
              </div>
              <div class="flex justify-between items-center">
                  <label>Konfirmasi Kata Sandi :</label>
                  <input type="password" name="password_confirmation" class="border border-[#556B2F] px-3 py-1 rounded" />
              </div>
          </div>
          <button class="mt-4 px-4 py-2 bg-[#556B2F] text-white rounded shadow hover:bg-[#445522] transition">Simpan</button>

          @if(session('success'))
              <div class="mt-4 text-green-600">
                  {{ session('success') }}
              </div>
          @endif

          @if($errors->any())
              <div class="mt-4 text-red-600">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      </form>
  
      <!-- Upload Foto -->
      <div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-2">
        <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F]"></div>
        <p class="text-xs text-center">Format: PNG, JPG, JPEG, GIF<br />Rekomendasi: 1000x1000 px</p>
        <button class="px-4 py-2 bg-[#556B2F] text-white rounded shadow hover:bg-[#445522] transition">Upload File</button>
      </div>
    </div>

@endsection