<footer class="bg-gray-100 py-16 flex flex-col justify-center items-center space-y-12">

    <div class="text-center">
        <a href="{{ route('home') }}" class="font-bold text-xl text-white">
            <img src="{{ asset('images/logo-transparent.png') }}" alt="{{ config('app.name') }}" class="mx-auto w-auto h-20
            ">
        </a>

        <p class="uppercase font-semibold text-base mt-4 text-brand-crimson">keeping energy flowing and little hearts beating</p>
    </div>

    <ul class="flex items-center font-medium text-sm gap-12">
        @foreach( $menuLinks ?? [] as $link)
            <li class="group px-6">
                <a href="{{ $link['href'] }}" target="{{ $link['target'] }}" class="text-gray-700 font-bold text-lg rounded flex items-center  hover:text-red-700">
                    {{ $link['label'] }}
                </a>
            </li>
        @endforeach
    </ul>

    @if(
        cms_setting('social_facebook') || cms_setting('social_twitter') || cms_setting('social_linkedin') ||
        cms_setting('social_instagram') || cms_setting('social_pinterest') || cms_setting('social_youtube') ||
        cms_setting('social_tiktok')
    )
    <ul class="flex items-center font-medium text-sm gap-12">
        @if(cms_setting('social_facebook'))
            <li>
                <a href="{{ cms_setting('social_facebook') }}" target="_blank">
                    <x-si-facebook class="w-8 h-8 text-brand-blue "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_twitter'))
            <li>
                <a href="{{ cms_setting('social_twitter') }}" target="_blank">
                    <x-si-twitter class="w-8 h-8 text-brand-blue "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_linkedin'))
            <li>
                <a href="{{ cms_setting('social_linkedin') }}" target="_blank">
                    <x-si-linkedin class="w-8 h-8 text-brand-blue "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_instagram'))
            <li>
                <a href="{{ cms_setting('social_instagram') }}" target="_blank">
                    <x-si-instagram class="w-8 h-8 text-brand-blue "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_pinterest'))
            <li>
                <a href="{{ cms_setting('social_pinterest') }}" target="_blank">
                    <x-si-pinterest class="w-8 h-8 text-brand-blue "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_youtube'))
            <li>
                <a href="{{ cms_setting('social_youtube') }}" target="_blank">
                    <x-si-youtube class="w-8 h-8 text-brand-blue "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_tiktok'))
            <li>
                <a href="{{ cms_setting('social_tiktok') }}" target="_blank">
                    <x-si-tiktok class="w-8 h-8 text-brand-blue "/>
                </a>
            </li>
        @endif
    </ul>
    @endif

    <p class="text-base text-brand-gray-800">
        &copy; {{ date('Y') }} Elliots Touch. Charity Number: 1094446
    </p>
</footer>
