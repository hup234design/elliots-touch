<x-blocks.wrapper>

    <div class="space-y-16 sm:space-y-16">
        @foreach($this->projects as $project)
            <div class="group lg:grid lg:gap-12 lg:grid-cols-3  p-6 -m-6 hover:bg-gray-50">
                <div>
                    <div class="prose mb-8 lg:hidden">
                        <h3 class="">
                            {{ $project->title }}
                        </h3>
                        @if($project->subtitle)
                            <h4 class="">
                                {{ $project->subtitle }}
                            </h4>
                        @endif
                    </div>
                    <div class="relative overflow-hidden h-96 w-full lg:h-full">
                        <div class="lg:aspect-square">
                            <x-media-renderer
                                :data="$project->featured_image"
                                class="h-full w-full object-cover object-center  transition duration-300 ease-in-out group-hover:scale-105"
                                alt="Featured Image of event"
                            />
                        </div>
                    </div>
                </div>
                <div class="mt-8 lg:col-span-2 lg:mt-0">
                    <div class="prose">
                        <h3 class="hidden lg:block">
                            {{ $project->title }}
                        </h3>
                        @if($project->subtitle)
                            <h4 class="hidden lg:block">
                                {{ $project->subtitle }}
                            </h4>
                        @endif
                        <div x-data="{open: false}">
                            <div x-show="! open">
                                <p>{{ nl2br($project->excerpt) }}</p>
                                <a class="no-underline cursor-pointer hover:text-et-skyblue uppercase"  @click="open = true">Read More</a>
                            </div>
                            <div x-show="open" x-cloak>
                                {!! $project->content !!}
                                <a class="no-underline hover:underline hover:text-et-skyblue uppercase" @click="open = false">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-blocks.wrapper>
