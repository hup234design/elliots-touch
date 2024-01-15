@props(['images'])

<div class="flex gap-4">
    @foreach($images as $image)
        <div class="flex-1 aspect-w-1 aspect-h-1">
            @if ($image->hasCuration('thumbnail'))
                <x-curator-curation
                    :media="$image"
                    curation="thumbnail"
                    class="object-cover w-auto"
                />
            @else
                <x-curator-glider
                    class="object-cover w-auto"
                    :media="$image"
                    :width="400"
                    :height="400"
                />
            @endif
        </div>

    @endforeach
</div>
