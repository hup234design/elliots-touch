@props(['images' => []])

<div class="max-w-7xl mx-auto">
    <div class="flex gap-4">
        @foreach($images as $image)
            <div class="flex-1 aspect-square">
                <x-cms::media-image-renderer :media="$image" />
            </div>
        @endforeach
    </div>
</div>
