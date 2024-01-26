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


    <div class="bg-brand-crimson">
        <div class="relative max-w-7xl mx-auto">
            <div class="border-x-8 border-white">
                <img src="http://elliotstouch.hup234design.co.uk/storage/media/elliot.jpg" class="w-full h-auto" />
            </div>
            <div class="absolute inset-y-0 w-20 top-0 left-0 -ml-20 flex flex-col items-center justify-center">
                <x-heroicon-s-chevron-left class="w-16 h-16 text-white" />
            </div>
            <div class="absolute inset-y-0 w-20 top-0 right-0 -mr-20 flex flex-col items-center justify-center">
                <x-heroicon-s-chevron-right class="w-16 h-16 text-white" />
            </div>
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
