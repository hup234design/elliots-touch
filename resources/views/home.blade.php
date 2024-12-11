<x-app-layout>

    @section('heading')

        <div class="bg-et-skyblue py-6">

            <div class="container">
                <div class="relative h-96">
                    <div class="hidden absolute left-0 w-1/4 h-full lg:block">
                        <div class="w-full h-full flex flex-col items-center justify-center">
                            <div class="w-full aspect-square rounded-full overflow-hidden">

                                <x-media-renderer
                                    :data="['media_id' => 3]"
                                    class="h-full w-full object-cover object-center   rounded-full"
                                />

{{--                                <img src="https://elliotstouch.hup234design.com/storage/media/clutch-finger.jpg" class="h-full w-full object-cover object-center   rounded-full">--}}

                            </div>
                        </div>
                    </div>
                    <div class="hidden absolute right-0 w-1/4 h-full lg:block">
                        <div class="w-full h-full flex flex-col items-center justify-center">
                            <div class="w-full aspect-square rounded-full overflow-hidden">
                                <x-media-renderer
                                    :data="['media_id' => 14]"
                                    class="h-full w-full object-cover object-center   rounded-full"
                                />
{{--                                <img src="https://elliotstouch.hup234design.com/storage/media/elliots-touch-hi-viz.jpg" class="h-full w-full object-cover object-center   rounded-full">--}}

                            </div>
                        </div>
                    </div>
                    <div class="relative mx-auto h-full bg-gray-100 lg:w-[60%] lg:rounded-full">
                        <x-media-renderer
                            :data="['media_id' => 7]"
                            class="h-full w-full object-cover object-center   lg:rounded-full"
                        />
{{--                        <img src="https://elliotstouch.hup234design.com/storage/media/elliot.jpg" class="h-full w-full object-cover object-center   rounded-full">--}}

                    </div>
                </div>
            </div>

        </div>

    @endsection

    {{-- <div class="bg-et-skyblue lg:py-8 -mx-8"> --}}

{{--        <div class="relative container">--}}
{{--            <div class="lg:h-96">--}}
{{--                <div class="hidden lg:block absolute left-0 w-1/4 h-full">--}}
{{--                    <div class="w-full h-full flex flex-col items-center justify-center">--}}
{{--                        <div class="w-full aspect-square rounded-full overflow-hidden">--}}
{{--                            <x-curator-glider--}}
{{--                                class="object-cover object-center w-full h-full rounded-full"--}}
{{--                                :media="$page->home_banner_left_image"--}}
{{--                            />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="hidden lg:block absolute right-0 w-1/4 h-full">--}}
{{--                    <div class="w-full h-full flex flex-col items-center justify-center">--}}
{{--                        <div class="w-full aspect-square rounded-full overflow-hidden">--}}
{{--                            <x-curator-glider--}}
{{--                                class="object-cover object-center w-full h-full rounded-full"--}}
{{--                                :media="$settings->home_banner_right_image"--}}
{{--                            />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="relative mx-auto h-full bg-gray-100  lg:rounded-full lg:w-[60%] ">--}}
{{--                    <x-curator-glider--}}
{{--                        class="object-cover object-center w-full h-full lg:rounded-full"--}}
{{--                        :media="$settings->home_banner_center_image"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    {{-- </div> --}}
    {{-- @endsection --}}

{{--        <div class="container py-6">--}}

{{--        <div class="grid grid-cols-2">--}}
{{--        <div class="prose xl:prose-lg xl:leading-snug">--}}
{{--            <h2 class="font-headline ">{{ $settings->home_intro_title }}</h2>--}}
{{--            {!! $settings->home_intro_text !!}--}}
{{--            <div class="space-y-12 mt-12">--}}
{{--                @foreach($settings->content_blocks as $content_block)--}}
{{--                    @livewire('content-blocks.' . Str::slug($content_block['type']), ['data' => $content_block['data']])--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}

        <x-blocks :blocks="$page->content ?? []" />


    {{-- </main> --}}
</x-app-layout>
