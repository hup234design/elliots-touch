<x-blocks.wrapper>

    <div class="columns-1 sm:columns-2 lg:columns-3 gap-4">

        @foreach($this->partners as $partner)
        <div class="group break-inside-avoid pb-4 hover:bg-gray-50">
            <div class="border-2 p-4">
                <x-media-renderer
                    :data="$partner->logo"
                    class="not-prose bg-white w-full"
                />
                <div class="prose">
                    <h3>
                        {{ $partner->name }}
                    </h3>
                {!! $partner->description !!}
                @if( $partner->url)
                    <p class="truncate">
                        <a href="{{ $partner->url }}" target="_blank">{{ $partner->url }}</a>
                    </p>
                @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>
</x-blocks.wrapper>
