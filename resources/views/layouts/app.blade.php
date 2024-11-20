<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @googlefonts()
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-white">

    <header>

        <div class="mt-4 max-w-7xl mx-auto px-8 flex justify-between items-center">
            <div class="flex-1 flex gap-4">
                <a href="https://www.facebook.com/pages/Elliots-Touch/710984529027805" target="_blank">
                    <svg class="w-8 h-8 text-et-skyblue hover:text-et-dark-crimson" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Facebook</title><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"></path></svg>                </a>

                <a href="http://www.twitter.com/elliotstouch" target="_blank">
                    <svg class="w-8 h-8 text-et-skyblue hover:text-et-dark-crimson" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>X</title><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"></path></svg>                    </a>
                <a href="https://www.instagram.com/elliotstouchcharity" target="_blank">
                    <svg class="w-8 h-8 text-et-skyblue hover:text-et-dark-crimson" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"><title>Instagram</title><path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"></path></svg>                    </a>
            </div>
            <div>
                <img src="https://elliotstouch.hup234design.com/logos/logo-transparent.png" alt="Logo" class="max-h-20 w-auto">
            </div>
            <div class="flex-1 text-right">
                <a type="button" class="rounded-full font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-et-skyblue hover:bg-et-dark-skyblue focus-visible:outline-et-dark-skyblue px-5 py-2.5 text-lg" href="https://elliots-touch.raiselysite.com" target="_blank">
                    <span class="whitespace-nowrap">Donate Now</span>
                </a>
            </div>
        </div>
        <div class="container">

            <nav class="mt-4">
                <ul class="w-full h-16 flex justify-center text-xl">
                    @foreach( $headerMenu ?? [] as $menuItem)
                        @if( $menuItem['route'])
                            <li class="group px-6">
                                <a
                                    class="h-16 font-semibold rounded flex items-center  hover:text-red-700"
                                    href="{{ route($menuItem['route'], $menuItem['slug']) }}">
                                    {{ $menuItem['title'] }}
                                </a>
                            </li>
                        @elseif( count($menuItem['children']) > 0 )
                            <li class="group px-6">
                                <div class="relative group">
                                    <button class="h-16  font-semibold rounded flex items-center  hover:text-red-700">
                                        <span>{{ $menuItem['title'] }}</span>
                                    </button>
                                    <div class="hidden group-hover:block absolute top-100 left-1/2 -translate-x-1/2 -mr-6 z-50" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <div class="relative text-center rounded-b-md shadow-lg bg-white whitespace-nowrap min-w-[160px]" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                            @foreach( $menuItem['children'] ?? [] as $childItem)
                                                @if( $childItem['route'])
                                            <a
                                                href="{{ route($childItem['route'], $childItem['slug']) }}"
                                                class="block px-6 py-2 text-base font-semibold text-gray-700 hover:bg-gray-100 hover:text-red-700"
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
    </header>

{{--    <header class="bg-gray-100 shadow">--}}
{{--        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--            <h1 class="text-2xl font-bold leading-tight text-gray-900 text-center uppercase">--}}
{{--                {{ config('app.name') }}--}}
{{--            </h1>--}}


{{--            <x-ui.button size="xl">Donate Now</x-ui.button>--}}
{{--            <x-ui.button size="xl" color="secondary" rounded>Donate Now</x-ui.button>--}}

