<x-app-layout>

    @section('heading')
    <div class="bg-et-skyblue lg:py-8 -mx-8">

        <div class="relative container">
            <div class="lg:h-96">
                <div class="hidden lg:block absolute left-0 w-1/4 h-full">
                    <div class="w-full h-full flex flex-col items-center justify-center">
                        <div class="w-full aspect-square rounded-full overflow-hidden">
                            <x-curator-glider
                                class="object-cover object-center w-full h-full rounded-full"
                                :media="$settings->home_banner_left_image"
                            />
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block absolute right-0 w-1/4 h-full">
                    <div class="w-full h-full flex flex-col items-center justify-center">
                        <div class="w-full aspect-square rounded-full overflow-hidden">
                            <x-curator-glider
                                class="object-cover object-center w-full h-full rounded-full"
                                :media="$settings->home_banner_right_image"
                            />
                        </div>
                    </div>
                </div>
                <div class="relative mx-auto h-full bg-gray-100  lg:rounded-full lg:w-[60%] ">
                    <x-curator-glider
                        class="object-cover object-center w-full h-full lg:rounded-full"
                        :media="$settings->home_banner_center_image"
                    />
                </div>
            </div>
        </div>

    </div>
    @endsection
    <div class="container py-6">

        <div class="grid grid-cols-2">
        <div class="prose xl:prose-lg xl:leading-snug">
            <h2 class="font-headline ">{{ $settings->home_intro_title }}</h2>
            {!! $settings->home_intro_text !!}
{{--            <div class="space-y-12 mt-12">--}}
{{--                @foreach($settings->content_blocks as $content_block)--}}
{{--                    @livewire('content-blocks.' . Str::slug($content_block['type']), ['data' => $content_block['data']])--}}
{{--                @endforeach--}}
{{--            </div>--}}
        </div>
        </div>

        <div class="space-y-12 mt-12">
            @foreach($settings->home_content_blocks ?? [] as $content_block)
                @livewire('blocks.' . Str::slug($content_block['type']), ['data' => $content_block['data']])
            @endforeach
        </div>
    </div>
    </main>
</x-app-layout>
