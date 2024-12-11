<x-blocks.wrapper>

    <div class="space-y-8 sm:space-y-16">
        @foreach($this->options as $option)
            <div class="group p-6 -m-6 lg:grid lg:gap-12 lg:grid-cols-3 hover:bg-gray-50">
                <div class="relative overflow-hidden h-96 w-full lg:h-full bg-red-900">
                    <div class="absolute inset-0">
                    <x-media-renderer
                        :data="$option->featured_image"
                        class="h-full w-full object-cover object-center group-hover:scale-105"
                        alt="Featured Image of event"
                    />
                    </div>
                </div>
                <div class="lg:col-span-2 lg:py-4">
                    <div class="prose min-h-64 flex flex-col justify-center">
                        <h3 class="">
                            {{ $option->title }}
                        </h3>
                        {!! $option->content !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-blocks.wrapper>
