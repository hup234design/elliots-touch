<x-cms::content-blocks.wrapper>
    @if($blockData['header'])
        <x-cms::blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif

    @switch( $blockData['format'] )
        @case('strip')
            <x-cms::media.strip :images="$images" />
            @break
        @case('grid')
            <x-cms::media.grid :images="$images" />
            @break
    @endswitch

</x-cms::content-blocks.wrapper>
