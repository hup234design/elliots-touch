<x-blocks.wrapper>

        <div class="space-y-16">
        @foreach ($this->options->chunk(2) as $batch)
        <div class="grid md:grid-cols-2 gap-12">
        @foreach($batch as $option)
            <div class="group prose p-6 -m-6 flex flex-col hover:bg-gray-50">
                <h3 class="">
                    {{ $option->title }}
                </h3>
                <div class="relative overflow-hidden aspect-video">
                    <x-media-renderer
                        :data="$option->featured_image"
                        class="mt-0 h-full w-full object-cover object-center group-hover:scale-105"
                        alt="Featured Image of event"
                    />
                </div>
                        {!! $option->content !!}
            </div>
        @endforeach
        </div>
        @endforeach
        </div>
    </div>

</x-blocks.wrapper>
