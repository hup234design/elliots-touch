<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
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
