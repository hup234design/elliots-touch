<x-blocks.wrapper>
    @if( $this->data['include_text'] ?? false)
        <div
            @class([
                'flex flex-col gap-12', // Base layout: stacked columns with a gap
                'lg:flex-row' => in_array($this->data['text_alignment'], ['left', 'right']), // Row layout for 'left' and 'right'
            ])
        >
            <!-- Text Block -->
            <div
                @class([
                    'lg:flex-1 prose', // Take up equal space in row mode, styled as prose
                    'order-2' => in_array($this->data['text_alignment'], ['right', 'after']), // Place second when alignment is 'right' or 'after'
                ])
            >
                {!! $this->data['text'] !!}
            </div>

            <!-- Image Block -->
            <div
                @class([
                    'lg:flex-1', // Take up equal space in row mode
                    'order-1' => in_array($this->data['text_alignment'], ['before', 'left']), // Place first when alignment is 'before' or 'left'
                ])
            >
                <x-matinee::embed :data="$this->data['video']" />
            </div>
        </div>

    @else
        <x-matinee::embed :data="$this->data['video']" />
    @endif
</x-blocks.wrapper>
