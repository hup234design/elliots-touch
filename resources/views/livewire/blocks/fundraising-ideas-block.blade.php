<x-blocks.wrapper>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">

        @foreach( $this->ideas as $idea )
        <div
            class="group flex flex-col overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800 dark:text-gray-100 hover:bg-gray-50"
        >
            <div class="w-full grow p-5 text-center lg:p-6">
                <div class="-mx-2.5 -mt-2.5 mb-5 overflow-hidden rounded-md">
                    <a
                        href="javascript:void(0)"
                        class="block transition duration-200 ease-out hover:scale-110 active:opacity-50"
                    >
                        <div class="aspect-square bg-et-skyblue">
                        <x-media-renderer
                            :data="$idea->featured_image"
                            :alt="$idea->title . ' Photo'"
                            class="w-full h-full object-cover object-center"
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
