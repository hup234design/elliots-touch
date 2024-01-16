@props(['mediaObject' => []])

<div class="max-w-7xl mx-auto">
    <div class="flex gap-4">
        @for($x=1; $x<=5; $x++)
            <div class="flex-1 aspect-square">
                <x-cms::media-image-renderer />
            </div>
        @endfor
    </div>
</div>
