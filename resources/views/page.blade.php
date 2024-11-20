<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="prose max-w-none">
            <h1>{{ $page->title }}</h1>

            {{--            {!! tiptap_converter()->asHTML($page->content) !!}--}}
        </div>
        <div class="space-y-12 mt-12">
            @foreach($page->content ?? [] as $content_block)
                @livewire('blocks.' . Str::slug($content_block['type']), ['data' => $content_block['data']])
            @endforeach
        </div>

    </div>
</x-app-layout>
