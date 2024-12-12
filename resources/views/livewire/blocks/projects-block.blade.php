<x-blocks.wrapper>

    <div class="space-y-8 sm:space-y-16">
        @foreach($this->projects as $project)
            <div class="group lg:grid lg:gap-12 lg:grid-cols-3  p-6 -m-6 hover:bg-gray-50">
                <div class="relative overflow-hidden h-96 w-full lg:h-full">
                    <div class="lg:aspect-square">
                        <x-media-renderer
                            :data="$project->featured_image"
                            class="h-full w-full object-cover object-center  transition duration-300 ease-in-out group-hover:scale-105"
                            alt="Featured Image of event"
                        />
                    </div>
                </div>
                <div class="mt-4 lg:col-span-2 lg:mt-0">
                    <div class="prose">
                        <h3 class="">
                            {{ $project->title }}
                        </h3>
                        {!! $project->content !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-blocks.wrapper>
