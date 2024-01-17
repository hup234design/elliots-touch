<x-cms-app-layout>

    <x-cms::page-heading :heading="$page->title"/>

    <div class="max-w-7xl mx-auto px-8">
        <div class="prose max-w-none">
            <h1 class="mt-0">{{ $page->title }}</h1>
            @if( $page->content ?? null )
                {!! tiptap_converter()->asHTML($page->content) !!}
            @endif
        </div>
    </div>
    <x-cms::content-blocks :blocks="$page->blocks" />
</x-cms-app-layout>
