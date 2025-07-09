<div class="">
    <div class="grid grid-cols-12 gap-0 bg-gray-50 rounded-xl shadow-xl mx-8 mt-4 max-md:hidden">
        <div class="col-span-6 p-8 flex flex-col gap-4">
            <div class="">
                <p class="font-bold text-2xl">{{ $judul_card_artikel ?? "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad fugit nulla excepturi, odio minima quas voluptatibus iusto vel velit?" }}</p>
            </div>
            <div class="">
                <div class="grid grid-cols-12 gap-4 mt-8">
                    <div class="col-span-6"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-lime-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-red-700 border-0 rounded-lg"></div>
                </div>                
            </div>
            <div class="">
                <p class="pt-4 text-md">{{ $isi_card_artikel ?? "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet." }}</p>
            </div>
        </div>
        <div class="col-span-6 rounded-r-xl">
            <img src="{{ $foto_card_artikel ?? "../img/ad/placeholder1.png" }}" alt="" class="aspect-5/4 object-cover rounded-r-2xl h-full">
        </div>
    </div>
    <div class="grid grid-rows-12 gap-0 bg-white rounded-xl shadow-xl mx-8 mt-4 min-md:hidden">
        <div class="row-span-6 rounded-t-xl" style="background-image: url({{ $foto_card_artikel ?? "../img/ad/placeholder1.png" }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
        <div class="row-span-6 p-8">
            <div class="row-span-1">
                <p class="font-bold text-2xl">{{ $judul_card_artikel ?? "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ad fugit nulla excepturi, odio minima quas voluptatibus iusto vel velit?" }}</p>
            </div>
            <div class="row-span-1">
                <div class="grid grid-cols-12 gap-4 mt-4">
                    <div class="col-span-6"><hr class="w-auto h-1.75 bg-stone-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-lime-700 border-0 rounded-lg"></div>
                    <div class="col-span-3"><hr class="w-auto h-1.75 bg-red-700 border-0 rounded-lg"></div>
                </div>                
            </div>
            <div class="row-span-1">
                <p class="pt-4 text-md">{{ $isi_card_artikel ?? "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptates distinctio! Tempora perspiciatis minima ullam repudiandae temporibus illum beatae, aut deleniti odio, cum consequuntur eligendi quis debitis neque dolor? Eveniet." }}</p>
            </div>
        </div>
    </div>
</div>