<div>
    <!-- Team Section: Vertical Photos with Details -->
    <div class="bg-white dark:bg-gray-900 dark:text-gray-100">
        <div
            class=""
        >


            <!-- Team -->
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 md:gap-20">
                @foreach($this->teamMembers as $teamMember)
                <div class="space-y-4 lg:flex lg:gap-6 lg:space-y-0">
                    <div class="flex-none aspect-square lg:w-2/5">
                        <x-media-renderer
                            :data="$teamMember->profile_image"
                            class="object-cover object-center w-full h-full"
                        />
                    </div>
                    <div class="prose">
{{--                        <h4 class="mb-0.5 text-xl font-bold">--}}
                        <h3 class="">
                            {{ $teamMember->name }}
                        </h3>
{{--                        <p class="mb-3 font-medium text-gray-600 dark:text-gray-400">--}}
                        <p class="">
                            {{ $teamMember->role }}
                        </p>
{{--                        <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-400">--}}
                        <div class="leading-tight">
{!! $teamMember->bio !!}
                        </div>
{{--                        </p>--}}
</div>
</div>
@endforeach
</div>
<!-- END Team -->
</div>
</div>
<!-- END Team Section: Vertical Photos with Details -->

</div>
