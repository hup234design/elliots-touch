@props(['images'])

<div class="flex gap-4">
    @foreach($images as $image)
        <div class="flex-1 aspect-square">
            @if ($image->hasCuration('thumbnail'))
                <x-curator-curation
                    :media="$image"
                    curation="thumbnail"
                    class="object-cover w-full h-full"
                />
            @else
                <x-curator-glider
                    class="object-cover  w-full h-full"
                    :media="$image"
                    :width="400"
                    :height="400"
                />
            @endif
        </div>

    @endforeach
</div>
