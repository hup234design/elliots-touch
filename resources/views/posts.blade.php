<x-posts-layout>

        <div class="">
            <h1>{{ $settings->title }}</h1>
            {!! $settings->introduction !!}
            <div class="space-y-8">
            @foreach($posts as $post)
                <div class="prose max-w-none">
                <h3>{{ $post->title }}</h3>
                <p>{{ nl2br($post->summary) }}</p>
                <a href="{{ route('posts.post', $post->slug) }}">Read more</a>
                </div>
            @endforeach
            </div>
        </div>

</x-posts-layout>
