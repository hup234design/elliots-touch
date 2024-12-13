<x-events-layout>
    @section('title', $settings->events_page_title)
        <div class="prose max-w-none">
            <h1>{{ $event->title }}</h1>
            <p>{{ format_carbon_date($event->date) }}</p>
            @if( $event->featured_image)
                <x-media-renderer :data="$event->featured_image" class="w-full"/>
            @endif
        </div>

    <div class="mt-8">
        <x-blocks :blocks="$event->content ?? []" />
    </div>
</x-events-layout>
