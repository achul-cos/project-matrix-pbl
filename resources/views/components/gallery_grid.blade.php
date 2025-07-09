<div class="">
    <p class="py-4 font-light text-xl text-center">
        {{ $title ?? 'Lorem Ipsum Dolor Sit Amet.' }}
    </p>
    <div class="flex flex-wrap gap-x-60 gap-y-30 mt-10 justify-center">
        @foreach ($images as $src)
            <img src="{{ $src }}" alt="" class="aspect-square w-48 h-48 object-contain rounded-lg transition-transform transform hover:scale-102">
        @endforeach
    </div>
</div>