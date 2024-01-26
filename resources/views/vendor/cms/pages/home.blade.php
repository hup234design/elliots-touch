@php
    $glideImages = [
        "http://elliotstouch.hup234design.co.uk/storage/media/elliot.jpg",
        "https://images.unsplash.com/photo-1470770903676-69b98201ea1c?q=80&w=1600&h=900",
        "https://plus.unsplash.com/premium_photo-1666963323736-5ee1c16ef19d?q=80&w=1600&h=900",
        "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1600&h=900",
        "https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1600&h=900",
    ];
@endphp

<x-cms-app-layout>

{{--    <x-cms::page-heading :heading="$page->title" />--}}

    @section('heading')
            <div class="bg-brand-crimson">
                <div class="max-w-7xl mx-auto">
                    <div class="md:border-x-8 md:border-white">
                        <div class="glide">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach( $glideImages as $glideImage )
                                        <li class="glide__slide">
                                            <div class="w-full aspect-video max-h-[600px]">
                                                <img src="{{ $glideImage }}" class="w-full h-full object-cover object-center" />
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="glide__bullets" data-glide-el="controls[nav]">
                                @for( $x=0; $x<count($glideImages); $x++ )
                                    <button class="glide__bullet h-2 w-2" data-glide-dir="={{ $x }}"></button>
                                @endfor
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                    <x-heroicon-s-chevron-left class="w-8 h-8 text-white" />
                                </button>
                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                    <x-heroicon-s-chevron-right class="w-8 h-8 text-white" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
