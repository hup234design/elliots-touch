<x-events-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="prose max-w-none">
            <h1>{{ $event->title }}</h1>
            {!! $event->content !!}

            @if( $event->image)
                {{--                <div>--}}
                <x-media-renderer :data="$event->image" class="w-full"/>
                {{--                </div>--}}
            @endif

            {{--            @if( $post->featuredImage)--}}
            {{--                <div>--}}
            {{--                    <p>Featured Image</p>--}}
            {{--                <x-mediable-renderer--}}
            {{--                    :mediable="$post->featuredImage"--}}
            {{--                    class="w-full"--}}
            {{--                />--}}
            {{--                </div>--}}
            {{--            @endif--}}
        </div>
    </div>
</x-events-layout>
