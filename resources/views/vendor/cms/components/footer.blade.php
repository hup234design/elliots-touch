<footer class="bg-brand-dark-blue py-16 flex flex-col justify-center items-center space-y-8">

    <div class="text-center">
        <a href="{{ route('home') }}" class="font-bold text-xl text-white">
            {{ config('app.name') }}
        </a>
    </div>

    <ul class="flex items-center font-medium text-sm gap-12">
        @foreach( $menuLinks ?? [] as $link)
            <li class="group px-6">
                <a href="{{ $link['href'] }}" target="{{ $link['target'] }}" class="h-16 text-white font-bold text-lg rounded flex items-center  hover:text-red-700">
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
                    <x-si-facebook class="w-8 h-8 text-white "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_twitter'))
            <li>
                <a href="{{ cms_setting('social_twitter') }}" target="_blank">
                    <x-si-twitter class="w-8 h-8 text-white "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_linkedin'))
            <li>
                <a href="{{ cms_setting('social_linkedin') }}" target="_blank">
                    <x-si-linkedin class="w-8 h-8 text-white "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_instagram'))
            <li>
                <a href="{{ cms_setting('social_instagram') }}" target="_blank">
                    <x-si-instagram class="w-8 h-8 text-white "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_pinterest'))
            <li>
                <a href="{{ cms_setting('social_pinterest') }}" target="_blank">
                    <x-si-pinterest class="w-8 h-8 text-white "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_youtube'))
            <li>
                <a href="{{ cms_setting('social_youtube') }}" target="_blank">
                    <x-si-youtube class="w-8 h-8 text-white "/>
                </a>
            </li>
        @endif
        @if(cms_setting('social_tiktok'))
            <li>
                <a href="{{ cms_setting('social_tiktok') }}" target="_blank">
                    <x-si-tiktok class="w-8 h-8 text-white "/>
                </a>
            </li>
        @endif
    </ul>
    @endif

    <p class="text-sm text-white">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </p>
</footer>
