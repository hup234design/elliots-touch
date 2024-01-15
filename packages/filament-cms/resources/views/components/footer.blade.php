<footer class="bg-gray-300 py-16 flex flex-col justify-center items-center mt-12 space-y-8">

    <div class="text-center">
        <a href="{{ route('home') }}" class="font-bold text-xl">
            {{ config('app.name') }}
        </a>
    </div>

    <ul class="flex items-center font-medium text-sm gap-12">
        @foreach($pageLinks as $slug=>$title)
            <li><a href="{{ route('page', $slug) }}">{{ $title }}</a></li>
        @endforeach
        <li><a href="{{ route('events.index') }}">Events</a></li>
        <li><a href="{{ route('posts.index') }}">Posts</a></li>
    </ul>

    <p class="text-sm">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </p>
</footer>
