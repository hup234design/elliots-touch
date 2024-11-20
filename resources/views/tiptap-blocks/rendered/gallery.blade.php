@php
    $preset = new \Awcodes\Curator\Curations\ThumbnailPreset();
@endphp

<div class="flex gap-4">
    @foreach( $images as $media_id)
        @if( $media = \Awcodes\Curator\Models\Media::whereId($media_id)->first() )
            <div class="w-full h-full">
            <div class="flex-1 aspect-square bg-red-500">
            @if ($media->hasCuration('thumbnail'))
                <x-curator-curation :media="$media" curation="thumbnail" class="object-cover object-center w-full h-full" />
            @else
                <x-curator-glider
                    class="object-cover object-center w-full h-full"
                    :media="$media"
                    :width="$preset->getWidth()"
                    :height="$preset->getHeight()"
                />
            @endif
            </div>
            </div>
        @endif
    @endforeach
</div>


{{-- <div class="flex items-center gap-6">
    <div class="text-5xl">
        @php
            echo match($name) {
                'robin' => '🐤',
                'ivy' => '🥀',
                'joker' => '🤡',
                default => '🦇'
            }
        @endphp
    </div>
    <div>
        <p>Name: {{ $name }}</p>
        <p style="color: {{ $color }};">Color: {{ $color }}</p>
        <p>Side: {{ $side ?? 'Good' }}</p>
    </div>
</div> --}}
