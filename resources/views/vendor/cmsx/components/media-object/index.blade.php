@props(['mediaObject' => []])

@php
    $preset = new \Hup234design\FilamentCms\Filament\Curator\Curations\ThumbnailPreset();
    $media = \Awcodes\Curator\Models\Media::find($mediaObject['media_id'] ?? null);
@endphp

@if($media)

    <div class="grid gap-8 md:grid-cols-3 lg:grid-cols-4">
        <div class="">
        @if ($media->hasCuration($mediaObject['media_curation'] ?? ""))
            <x-curator-curation
                :media="$mediaObject['media_id']"
                curation="$mediaObject['media_curation']"
                class="object-cover w-full h-full"
            />
        @else
            <div class="w-full aspect-square">
                <x-curator-glider
                    class="object-cover w-full h-full"
                    :media="$mediaObject['media_id']"
                    :width="$preset->getWidth()"
                    :height="$preset->getHeight()"
                />
            </div>
        @endif
    </div>

    <div class="md:col-span-2 lg:col-span-3">
        <div class="prose max-w-none">
        @if($mediaObject['title'] ?? null)
            <h2 class="mt-0 mb-2">
                {{ $mediaObject['title'] }}
            </h2>
        @endif
        @if($mediaObject['subtitle'] ?? null)
            <h3 class="mt-0">
                {{ $mediaObject['subtitle'] }}
            </h3>
        @endif
        @if($mediaObject['content'] ?? null)
            {!! tiptap_converter()->asHTML($mediaObject['content']) !!}
        @endif
    </div>
    </div>

    </div>

@endif
