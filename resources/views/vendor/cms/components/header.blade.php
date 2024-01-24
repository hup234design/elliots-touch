


<header class="py-4 space-y-4 flex flex-col justify-center items-center">

    <div class="text-center">
        <a href="{{ route('home') }}" class="w-3/4 lg:w-auto mx-auto">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-3/4 h-auto lg:w-auto lg:h-24">
        </a>
    </div>

    <nav class="">
        <ul class="w-full h-12 flex items-center justify-center">
            @foreach( $menuLinks ?? [] as $link)
                <li class="group px-6">
                    @if( $link['dropdown'] )
                        <div class="relative group">
                            @if( $link['href'] )
                                <a href="{{ $link['href'] }}" target="{{ $link['target'] }}" class="h-16 font-bold text-lg text-brand-dark-blue rounded flex items-center  hover:text-brand-crimson">
                                    <span>{{ $link['label'] }}</span>
                                    <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12l-6-6h12l-6 6z"/></svg>
                                </a>
                            @else
                                <button class="h-16  font-bold text-lg rounded flex items-center text-brand-dark-blue  hover:text-brand-crimson">
                                    <span>{{ $link['label'] }}</span>
                                    <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12l-6-6h12l-6 6z"/></svg>
                                </button>
                            @endif
                            <div class="hidden group-hover:block absolute right-0 -mr-2 z-50" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <div class="relative mt-2 text-right border rounded-md shadow-lg py-1 bg-white whitespace-nowrap min-w-[160px]" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    @foreach( $link['children'] as $child )
                                        <a href="{{ $child['href'] }}" target="{{ $child['target'] }}" class="block px-8 py-2 font-bold text-lg text-gray-700 hover:bg-gray-100 hover:text-brand-crimson" role="menuitem">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" target="{{ $link['target'] }}" class="h-16 font-bold text-lg rounded flex items-center text-brand-dark-blue  hover:text-red-700">
                            {{ $link['label'] }}
                        </a>
                    @endif
                </li>
            @endforeach

                @if(cms_setting('social_facebook'))
                    <li class="pl-6">
                        <a href="{{ cms_setting('social_facebook') }}" target="_blank">
                            <x-si-facebook class="w-8 h-8 text-brand-dark-blue "/>
                        </a>
                    </li>
                @endif
                @if(cms_setting('social_twitter'))
                    <li class="pl-6">
                        <a href="{{ cms_setting('social_twitter') }}" target="_blank">
                            <x-si-twitter class="w-8 h-8 text-brand-dark-blue "/>
                        </a>
                    </li>
                @endif
                @if(cms_setting('social_linkedin'))
                    <li class="pl-6">
                        <a href="{{ cms_setting('social_linkedin') }}" target="_blank">
                            <x-si-linkedin class="w-8 h-8 text-brand-dark-blue "/>
                        </a>
                    </li>
                @endif
                @if(cms_setting('social_instagram'))
                    <li class="pl-6">
                        <a href="{{ cms_setting('social_instagram') }}" target="_blank">
                            <x-si-instagram class="w-8 h-8 text-brand-dark-blue "/>
                        </a>
                    </li>
                @endif
                @if(cms_setting('social_pinterest'))
                    <li class="pl-6">
                        <a href="{{ cms_setting('social_pinterest') }}" target="_blank">
                            <x-si-pinterest class="w-8 h-8 text-brand-dark-blue "/>
                        </a>
                    </li>
                @endif
                @if(cms_setting('social_youtube'))
                    <li class="pl-6">
                        <a href="{{ cms_setting('social_youtube') }}" target="_blank">
                            <x-si-youtube class="w-8 h-8 text-brand-dark-blue "/>
                        </a>
                    </li>
                @endif
                @if(cms_setting('social_tiktok'))
                    <li class="pl-6">
                        <a href="{{ cms_setting('social_tiktok') }}" target="_blank">
                            <x-si-tiktok class="w-8 h-8 text-brand-dark-blue "/>
                        </a>
                    </li>
                @endif
        </ul>
    </nav>

</header>
