<x-posts-layout>

    @section('title', $settings->posts_page_title)
{{--    @section('subtitle', $settings->posts_page_introduction)--}}

        <div class="">
            {!! $settings->posts_page_introduction !!}
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
