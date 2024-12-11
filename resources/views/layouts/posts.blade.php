<x-app-layout>
    <div class="container">
    <div class="flex gap-12">
        <div class="flex-1">
            {{ $slot }}
        </div>
        <div class="prose max-w-none">
            <h3>Latest Posts</h3>

            <h3>Upcoming Events</h3>
        </div>
    </div>
    </div>

</x-app-layout>
