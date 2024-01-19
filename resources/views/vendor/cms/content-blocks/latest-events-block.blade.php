<div>
    @if($blockData['header'])
        <x-cms::content-blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif
    <div class="mx-auto grid max-w-lg gap-8 lg:max-w-none lg:grid-cols-3">
        @foreach($events as $event)
            <div class="relative group bg-gray-50">
                <div class="aspect-video  overflow-hidden">
                    <x-cms-media-image-renderer
                        :media="$event->featured_image?->media"
                        :curation="$event->featured_image?->media_curation"
                        preset="thumbnail"
                        imgClass="w-full h-full object-cover transform transition duration-300 group-hover:scale-125"
                    />
                </div>
                <div class="absolute top-0 left-0 ml-6 mt-6">
                    <div class="absolute h-full w-full border-2 border-white m-2 bg-white/40"></div>
                    <div class="relative text-white bg-brand-crimson leading-none text-center p-4">
                        <p class="text-sm font-extrabold">{{ $event->date->format('l jS F') }}</p>
                    </div>
                </div>
                <div class="p-8">
{{--                    <div class="bg-gray-50 text-brand-skyblue px-4 py-2 mb-4 font-extrabold">--}}
{{--                        {{ $event->date->format('l jS F') }}--}}
{{--                    </div>--}}
                    <h3 class="font-serif text-2xl mb-4 font-bold">{{ $event->title }}</h3>
                    <p class="line-clamp-4">{{ nl2br($event->summary) }}</p>
                    <div class="mt-12 ">
                        <a
                            href="{{ route('events.event', $event->slug) }}"
                            class="bg-brand-skyblue rounded-xl px-4 py-2 text-white font-semibold hover:bg-brand-blue transition-all duration-300"
                        >
                            Read More &rarr;
                        </a>
                    </div>
                </div>
            </div>
{{--            <div>--}}
{{--                <div class="relative h-64 mb-6">--}}
{{--                    <x-cms-media-image-renderer--}}
{{--                        :media="$event->featured_image?->media"--}}
{{--                        :curation="$event->featured_image?->media_curation"--}}
{{--                        preset="thumbnail"--}}
{{--                        imgClass="w-full h-full rounded-lg object-cover"--}}
{{--                    />--}}
{{--                </div>--}}
{{--                <span class="text-xs font-bold text-gray-500">--}}
{{--                    {{ $event->date->format('Y-m-d') }}--}}
{{--                </span>--}}
{{--                <h2 class="mt-2 mb-2 text-3xl font-bold">--}}
{{--                    {{ $event->title }}--}}
{{--                </h2>--}}
{{--                <p class="mb-4 text-gray-500">--}}
{{--                    {{ nl2br($event->summary) }}--}}
{{--                </p>--}}
{{--                <a--}}
{{--                    class="flex items-center text-lg font-bold text-gray-500 hover:text-gray-700"--}}
{{--                    href="{{ route('events.event', $event->slug) }}"--}}
{{--                >--}}
{{--                    <span>Read more</span>--}}
{{--                    <span>--}}
{{--                        <svg class="ml-1 w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>--}}
{{--                        </svg>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            </div>--}}
        @endforeach
    </div>
</div>
