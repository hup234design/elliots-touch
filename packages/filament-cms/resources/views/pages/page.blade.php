<x-cms-app-layout>

    <x-cms::page-heading :heading="$page->title"/>

{{--    @section('heading')--}}
{{--        --}}{{--@parent--}}
{{--        <div class="h-40 bg-blue-500"></div>--}}
{{--    @endsection--}}

    <div class="max-w-7xl mx-auto px-8">
        <div class="prose max-w-none">
            <h1>{{ $page->title }}</h1>
            @if($page->featured_image?->media )
                @if ($page->featured_image->media->hasCuration( $page->featured_image->curation ?? "" ))
                    <x-curator-curation :media="$page->featured_image->media" :curation="$page->featured_image->curation" class="mx-auto"/>
                @else
                    <x-curator-glider
                        class="w-full"
                        :media="$page->featured_image->media"
                    />
                @endif
            @endif
            @if( $page->content ?? null )
                {!! tiptap_converter()->asHTML($page->content) !!}
            @endif
        </div>
    </div>
    <x-cms::content-blocks :blocks="$page->blocks" />
</x-cms-app-layout>
