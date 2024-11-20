<x-events-layout>
        <div>
            <h1>{{ $settings->title }}</h1>
            {!! $settings->introduction !!}
            <div class="space-y-8">
            @foreach($events as $event)
                <div class="prose max-w-none">
                <h3>{{ $event->title }}</h3>
                <p>{{ nl2br($event->summary) }}</p>
                </div>
            @endforeach
        </div>
        </div>
</x-events-layout>
