<x-cms-app-layout>

{{--    <x-cms::page-heading :heading="$page->title" />--}}

    @section('heading')
{{--    <section class="bg-brand-crimson" style="height: 640px;">--}}
{{--            <div class="h-full max-w-7xl mx-auto p-8 flex justify-between items-center">--}}
{{--                <div class="w-1/2">text</div>--}}
{{--                <div class="w-1/2 h-full grid grid-rows-4 grid-cols-4 gap-8">--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                    <div class="bg-white"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--    </section>--}}


{{--        <div class="relative max-w-7xl mx-auto">--}}
{{--        <div class="my-3" x-data="{ activeSlide: 1, slides: [1, 2, 3] }">--}}
{{--            <div class="relative">--}}
{{--                <!-- Slides -->--}}
{{--                <div x-show="activeSlide === 1">--}}
{{--                    <div class="h-64 bg-red-900 w-full"></div>--}}
{{--                </div>--}}
{{--                <div x-show="activeSlide === 2">--}}
{{--                    <img src="http://elliotstouch.hup234design.co.uk/storage/media/elliot.jpg" class="w-full h-auto" />--}}
{{--                </div>--}}
{{--                <div x-show="activeSlide === 3">--}}
{{--                    <div class="h-64 bg-green-900 w-full"></div>--}}
{{--                </div>--}}
{{--                <!-- Prev/Next arrow buttons -->--}}
{{--                <div class="box flex flex-space-between flex-middle">--}}
{{--                    <button class="b-0 unrounded btn-icon bg-color-transparent cursor-pointer" x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">--}}
{{--                        <x-heroicon-s-chevron-left class="w-16 h-16 text-black" />--}}
{{--                    </button>--}}
{{--                    <button class="b-0 unrounded btn-icon bg-color-transparent cursor-pointer" x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">--}}
{{--                        <x-heroicon-s-chevron-right class="w-16 h-16 text-black" />--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Indicator buttons -->--}}
{{--            <div class="flex flex-center px-3">--}}
{{--                <template x-for="slide in slides" :key="slide">--}}
{{--                    <button style="width: 2rem; height: 2rem" class="rounded-full b-thin mx-1 cursor-pointer" :class="{--}}
{{--        'bg-red-900': activeSlide === slide,--}}
{{--        ' bg-gray-200': activeSlide !== slide--}}
{{--      }" x-on:click="activeSlide = slide"></button>--}}
{{--                </template>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}

    <div class="bg-brand-crimson">
        <div class="max-w-7xl mx-auto">
            <div class="border-x-8 border-white">
                    <div class="glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <div class="w-full h-[640px]">
                                        <img src="http://elliotstouch.hup234design.co.uk/storage/media/elliot.jpg" class="w-full h-full object-cover object-center" />
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="w-full h-[640px]">
                                        <img src="http://elliotstouch.hup234design.co.uk/storage/media/elliots-touch-at-gosh.jpg" />
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="w-full h-[640px]">
                                        <img src="http://elliotstouch.hup234design.co.uk/storage/media/silent-disco.jpg" class="w-full h-full object-cover object-center" />
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="w-full h-[640px]">
                                        <img src="http://elliotstouch.hup234design.co.uk/storage/media/brompton-pic.jpg" class="w-full h-full object-cover object-center" />
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div class="w-full h-[640px]">
                                        <img src="http://elliotstouch.hup234design.co.uk/storage/media/donation-cheque.jpg" class="w-full h-full object-cover object-center" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                        {{--            <div data-glide-el="controls">--}}
                        {{--                <button data-glide-dir="<<">Start</button>--}}
                        {{--                <button data-glide-dir=">>">End</button>--}}
                        {{--            </div>--}}
                        <div class="glide__bullets" data-glide-el="controls[nav]" class="isolate">
                            <button class="glide__bullet h-4 w-4" data-glide-dir="=0"></button>
                            <button class="glide__bullet h-4 w-4" data-glide-dir="=1"></button>
                            <button class="glide__bullet h-4 w-4" data-glide-dir="=2"></button>
                            <button class="glide__bullet h-4 w-4" data-glide-dir="=3"></button>
                            <button class="glide__bullet h-4 w-4" data-glide-dir="=4"></button>
                        </div>

{{--                            <div data-glide-el="controls" class="isolate">--}}
{{--                                <div class="absolute inset-y-0 w-20 top-0 left-0 -ml-20 flex flex-col items-center justify-center">--}}
{{--                                    <button data-glide-dir="<<">--}}
{{--                                        <x-heroicon-s-chevron-left class="w-16 h-16 text-white" />--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="absolute inset-y-0 w-20 top-0 right-0 -mr-20 flex flex-col items-center justify-center">--}}
{{--                                    <button  class="relative"  data-glide-dir=">>">--}}
{{--                                        <x-heroicon-s-chevron-right class="w-16 h-16 text-white" />--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                    </div>


{{--                <img src="http://elliotstouch.hup234design.co.uk/storage/media/elliot.jpg" class="w-full h-auto" />--}}
            </div>
{{--            <div class="absolute inset-y-0 w-20 top-0 left-0 -ml-20 flex flex-col items-center justify-center">--}}
{{--                <x-heroicon-s-chevron-left class="w-16 h-16 text-white" />--}}
{{--            </div>--}}
{{--            <div class="absolute inset-y-0 w-20 top-0 right-0 -mr-20 flex flex-col items-center justify-center">--}}
{{--                <x-heroicon-s-chevron-right class="w-16 h-16 text-white" />--}}
{{--            </div>--}}
        </div>
    </div>


{{--    <div class="bg-brand-skyblue py-8">--}}
{{--        <div class="relative">--}}
{{--        <div class="grid grid-cols-5">--}}
{{--            <div class="col-span-2"></div>--}}
{{--            <div class="col-span-3">--}}
{{--                <img src="http://elliotstouch.hup234design.co.uk/storage/media/elliot.jpg" class="w-full rounded-l-full"/>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="absolute inset-0">--}}
{{--            <div class="max-w-7xl mx-auto px-8 h-full">--}}
{{--                <div class="relative w-1/3 h-full flex items-center">--}}
{{--                    <div class="absolute inset-0">--}}
{{--                        <img src="http://elliotstouch.hup234design.co.uk/images/hand-transaparent.png" class="w-auto h-full opacity-50"/>--}}
{{--                    </div>--}}
{{--                    <div class="relative prose prose-lg">--}}
{{--                        <h1 class="text-white">Welcome to Elliot's Touch</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}

{{--        <div class="mt-8 max-w-7xl mx-auto px-8 h-full">--}}
{{--            <div class="grid grid-cols-4 gap-8">--}}
{{--                <div class="aspect-video bg-black/10 flex items-center justify-center">--}}
{{--                    <span>ABOUT</span>--}}
{{--                </div>--}}
{{--                <div class="aspect-video bg-black/10 flex items-center justify-center">--}}
{{--                    <span>HELP</span>--}}
{{--                </div>--}}
{{--                <div class="aspect-video bg-black/10 flex items-center justify-center">--}}
{{--                    <span>FUNDSRAISE</span>--}}
{{--                </div>--}}
{{--                <div class="aspect-video bg-black/10 flex items-center justify-center">--}}
{{--                    <span>DONATE</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--        <div class="bg-brand-crimson">--}}


{{--            <div class="relative">--}}
{{--                <div class="mx-auto max-w-7xl">--}}
{{--                    <div class="relative z-10 pt-14 lg:w-full lg:max-w-2xl">--}}
{{--                        <svg class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-[#f43f5e] lg:block" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">--}}
{{--                            <polygon points="0,0 90,0 50,100 0,100" />--}}
{{--                        </svg>--}}

{{--                        <div class="relative px-6 py-32 sm:py-32 lg:px-8 lg:py-48 lg:pr-0">--}}
{{--                            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">--}}
{{--                                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Data to enrich your online business</h1>--}}
{{--                                <p class="mt-6 text-lg font-medium leading-8 text-gray-50">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>--}}
{{--                                <div class="mt-10 flex items-center gap-x-6">--}}
{{--                                    <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>--}}
{{--                                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="bg-gray-50 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">--}}
{{--                    <img class="object-center object-cover lg:aspect-auto lg:h-full lg:w-full" src="http://elliotstouch.hup234design.co.uk/storage/media/elliot.jpg" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



    @endsection

<div class="max-w-7xl mx-auto px-8">
<div class="prose max-w-none">

    <div class="max-w-4xl mx-auto text-center">
{{--        <div>--}}
    <h1>{{ $page->title }}</h1>

    @if($page->content ?? null)
        {!! tiptap_converter()->asHTML($page->content) !!}
    @endif

    </div>
        </div>
        <div>
            <div class="h-full grid gap-8 mt-16 sm:grid-cols-2 lg:grid-cols-4">
                <a class="block bg-brand-skyblue rounded-full flex items-center justify-center p-4 text-center shadow-2xl shadow-gray-400 sm:p-8 lg:aspect-square lg:rounded-full ">
                    <span class="font-heading font-bold text-3xl xl:text-4xl">
                        {!! str_replace(' ','<br>', ucwords('donate now')) !!}
                    </span>
                </a>
                <a class="bg-brand-crimson rounded-full flex items-center justify-center p-4 text-center shadow-2xl shadow-gray-400  sm:p-8 lg:aspect-square lg:rounded-full">
                    <span class="font-heading font-bold text-3xl xl:text-4xl">
                        {!! str_replace(' ','<br>',ucwords('help us')) !!}
                    </span>
                </a>
                <a class="bg-brand-skyblue bg-opacity-50 rounded-full flex items-center justify-center p-4 text-center shadow-2xl  sm:p-8 shadow-gray-400 lg:aspect-square lg:rounded-full">
                    <span class="font-heading font-bold text-3xl xl:text-4xl">
                        {!! str_replace(' ','<br>',ucwords('our projects')) !!}
                    </span>
                </a>
                <a class="bg-brand-crimson bg-opacity-70 rounded-full flex items-center justify-center p-4 text-center shadow-2xl  sm:p-8 shadow-gray-400 lg:aspect-square lg:rounded-full">
                    <span class="font-heading font-bold text-3xl xl:text-4xl">
                        {!! str_replace(' ','<br>',ucwords('Fundraising Ideas')) !!}
                    </span>
                </a>
            </div>
        </div>


</div>
<x-cms::content-blocks :blocks="$page->blocks" />

</x-cms-app-layout>
