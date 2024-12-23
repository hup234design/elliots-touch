<x-blocks.wrapper>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">

        @foreach( $this->ideas as $idea )
        <div
            class="group flex flex-col overflow-hidden rounded-lg bg-white"
        >
            <div class="w-full grow p-5 text-center lg:p-6">
                <div class="-mx-2.5 -mt-2.5 mb-5 overflow-hidden rounded-md">
                    <a
                        href="javascript:void(0)"
                        class="block"
                    >
                        <div class="aspect-square bg-et-skyblue rounded-full overflow-hidden">
                        <x-media-renderer
                            :data="$idea->featured_image"
                            :alt="$idea->title . ' Photo'"
                            class="w-full h-full object-cover object-center rounded-full transition duration-200 ease-out group-hover:scale-105"
                        />
                        </div>
                    </a>
                </div>
                <h3 class="mb-1 text-lg font-semibold">
                    {{ $idea->title }}
                </h3>
            </div>
        </div>
            @endforeach
    </div>
    <!-- END Cards in Grid: People -->

</x-blocks.wrapper>
