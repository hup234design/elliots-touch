@if($media)
    @if ($curation)
        @if ($media->hasCuration($curation))
            <div class="w-full bg-red-900">
                <x-curator-curation
                    :media="$media"
                    curation="thumbnail"
                    :class="$class"
                />
            </div>
        @else
            <x-curator-glider
{{--                class="object-cover object-center w-auto h-full"--}}
                :class="$class"
                :media="$media"
                :width="$curationPreset->getWidth()"
                :height="$curationPreset->getHeight()"
            />
        @endif
    @else
        @if( $crops )
            <x-curator-glider
{{--                class="w-full"--}}
                :class="$class"
                fit="crop"
                :crop="$crops"
                :media="$media"
            />
        @else
            <x-curator-glider
{{--                class="w-full"--}}
                :class="$class"
                :media="$media"
            />
        @endif
    @endif
@endif
