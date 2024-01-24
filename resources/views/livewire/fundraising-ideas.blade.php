<div>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 ">
        @foreach( $ideas as $idea )
            <div class="relative bg-gray-800 border p-4">
                @if($idea->featured_image?->media )
                    <div class="absolute inset-0">
                    <x-cms-media-image-renderer
                        :media="$idea->featured_image?->media"
                        :curation="$idea->featured_image?->curation"
                        imgClass="w-full h-full object-cover object-center opacity-50"
                    />
                    </div>
                @endif
                <div class="relative prose">
                    <h3 class="break-words text-white">{{ $idea->title }}</h3>
                    @if( $idea->content ?? null )
                        <div class="font-semibold leading-tight  text-white">
                        {!! tiptap_converter()->asText($idea->content) !!}
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
