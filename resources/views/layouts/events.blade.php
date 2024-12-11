<x-app-layout>
    <div class="container">
        <div class="flex flex-col gap-12 lg:flex-row">
            <div class="flex-1">
                {{ $slot }}
            </div>
            <div class="container lg:w-72">
                <div class="prose max-w-none">
                    @if( $upcomingEvents->count() > 0)
                        <h3 class="font-headline text-et-skyblue">Upcoming Events</h3>
                        <div class="space-y-6">
                            @foreach($upcomingEvents as $upcomingEvent)
                                <div>
                                    <p class="prose-sm mb-0">{{ format_carbon_date($upcomingEvent->date) }}</p>
                                    <h4 class="mt-1 leading-tight">
                                        <a class="no-underline font-semibold text-et-skyblue-700" href="{{ route('events.event', $upcomingEvent->slug) }}">
                                            {{ $upcomingEvent->title }}
                                        </a>
                                    </h4>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if( $latestPosts->count() > 0)
                        <h3 class="font-headline text-et-skyblue">Latest News</h3>
                            <div class="space-y-6">
                        @foreach($latestPosts as $latestPost)
                                    <div>
                            <p class="prose-sm mb-0">{{ format_carbon_date($latestPost->published_at) }}</p>
                            <h4 class="mt-1 leading-tight">
                                <a class="no-underline font-semibold text-et-skyblue-700" href="{{ route('posts.post', $latestPost->slug) }}">
                                    {{ $latestPost->title }}
                                </a>
                            </h4>
                                    </div>
                        @endforeach
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
