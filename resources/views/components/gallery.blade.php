<p class="py-4 mb-20 font-light text-xl text-center">
    {{ $title ?? 'Lorem Ipsum Dolor Sit Amet.' }}
</p>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($images as $image)
        <div>
            <img class="aspect-4/5 object-cover rounded-lg" src="{{ asset($image) }}" alt="Gambar">
        </div>
    @endforeach
</div>

