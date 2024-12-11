<x-posts-layout>
    @section('title', $settings->posts_page_title)
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="prose max-w-none">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->published_at }}</p>
            @if( $post->featured_image)
                <x-media-renderer :data="$post->featured_image" class="w-full"/>
            @endif
            {!! $post->content !!}
        </div>
    </div>
</x-posts-layout>
