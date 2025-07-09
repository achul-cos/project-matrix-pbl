@extends('layout.app')

@section('title', 'Matrix - Ganti Password')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-6 md:flex md:gap-6">
    @include('components.sidebar_profile')

    <div class="w-full md:w-3/4 bg-white rounded-xl shadow-md border border-[#556B2F] p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Ganti Password</h2>

        {{-- Notifikasi --}}
        @if(session('error'))
            <div class="mb-4 text-red-600 font-medium">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="mb-4 text-green-600 font-medium">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <ul class="mb-4 text-red-600 list-disc pl-5 text-sm">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

        {{-- Form Ubah Password --}}
        <form method="POST" action="{{ route('profile.change_password') }}" onsubmit="return validateForm();">
            @csrf
            <div class="space-y-4">

                {{-- Password Lama --}}
                <div>
                    <label for="old_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
                    <div class="relative">
                        <input type="password" name="old_password" id="old_password" required class="w-full mt-1 border border-gray-300 rounded-lg p-2 pr-10" />
                    </div>
                </div>

                {{-- Password Baru --}}
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <div class="relative">
                        <input type="password" name="new_password" id="new_password" required class="w-full mt-1 border border-gray-300 rounded-lg p-2 pr-10" />
                    </div>
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" required class="w-full mt-1 border border-gray-300 rounded-lg p-2 pr-10" />
                    </div>
                </div>

                {{-- Info jika user dari Google --}}
                @if(Auth::user()->is_google)
                <p class="mb-4 text-black font-medium">
                    Akun Anda terhubung dengan Google. Untuk mengganti password,
                    <a href="{{ route('password.request') }}" class="underline font-bold text-red-400 hover:text-red-300">klik di sini</a>.
                </p>
                @endif

                {{-- Tombol Simpan --}}
                <div class="pt-4">
                    <button type="submit" class="bg-[#556B2F] text-white px-4 py-2 rounded-lg hover:bg-[#445522]">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function validateForm() {
        const isGoogleUser = @json(Auth::user()->is_google);

        if (isGoogleUser) {
            alert("Akun Anda terhubung dengan Google. Untuk mengganti password, silakan gunakan fitur lupa password.");
            window.location.href = "{{ route('forget.form') }}";
            return false;
        }

        const pw = document.getElementById('new_password').value;
        const confirm = document.getElementById('new_password_confirmation').value;
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

        if (!regex.test(pw)) {
            alert('Password harus terdiri dari minimal 8 karakter, mengandung huruf besar, kecil, dan angka.');
            return false;
        }

        if (pw !== confirm) {
            alert('Konfirmasi password tidak cocok.');
            return false;
        }

        return true;
    }

    
</script>
@endpush
