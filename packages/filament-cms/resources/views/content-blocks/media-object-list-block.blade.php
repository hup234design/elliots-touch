<div>
    @if($blockData['header'] ?? null)
        <x-cms::content-blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif
    <div class="space-y-24 md:space-y-12">
        @foreach($blockData['media_objects'] ?? [] as $mediaObject )
            <x-cms::media-object :mediaObject="$mediaObject"/>
        @endforeach
    </div>
</div>
