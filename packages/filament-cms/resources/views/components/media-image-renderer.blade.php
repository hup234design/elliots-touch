@props([
    'media'    => null,
    'width'    => 400,
    'height'   => 400,
    'imgClass' => 'w-full h-full rounded-lg',
 ])

@php
    if(! $media) {
        $media = \Awcodes\Curator\Models\Media::inRandomOrder()->first();
    }
@endphp

    <x-curator-glider
        class="object-cover {{ $imgClass }}"
        :media="$media"
        :width="$width"
        :height="$height"
    />
