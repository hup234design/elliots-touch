<x-app-layout>

    <div class="bg-et-skyblue lg:py-8 -mx-8">

        <div class="relative container">
            <div class="lg:h-96">
                <div class="hidden lg:block absolute left-0 w-1/4 h-full">
                    <div class="w-full h-full flex flex-col items-center justify-center">
                        <div class="w-full aspect-square rounded-full overflow-hidden">
                            <x-curator-glider
                                class="object-cover object-center w-full h-full rounded-full"
                                :media="$settings->banner_left_image"
                            />
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block absolute right-0 w-1/4 h-full">
                    <div class="w-full h-full flex flex-col items-center justify-center">
                        <div class="w-full aspect-square rounded-full overflow-hidden">
                            <x-curator-glider
                                class="object-cover object-center w-full h-full rounded-full"
                                :media="$settings->banner_right_image"
                            />
                        </div>
                    </div>
                </div>
                <div class="relative mx-auto h-full bg-gray-100  lg:rounded-full lg:w-[60%] ">
                    <x-curator-glider
                        class="object-cover object-center w-full h-full lg:rounded-full"
                        :media="$settings->banner_center_image"
                    />
                </div>
            </div>
        </div>

    </div>

    <div class="container py-6">


        <div class="prose max-w-none">
            <h1>{{ $settings->intro_title }}</h1>
            {!! $settings->intro_text !!}
{{--            <div class="space-y-12 mt-12">--}}
{{--                @foreach($settings->content_blocks as $content_block)--}}
{{--                    @livewire('content-blocks.' . Str::slug($content_block['type']), ['data' => $content_block['data']])--}}
{{--                @endforeach--}}
{{--            </div>--}}

            <h2>{{ $settings->events_title }}</h2>

            <h2>{{ $settings->posts_title }}</h2>
        </div>
    </div>
    </main>
</x-app-layout>
