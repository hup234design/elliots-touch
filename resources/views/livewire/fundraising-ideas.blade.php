<div>
    <div class="grid gap-16 md:grid-cols-2 ">
        @foreach( $ideas as $idea )
            <div class="flex items-center gap-8">
                <div class="w-[164px] h-[164px] flex-grow-0">
                    @if($idea->featured_image?->media )
                        <x-cms-media-image-renderer
                            :media="$idea->featured_image?->media"
                            :curation="$idea->featured_image?->curation"
                            imgClass="w-full h-full object-cover object-center rounded-full"
                        />
                    @endif
                </div>
                <div class="flex-1">
                    <div class="relative prose">
                        <h3 class="break-words">{{ $idea->title }}</h3>
                        @if( $idea->content ?? null )
                            <div class="leading-tight">
                                {!! tiptap_converter()->asText($idea->content) !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
