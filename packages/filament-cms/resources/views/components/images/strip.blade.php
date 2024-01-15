@props(['mediaObject' => []])

<div class="max-w-7xl mx-auto">
    <div class="flex gap-4">
        @for($x=1; $x<=5; $x++)
            <div class="flex-1 aspect-square">
            <img class="w-full h-full object-cover rounded-lg" src="https://shuffle.dev/plain-assets/images/gray-500-square.png" alt="">
            </div>
        @endfor
    </div>
</div>
