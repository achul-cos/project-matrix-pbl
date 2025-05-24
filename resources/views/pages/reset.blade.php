@extends('layout.guest')

@section('title', 'Matrix - Penyewaan komputer Warnet')

@section('content')

    <div class="flex justify-center items-center min-h-screen px-4 py-12">
        <!-- Card Anda dengan beberapa perbaikan -->
        <div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="#">

               <a href="/login">
                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" data-dropdown-placement="bottom-start" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                    </svg>

                </button></a>

                <h5 class="text-2xl font-bold text-[#556B2F] mb-5 text-center">Atur Ulang Kata Sandi</h5>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Masukkan email untuk menerima link reset password
                    </label>
                    <input type="email" name="email" id="email" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 
                        dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="email" required/>
                </div>
                
                <button 
                    type="submit" class="w-full bg-[#556B2F] hover:bg-[#6e8239] text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                    dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Selanjutnya
                </button>
            </form>
        </div>
    </div>


@endsection