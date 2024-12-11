<x-app-layout>
    <div class="container">
        <div class="flex flex-col gap-16 lg:flex-row">
            <div class="flex-1">
                {{ $slot }}
            </div>
            <div class="container lg:w-64">
                <div class="prose max-w-none">
                    <h3>Latest News</h3>
                    <h3>Upcoming Events</h3>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
