<x-cms-app-layout>
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex">
            <div class="flex-1">
                {{ $slot }}
            </div>
            <div class="w-64 ml-8 border-l border-gray-400 p-8">
                <div class="prose">
                    <h3>Categories</h3>
                    @foreach($event_categories as $event_category)
                        <p>
                            <a href="{{ route('events.category', $event_category->slug) }}">
                                {{ $event_category->title }}
                            </a>
                            <span class="ml-2">({{ $event_category->events_count }})</span>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-cms-app-layout>
