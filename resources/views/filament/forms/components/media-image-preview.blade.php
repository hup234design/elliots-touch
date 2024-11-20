@php
$media = $getMedia();
$crops = $getState();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{}" class="relative rounded-lg overflow-hidden">

{{--        @if ($curation)--}}
{{--            <x-curator-curation :media="$media['id']" :curation="$curation" class="mx-auto"/>--}}
{{--        @else--}}
            @if( $crops )
                <x-curator-glider
                    class="w-full"
                    fit="crop"
                    crop="{{ $crops['width'] }}, {{ $crops['height'] }}, {{ $crops['x'] }}, {{ $crops['y'] }}"
                    :media="$media['id']"
                />
            @else
                <x-curator-glider
                    class="w-full"
                    :media="$media['id']"
                />
            @endif

        <div class="flex p-4 justify-center gap-4">
            <div>
                {{ $getAction('crop') }}
            </div>
            <div>
                {{ $getAction('deleteMedia') }}
            </div>
{{--            @if($crops)--}}
{{--                <div>--}}
{{--                    {{ $getAction('deleteCrop') }}--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
{{--        @endif--}}
    </div>
</x-dynamic-component>

@php
    $media = $getMedia();
@endphp

{{--<x-dynamic-component--}}
{{--    :component="$getFieldWrapperView()"--}}
{{--    :field="$field"--}}
{{-->--}}
{{--    <div>--}}
{{--        {{ $media }}--}}
{{--        @if ($curation && $media->hasCuration($curation))--}}
{{--            <x-curator-curation :media="$media" :curation="$curation" class="w-full h-auto" />--}}
{{--        @else--}}
{{--            @if($preset)--}}
{{--                <x-curator-glider--}}
{{--                    class="w-full h-auto"--}}
{{--                    fit="crop"--}}
{{--                    :srcset="['1024w','640w']"--}}
{{--                    sizes="(max-width: 1200px) 100vw, 1024px"--}}
{{--                    :media="$media"--}}
{{--                    :width="$preset->getWidth()"--}}
{{--                    :height="$preset->getHeight()"--}}
{{--                />--}}
{{--            @else--}}
{{--                <x-curator-glider--}}
{{--                    class="w-full h-auto"--}}
{{--                    :srcset="['1024w','640w']"--}}
{{--                    sizes="(max-width: 1200px) 100vw, 1024px"--}}
{{--                    :media="$media->id"--}}
{{--                />--}}
{{--            @endif--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</x-dynamic-component>--}}
