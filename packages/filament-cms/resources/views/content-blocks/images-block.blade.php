<div>
    @if($blockData['header'])
        <x-cms::content-blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif

    @switch( $blockData['format'] )
        @case('strip')
            <x-cms::images.strip :images="$images" />
            @break
        @case('grid')
            <x-cms::images.grid :images="$images" />
            @break
    @endswitch

</div>
