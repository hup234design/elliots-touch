@props(['images'])

<div class="grid grid-cols-3 gap-8">
    @foreach($images as $image)
        <div class="div aspect-w-16 aspect-h-9">
            @if ($image->hasCuration('thumbnail'))
                <x-curator-curation
                    :media="$image"
                    curation="thumbnail"
                    class="object-cover w-full h-full"
                />
            @else
                <x-curator-glider
                    class="object-cover w-full h-full"
                    :media="$image"
                    :width="640"
                    :height="360"
                />
            @endif
        </div>

    @endforeach
</div>
