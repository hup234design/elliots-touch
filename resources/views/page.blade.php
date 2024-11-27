<x-app-layout>

    @section('title', $page->title)

    <div class="container">
        <div class="prose max-w-none">
            <h1 class="sr-only">{{ $page->title }}</h1>

            {{--            {!! tiptap_converter()->asHTML($page->content) !!}--}}
        </div>
        <div class="space-y-12 mt-12">
            @foreach($page->content ?? [] as $content_block)
                @livewire('blocks.' . Str::slug($content_block['type']), ['data' => $content_block['data']])
            @endforeach
        </div>

    </div>
</x-app-layout>
