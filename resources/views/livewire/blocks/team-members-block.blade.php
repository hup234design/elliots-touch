<x-blocks.wrapper>
    <div class="bg-white dark:bg-gray-900 dark:text-gray-100">
        <div
            class=""
        >
            <!-- Team -->
            <div class="grid grid-cols-1 gap-20 sm:grid-cols-2 md:gap-12 lg:gap-20">
                @foreach($this->teamMembers as $teamMember)
                    <div class="group space-y-4 lg:flex lg:gap-6 lg:space-y-0">
                        <div class="flex-none lg:w-2/5 overflow-hidden">
                        <div class="aspect-square rounded-full overflow-hidden">
                            <x-media-renderer
                                :data="$teamMember->profile_image"
                                class="object-cover object-center w-full h-full rounded-full transition duration-300 ease-in-out group-hover:scale-105"
                            />
                        </div>
                        </div>
                        <div class="prose">
                            {{--                        <h4 class="mb-0.5 text-xl font-bold">--}}
                            <h3 class="mt-0">
                                {{ $teamMember->name }}
                            </h3>
                            {{--                        <p class="mb-3 font-medium text-gray-600 dark:text-gray-400">--}}
                            <p class="mt-0 font-semibold text-et-navy">
                                {{ $teamMember->role }}
                            </p>
                            {{--                        <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-400">--}}
                            <p>
                                {{ nl2br($teamMember->bio) }}
                            </p>
                            {{--                        </p>--}}
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END Team -->
        </div>
    </div>
</x-blocks.wrapper>