{{--            <ul class="flex items-center justify-center mt-6 gap-8">--}}
{{--                <li><a class="text-sm" href="{{ route('pages.home') }}">Home</a></li>--}}
{{--                @foreach ($pages as $slug => $title)--}}
{{--                    <li><a class="text-sm" href="{{ route('pages.page', $slug) }}">{{ $title }}</a></li>--}}
{{--                @endforeach--}}
{{--                <li><a class="text-sm" href="{{ route('events.index') }}">Events</a></li>--}}
{{--                <li><a class="text-sm" href="{{ route('posts.index') }}">News</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </header>--}}

    <div class="bg-et-skyblue h-32"></div>
    <main>
        {{ $slot }}
    </main>

    {{--        <div class="max-w-7xl mx-auto h-96 w-full">--}}

    {{--            <x-maps-leaflet :centerPoint="['lat' => 52.16, 'long' => 5]"></x-maps-leaflet>--}}
    {{--            <x-maps-google class="w-full h-full" :centerPoint="['lat' => 52.16, 'long' => 5]"></x-maps-google>--}}
    {{--            <x-maps-google class="w-full h-full" :centerPoint="['lat' => 52.16, 'long' => 5]" :markers="[['lat' => 52.16, 'long' => 5, 'title' => 'Your Title']]"></x-maps-google>--}}
    {{--        </div>--}}

    <!-- Footer Section: Simple Vertical with Social Brand -->
    <footer id="page-footer" class="bg-blue-900 text-gray-100">
        <div
            class="container mx-auto px-4 py-16 text-center text-sm lg:px-8 lg:py-32 xl:max-w-7xl"
        >
            <div class="space-y-10">
                <nav class="space-x-4">
                    <a href="javascript:void(0)" class="text-white/80 hover:text-white">
                        <svg
                            class="bi bi-twitter-x inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            aria-hidden="true"
                        >
                            <path
                                d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"
                            />
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="text-white/80 hover:text-[#1877f2]">
                        <svg
                            class="icon-facebook inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path
                                d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.192 5 15.115 5H18V0h-3.808C10.596 0 9 1.583 9 4.615V8z"
                            ></path>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="text-white/80 hover:text-[#405de6]">
                        <svg
                            class="icon-instagram inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"
                            ></path>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="text-white/80 hover:text-white">
                        <svg
                            class="icon-github inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path
                                d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"
                            ></path>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="text-white/80 hover:text-[#ea4c89]">
                        <svg
                            class="icon-dribbble inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path
                                d="M12 0C5.372 0 0 5.373 0 12s5.372 12 12 12 12-5.373 12-12S18.628 0 12 0zm9.885 11.441c-2.575-.422-4.943-.445-7.103-.073a42.153 42.153 0 00-.767-1.68c2.31-1 4.165-2.358 5.548-4.082a9.863 9.863 0 012.322 5.835zm-3.842-7.282c-1.205 1.554-2.868 2.783-4.986 3.68a46.287 46.287 0 00-3.488-5.438A9.894 9.894 0 0112 2.087c2.275 0 4.368.779 6.043 2.072zM7.527 3.166a44.59 44.59 0 013.537 5.381c-2.43.715-5.331 1.082-8.684 1.105a9.931 9.931 0 015.147-6.486zM2.087 12l.013-.256c3.849-.005 7.169-.448 9.95-1.322.233.475.456.952.67 1.432-3.38 1.057-6.165 3.222-8.337 6.48A9.865 9.865 0 012.087 12zm3.829 7.81c1.969-3.088 4.482-5.098 7.598-6.027a39.137 39.137 0 012.043 7.46c-3.349 1.291-6.953.666-9.641-1.433zm11.586.43a41.098 41.098 0 00-1.92-6.897c1.876-.265 3.94-.196 6.199.196a9.923 9.923 0 01-4.279 6.701z"
                            ></path>
                        </svg>
                    </a>
                </nav>
                <nav class="space-x-2 sm:space-x-4">
                    <a
                        href="javascript:void(0)"
                        class="font-medium text-white/80 hover:text-white"
                    >
                        About
                    </a>
                    <a
                        href="javascript:void(0)"
                        class="font-medium text-white/80 hover:text-white"
                    >
                        Terms of Service
                    </a>
                    <a
                        href="javascript:void(0)"
                        class="font-medium text-white/80 hover:text-white"
                    >
                        Privacy Policy
                    </a>
                </nav>
            </div>
            <hr class="my-10 border-dashed border-white/10" />
            <div class="text-white/70">
                <span class="font-medium">© 2024 Elliots Touch. Charity Number: 1094446</span> ©
            </div>
        </div>
    </footer>
    <!-- END Footer Section: Simple Vertical with Social Brand -->

    @livewireScripts()
</div>
</body>

</html>
