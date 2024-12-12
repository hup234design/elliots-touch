<x-blocks.wrapper>
    @if( $this->data['include_text'] ?? false)
        <div
            @class([
                'flex flex-col gap-12', // Base layout: stacked columns with a gap
            ])
        >
            <!-- Text Block -->
            <div
                @class([
                    'lg:flex-1 prose', // Take up equal space in row mode, styled as prose
                    'order-2' => in_array($this->data['text_alignment'], ['after']), // Place second when alignment is 'right' or 'after'
                ])
            >
                {!! $this->data['text'] !!}
            </div>

            <!-- Image Block -->
            <div
                @class([
                    'lg:flex-1', // Take up equal space in row mode
                    'order-1' => in_array($this->data['text_alignment'], ['before']), // Place first when alignment is 'before' or 'left'
                ])
            >
                <div class="flex gap-4">
                    @foreach($this->data['images'] ?? [] as $media_id)
                        <div class="flex-1 border aspect-square">
                            <x-media-renderer
                                :data="['media_id' => $media_id]"
                                class="object-cover object-center w-full h-full"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="flex gap-4">
            @foreach($this->data['images'] ?? [] as $media_id)
                <div class="flex-1 border aspect-square">
                    <x-media-renderer
                        :data="['media_id' => $media_id]"
                        class="object-cover object-center w-full h-full"
                    />
                </div>
            @endforeach
        </div>
    @endif
</x-blocks.wrapper>
