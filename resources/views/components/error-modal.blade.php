{{-- resources/views/components/error-modal.blade.php --}}

{{-- Pastikan ada session 'error' untuk menampilkan modal --}}
@if (session('error'))
{{-- Overlay gelap di belakang modal --}}
<div id="error-modal-backdrop" class="fixed inset-0 bg-gray-900/45 z-40"></div>

<div id="error-modal" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            {{-- Tombol Tutup Modal --}}
            <button id="close-error-modal-button" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                {{-- Ikon Peringatan --}}
                <svg class="mx-auto mb-4 text-red-500 w-12 h-12 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                {{-- Judul dan Pesan Kesalahan --}}
                <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">Terjadi Kesalahan</h3>
                <p class="mb-5 text-base font-normal text-gray-500 dark:text-gray-400">
                    {{ session('error') }}
                </p>
                {{-- Tombol Aksi --}}
                <button id="confirm-error-modal-button" type="button" class="text-white bg-lime-800 hover:bg-lime-900 focus:ring-4 focus:outline-none focus:ring-lime-600 dark:focus:ring-lime-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Mengerti
                </button>
            </div>
        </div>
     </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('error-modal');
        const backdrop = document.getElementById('error-modal-backdrop');

        if (modal && backdrop) { // Pastikan kedua elemen ada
            const closeModalButton = document.getElementById('close-error-modal-button');
            const confirmModalButton = document.getElementById('confirm-error-modal-button');

            const hideModal = () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                backdrop.classList.add('hidden'); // Sembunyikan backdrop
            };

            closeModalButton.addEventListener('click', hideModal);
            confirmModalButton.addEventListener('click', hideModal);

            // Tampilkan modal dan backdrop jika ada
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            backdrop.classList.remove('hidden'); // Tampilkan backdrop
        }
    });
</script>
@endif