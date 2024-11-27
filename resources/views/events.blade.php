<x-events-layout>

    @section('title', $settings->events_page_title)

    <div>
        <h1>{{ $settings->events_page_title }}</h1>
        {!! $settings->events_page_introduction !!}
        <div class="space-y-8">
            @foreach($events as $event)
                <div class="prose max-w-none">
                    <h3>{{ $event->title }}</h3>
                    <p>{{ nl2br($event->summary) }}</p>
                    <a href="{{ route('events.event', $event->slug) }}">Read more</a>
                </div>
            @endforeach
        </div>
    </div>
</x-events-layout>
