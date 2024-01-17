@props(['images' => []])

<div class="max-w-7xl mx-auto">
    <div class="flex gap-4">
        @foreach($images as $image)
            <div class="flex-1">
                <x-cms-media-image-renderer
                    :media="$image"
                    preset="thumbnail"
                    imgClass="w-full rounded-lg"
                />
{{--                <x-cms-media-image-renderer :media="$image" curation="thumbnail" />--}}
            </div>
        @endforeach
    </div>
</div>
