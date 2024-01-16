<x-cms::content-blocks.wrapper>
    @if($blockData['header'])
        <x-cms::content-blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif
    <div class="mx-auto grid max-w-lg gap-8 lg:max-w-none lg:grid-cols-3">

        @foreach($events as $event)
            <div>
                <div class="relative h-64 mb-6">
                    <x-cms::media-image-renderer :media="$event->featured_image?->media" />
                </div>
                <span class="text-xs font-bold text-gray-500">
                    {{ $event->date->format('Y-m-d') }}
                </span>
                <h2 class="mt-2 mb-2 text-3xl font-bold font-heading">
                    {{ $event->title }}
                </h2>
                <p class="mb-4 text-gray-500">
                    {{ nl2br($event->summary) }}
                </p>
                <a
                    class="flex items-center text-lg font-bold text-gray-500 hover:text-gray-700"
                    href="{{ route('events.event', $event->slug) }}"
                >
                    <span>Read more</span>
                    <span>
                        <svg class="ml-1 w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </a>
            </div>
        @endforeach

    </div>
</x-cms::content-blocks.wrapper>
