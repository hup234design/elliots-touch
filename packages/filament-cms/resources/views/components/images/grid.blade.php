@props(['mediaObject' => []])

    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-1/2 p-4">
                <x-cms::media-image-renderer imgClass="w-full h-80 rounded-lg" />
            </div>
            <div class="w-full lg:w-1/2 p-4">
                <x-cms::media-image-renderer imgClass="w-full h-80 rounded-lg" />
            </div>
            <div class="w-full md:w-1/3 p-4">
                <x-cms::media-image-renderer imgClass="w-full h-80 rounded-lg" />
            </div>
            <div class="w-full md:w-1/3 p-4">
                <x-cms::media-image-renderer imgClass="w-full h-80 rounded-lg" />
            </div>
            <div class="w-full md:w-1/3 p-4">
                <x-cms::media-image-renderer imgClass="w-full h-80 rounded-lg" />
            </div>
        </div>
    </div>
