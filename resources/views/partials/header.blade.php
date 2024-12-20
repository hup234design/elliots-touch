<header x-data="{ mobileMenuOpen: false }">

    <div class=" mt-4 container max-w-none">
        <div class="relative">
            <div class="hidden md:block float-left">
                <img class="w-30 md:w-36" src="{{ asset('images/ET-SBA-Logo.png') }}">
            </div>
            <div class="hidden md:block float-right">
                <div class="ml-auto w-auto inline-flex flex-col justify-center items-center">
                    <div class="inline-block flex items-center mb-4 gap-4">
                        @if( $settings->social_facebook )
                            <a href="{{ $settings->social_facebook }}" target="_blank">
                                <svg class="w-6 h-6 text-et-skyblue hover:text-et-dark-crimson" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Facebook</title><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"></path></svg>
                            </a>
                        @endif
                        @if( $settings->social_twitter )
                            <a href="{{ $settings->social_twitter }}" target="_blank">
                                <svg class="w-6 h-6 text-et-skyblue hover:text-et-dark-crimson" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>X</title><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"></path></svg>
                            </a>
                        @endif
                        @if( $settings->social_instagram )
                            <a href="{{ $settings->social_instagram }}" target="_blank">
                                <svg class="w-6 h-6 text-et-skyblue hover:text-et-dark-crimson" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Instagram</title><path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"></path></svg>
                            </a>
                        @endif
                    </div>
                    <div>
                        <a type="button" class="rounded-full font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-et-skyblue hover:bg-et-dark-skyblue focus-visible:outline-et-dark-skyblue px-3 py-1.5 text-sm" href="https://elliots-touch.raiselysite.com" target="_blank">
                            <span class="whitespace-nowrap">Donate Now</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="">
                <a href="{{ url('/') }}" target="_blank" class="block md:mx-auto md:text-center">
                    <img src="{{ asset('images/logo-transparent.png') }}" alt="Logo" class="md:mx-auto w-3/4 h-auto md:w-auto md:h-16">
                </a>
            </div>
            <!-- Menu Button -->
            <div class="absolute top-0 right-0 h-full flex flex-col justify-center md:hidden">
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="text-et-skyblue focus:outline-none focus:ring-2 focus:ring-gray-500"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 fill-current"  viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
                </button>
            </div>
            <!-- Menu Button END -->

        </div>
    </div>
    <div class="bg-et-skyblue-50/50">
        <div class="container mt-4 ">
            <nav class="hidden md:block">
                <ul class="w-full h-16 flex justify-center text-xl">
                    @foreach( $headerMenu ?? [] as $menuItem)
                        @if( $menuItem['route'])
                            <li class="group px-8">
                                <a
                                    class="h-16 text-base font-semibold rounded flex items-center  hover:text-red-700"
                                    href="{{ route($menuItem['route'], $menuItem['slug']) }}">
                                    {{ $menuItem['title'] }}
                                </a>
                            </li>
                        @elseif( count($menuItem['children']) > 0 )
                            <li class="group px-8">
                                <div class="relative group">
                                    <button class="h-16 text-base font-semibold rounded flex items-center  hover:text-red-700">
                                        <span>{{ $menuItem['title'] }}</span>
                                    </button>
                                    <div class="hidden group-hover:block absolute top-100 left-1/2 -translate-x-1/2 -mr-6 z-50" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <div class="relative text-center rounded-b-md shadow-lg bg-white whitespace-nowrap min-w-[160px]" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                            @foreach( $menuItem['children'] ?? [] as $childItem)
                                                @if( $childItem['route'])
                                                    <a
                                                        href="{{ route($childItem['route'], $childItem['slug']) }}"
                                                        class="block px-6 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100 hover:text-red-700"
                                                        role="menuitem"
                                                    >
                                                        {{ $childItem['title'] }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div
        x-show="mobileMenuOpen"
        @click.away="mobileMenuOpen = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="absolute top-0 left-0 w-full bg-et-skyblue shadow-md z-50"
        x-cloak
    >
        <nav class="flex flex-col space-y-4 p-4">
            <ul class="flex flex-col justify-between items-center text-center gap-4">

                @foreach( $headerMenu ?? [] as $menuItem)
                    @if( $menuItem['route'])
                        <li class="px-4">
                            <a
                                class="font-black text-lg text-white"
                                href="{{ route($menuItem['route'], $menuItem['slug']) }}">
                                {{ $menuItem['title'] }}
                            </a>
                        </li>
                    @elseif( count($menuItem['children']) > 0 )
                        @foreach( $menuItem['children'] ?? [] as $childItem)
                            @if( $childItem['route'])
                                <li class="px-4">
                                    <a
                                        href="{{ route($childItem['route'], $childItem['slug']) }}"
                                        class="font-black text-lg text-white"
                                        role="menuitem"
                                    >
                                        {{ $childItem['title'] }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </nav>
        <button
            @click="mobileMenuOpen = false"
            class="absolute top-0 right-0 m-4 text-white focus:outline-none focus:ring-2 focus:ring-gray-500"
        >
            <x-heroicon-s-x-mark class="h-10 w-10" />
        </button>
    </div>
    <!-- Mobile Menu END -->
</header>
