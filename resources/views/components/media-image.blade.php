@props([
    'media'     => null,
    'curation'  => null,
    'presetKey' => null,
])

@php
    if( is_numeric($media) ) {
        $media = \Hup234design\FilamentCms\Models\CustomMedia::find($media);
    }
    $preset = null;
    if ($presetKey) {
        $classArray = config("curator.curation_presets");
        // Iterate through each class name
        foreach ($classArray as $className) {
            // Instantiate the class
            $classInstance = new $className();
            // Check if the getKey method returns the key we are looking for
      if (
        method_exists($classInstance, "getKey") &&
        $classInstance->getKey() === $presetKey
      ) {
        // Return the matching class name
        $preset = app($className);
      }
    }
        }
@endphp

<div class="space-y-4">
    <p>Preset : {{ $preset ? $preset->getLabel() : '-' }}</p>
    <p>Curation : {{ $curation ? $curation : '-' }}</p>
    <p>Media has curation : {{ $curation ? ( $media->hasCuration($curation) ? 'Yes' : 'No' ) : 'N/A' }}</p>
    @if( $curation && $media->hasCuration($curation) )
        <x-curator-curation :media="$media" :curation="$curation" class="max-w-full" />
    @else
        @if( $preset )
            <x-curator-glider
                class="object-cover w-auto"
                :media="$media"
                :width="$preset->getWidth()"
                :height="$preset->getHeight()"
            />
        @else
            <img src="{{ $media->url }}" class="max-w-full" />
        @endif
    @endif
</div>
