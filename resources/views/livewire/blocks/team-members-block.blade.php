<x-blocks.wrapper>
    <div class="bg-white">
        <div
            class=""
        >
            <!-- Team -->
            <div class="grid grid-cols-1 gap-20 sm:grid-cols-2 md:gap-12 lg:gap-20">
                @foreach($this->teamMembers as $teamMember)
                    <div class="group space-y-4 lg:flex lg:gap-6 lg:space-y-0">
                        <div class="flex-none lg:w-2/5 overflow-hidden">
                        <div class="aspect-square overflow-hidden lg:rounded-full ">
                            <x-media-renderer
                                :data="$teamMember->profile_image"
                                class="object-cover object-center w-full h-full transition duration-300 ease-in-out group-hover:scale-105 lg:rounded-full"
                            />
                        </div>
                        </div>
                        <div class="prose">
                            <h3 class="mt-0">
                                {{ $teamMember->name }}
                            </h3>
                            <p class="mt-0 font-semibold text-et-navy">
                                {{ $teamMember->role }}
                            </p>
                            <p>
                                {{ nl2br($teamMember->bio) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END Team -->
        </div>
    </div>
</x-blocks.wrapper>
