<x-cms-events-layout>

    <x-cms::page-heading
        title="EVENTS"
        :heading="$event->title"
    />

    <div class="prose max-w-none">
        <h1>{{ $event->title }}</h1>

        @if($event->featured_image?->media )

            @if ($event->featured_image->media->hasCuration( $event->featured_image->curation ?? "" ))
                <x-curator-curation :media="$post->featured_image->media" :curation="$post->featured_image->curation" class="mx-auto"/>
            @else
                <x-curator-glider
                    class="w-full"
                    :media="$event->featured_image->media"
                />
            @endif
        @endif

        @if( $event->content )
            {!! tiptap_converter()->asHTML($event->content) !!}
        @endif
    </div>

</x-cms-events-layout>

{{--    <div class="prose max-w-none">--}}
{{--        <h1>{{ $event->title }}</h1>--}}

{{--        @if($event->featured_image?->media )--}}
{{--            @if ($event->featured_image->media->hasCuration( $event->featured_image->curation ?? "" ))--}}
{{--                <x-curator-curation :media="$event->featured_image->media" :curation="$event->featured_image->curation" class="mx-auto"/>--}}
{{--            @else--}}
{{--                <x-curator-glider--}}
{{--                    class="w-full"--}}
{{--                    :media="$event->featured_image->media"--}}
{{--                />--}}
{{--            @endif--}}
{{--        @endif--}}

{{--        @if( $event->content )--}}
{{--            {!! tiptap_converter()->asHTML($event->content) !!}--}}
{{--        @endif--}}

{{--        <div class="my-16">--}}
{{--            <a href="{{ route('events.index') }}">&larr; back</a>--}}
{{--        </div>--}}

{{--    </div>--}}
