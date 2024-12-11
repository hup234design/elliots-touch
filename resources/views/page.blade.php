<x-app-layout>

    @section('title', $page->title)

    <div class="container">
        <div class="prose max-w-none">
            <h1 class="sr-only">{{ $page->title }}</h1>

            {{--            {!! tiptap_converter()->asHTML($page->content) !!}--}}
        </div>
    </div>

    <x-blocks :blocks="$page->content ?? []" />

</x-app-layout>
