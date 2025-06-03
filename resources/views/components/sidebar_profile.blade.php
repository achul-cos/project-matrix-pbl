<!-- Sidebar -->
<div class="w-full md:w-1/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-4 flex flex-col items-center space-y-4">
    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/ad/placeholder1.png') }}" class="w-24 h-24 rounded-full bg-gray-200 border-4 border-[#556B2F] object-cover" />
    <h2 class="text-[#556B2F] font-bold text-lg">{{ Auth::user()->username ?? "Lorem Ipsum"}}</h2>
    <ul class="space-y-2 w-full text-center text-sm">
        <li><a href="../profile/rent">Riwayat Penyewaan</a></li>
        <li><a href="../profile/topup">Riwayat Top Up</a></li>
        <li><a href="../profile">Pengaturan Akun</a></li>
        <li><a href="../profile/change_password">Ganti Password</a></li>
        <li class="text-red-600 font-semibold"><a href="/logout">Keluar Akun</a></li>
        <li class="text-red-700 font-bold"><a href="/">Hapus Akun</a></li>
    </ul>
</div>
