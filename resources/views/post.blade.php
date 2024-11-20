<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="prose max-w-none">
            <h1>{{ $post->title }}</h1>
            {!! $post->content !!}

            @if( $post->image)
{{--                <div>--}}
                    <x-media-renderer :data="$post->image" class="w-full"/>
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
    </div>
    </main>
</x-app-layout>
