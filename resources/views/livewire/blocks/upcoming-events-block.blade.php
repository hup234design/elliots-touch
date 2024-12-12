<x-blocks.wrapper>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-12">
        @foreach($this->events as $event)
            <div
                class="group clickable flex flex-col overflow-hidden rounded-lg bg-white dark:bg-gray-800"
            >
                    <div class="h-48">
                        <x-media-renderer
                            :data="$event->featured_image"
                            class="object-cover object-center w-full h-full transition duration-300 ease-in-out group-hover:scale-105"
                            :alt="$event->title . ' Featured Image'"
                        />
                    </div>
                <div class="py-6 prose">
                    <h2 class="mb-2 text-lg sm:text-xl">
                        <a
                            href="{{ route('events.event', $event->slug) }}"
                            class="not-prose text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400"
                        >
                            {{ $event->title }}
                        </a>
                    </h2>
                    <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">
                        {{ format_carbon_date($event->date) }}
                    </p>
                    {{--                        <p class="leading-relaxed text-gray-600 dark:text-gray-400">--}}
                    <p class="">
                        {{ nl2br($event->summary) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</x-blocks.wrapper>
