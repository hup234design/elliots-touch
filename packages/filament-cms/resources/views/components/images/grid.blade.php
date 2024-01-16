@props(['images' => []])

    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
            @foreach($images as $image)
                <div class="w-full lg:w-1/3 p-4">
                    <x-cms::media-image-renderer :media="$image" imgClass="w-full h-80 rounded-lg" />
                </div>
            @endforeach
        </div>
    </div>
