<x-cms-app-layout>

    <x-cms::page-heading :heading="$page->title" />

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

    @if($page->content ?? null)
        {!! tiptap_converter()->asHTML($page->content) !!}
    @endif

{{--    {!! tiptap_converter()->asHTML($page->content) !!}--}}

{{--    @if($page->featured_image?->media )--}}
{{--        @if ($page->featured_image->media->hasCuration( $page->featured_image->curation ))--}}
{{--            <x-curator-curation :media="$page->featured_image->media" :curation="$page->featured_image->curation" class="mx-auto"/>--}}
{{--        @else--}}
{{--            <x-curator-glider--}}
{{--                class="w-full"--}}
{{--                :media="$page->featured_image->media"--}}
{{--            />--}}
{{--        @endif--}}
{{--    @endif--}}



{{--    @foreach($page->blocks ?? [] as $block)--}}
{{--        @switch($block['type'])--}}
{{--            @case('images')--}}
{{--                <div class="mt-8">--}}
{{--                    <div class="grid grid-cols-3 gap-4">--}}
{{--                        @foreach($block['data']['media_ids'] ?? [] as $mediaId)--}}
{{--                            <x-curator-glider--}}
{{--                                class="aspect-square object-cover w-full h-full"--}}
{{--                                :media="$mediaId"--}}
{{--                            />--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @break--}}
{{--        @endswitch--}}
{{--    @endforeach--}}

</div>

</div>
<x-cms::content-blocks :blocks="$page->blocks" />
</x-cms-app-layout>
