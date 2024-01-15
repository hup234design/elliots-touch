<x-cms::content-blocks.wrapper>
    @if($blockData['header'])
        <x-cms::blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif
    <div class="mx-auto grid max-w-lg gap-8 lg:max-w-none lg:grid-cols-3">
        <x-cms::event.card />
        <x-cms::event.card />
        <x-cms::event.card />
    </div>
</x-cms::content-blocks.wrapper>
