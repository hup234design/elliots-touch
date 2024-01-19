@props(['mediaObject' => []])

@isset($mediaObject['media_id'])
    <div class="grid gap-8 md:grid-cols-4" >
        <div class="">
            <div class="w-full aspect-square">
                <x-cms-media-image-renderer
                    :media="$mediaObject['media_id']"
                    :curation="$mediaObject['media_curation']"
                    preset="thumbnail"
                    imgClass="w-full h-full object-cover rounded-2xl"
                />
            </div>
        </div>
        <div class="md:col-span-3">
            {{--<span class="text-xs font-bold text-gray-500">10 jun 2022 19:40</span>--}}
            @if( $mediaObject['title'] )
                <h2 class="mb-2 text-2xl font-bold">
                    {{ $mediaObject['title'] }}
                </h2>
            @endif
            @if( $mediaObject['content'] )
                <h3 class="mb-2 text-xl font-semibold">
                    {{ $mediaObject['subtitle'] }}
                </h3>
            @endif
            @if( $mediaObject['content'] )
                {!! tiptap_converter()->asHTML($mediaObject['content']) !!}
            @endif
        </div>
    </div>
@endisset
