<x-cms-posts-layout>

    <x-cms::page-heading
        title="POSTS"
        :heading="$post->title"
    />

    <div class="py-24 bg-red-900 text-center text-xl font-bold text-white">
        <span>
            POST
        </span>
    </div>

    {{--    <div class="prose max-w-none">--}}
    {{--        <h1>{{ $post->title }}</h1>--}}

    {{--        @if($post->featured_image?->media )--}}
    {{--            @if ($post->featured_image->media->hasCuration( $post->featured_image->curation ?? "" ))--}}
    {{--                <x-curator-curation :media="$post->featured_image->media" :curation="$post->featured_image->curation" class="mx-auto"/>--}}
    {{--            @else--}}
    {{--                <x-curator-glider--}}
    {{--                    class="w-full"--}}
    {{--                    :media="$post->featured_image->media"--}}
    {{--                />--}}
    {{--            @endif--}}
    {{--        @endif--}}

    {{--        @if( $post->content )--}}
    {{--            {!! tiptap_converter()->asHTML($post->content) !!}--}}
    {{--        @endif--}}

    <div class="my-16">
        <a href="{{ route('posts.index') }}">&larr; back</a>
    </div>

    {{--    </div>--}}

</x-cms-posts-layout>
