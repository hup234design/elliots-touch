<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image:width" content="2500">
    <title>Elliot's Touch | Fund Research | Mitochondrial Disease | Watchet </title>
    <meta name="description" content="Elliot's Touch is a charity to help research and find cures for Mitochondrial Disease in Children">
    <script src="https://cdn.tailwindcss.com?plugins=typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'et-skyblue': '#24BFF8',
                        'et-crimson': '#F43F5E',
                        'et-blue': '#0D6EFD',
                        'et-navy': '#06377E',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('styles')
</head>
<body class="antialiased">
<header x-data="{ open: false }" class="relative max-w-6xl mx-auto px-4 lg:px-8 ">

    <div class="flex items-center justify-between">
    <a href="{{ url('/') }}" class="block lg:w-3/4 mx-auto">
        <img class="w-full" src="{{ asset('archive/images/logo.png.webp') }}">
    </a>
    <!-- Menu Button -->
    <div class="p-4 lg:hidden">
        <button
            @click="open = !open"
            class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    </div>
    <nav class="hidden mt-4 px-8 lg:block">
        <ul class="flex justify-between items-center text-center">
            <li class="px-4">
                <a class="font-black text-lg" href="{{ url('/elliots-story') }}">Elliots Story</a>
            </li>
            <li class="px-4">
                <a class="font-black text-lg" href="{{ url('/news-research') }}">Research</a>
            </li>
            <li class="px-4">
                <a class="font-black text-lg" href="{{ url('/support-us') }}">Support Us</a>
            </li>
            <li class="px-4">
                <a class="font-black text-lg" href="{{ url('/corporate-partners') }}">Partners</a>
            </li>
            <li class="px-4">
                <a class="font-black text-lg" href="{{ url('/fundraising') }}">Fundraising</a>
            </li>
            <li class="px-4">
                <a class="font-black text-lg" href="{{ url('/contact') }}">Contact Us</a>
            </li>
{{--            <li class="px-4">--}}
{{--                <a class="font-black text-lg">Shop</a>--}}
{{--            </li>--}}
        </ul>
    </nav>

    <!-- Menu Items -->
    <div
        x-show="open"
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="absolute top-0 left-0 w-full bg-white shadow-md z-50"
    >
        <nav class="flex flex-col space-y-4 p-4">
            <ul class="flex flex-col justify-between items-center text-center gap-4">
                <li class="px-4">
                    <a class="font-black text-lg" href="{{ url('/elliots-story') }}">Elliots Story</a>
                </li>
                <li class="px-4">
                    <a class="font-black text-lg" href="{{ url('/news-research') }}">Research</a>
                </li>
                <li class="px-4">
                    <a class="font-black text-lg" href="{{ url('/support-us') }}">Support Us</a>
                </li>
                <li class="px-4">
                    <a class="font-black text-lg" href="{{ url('/corporate-partners') }}">Partners</a>
                </li>
                <li class="px-4">
                    <a class="font-black text-lg" href="{{ url('/fundraising') }}">Fundraising</a>
                </li>
                <li class="px-4">
                    <a class="font-black text-lg" href="{{ url('/contact') }}">Contact Us</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
    <main class="max-w-6xl mx-auto px-4 lg:px-8 my-12">
        {{ $slot }}
    </main>

    <footer class="bg-black  py-8">
        <div class="max-w-6xl px-8 mx-auto px-4 lg:px-8 text-white">
            <div class="flex flex-col items-center justify-between divide-y text-sm lg:flex-row lg:divide-y-0 lg:divide-x ">
                <div class="flex-grow text-center py-4 lg:pr-4 ">
                    <p>Email us:</p>
                    <p>elliotstouch@yahoo.com</p>
                </div>
                <div class="flex-grow text-center py-4 lg:px-4">
                    <p>Find Us:</p>
                    <p>Watchet, United Kingdom</p>
                </div>
                <div class="flex-grow text-center py-4 lg:px-4">
                    <p>© 2015 Elliots Touch</p>
                    <p>Charity Number: 1094446</p>
                </div>
                <div class="flex-grow text-center py-4 lg:pl-4 ">
                    <div class="inline-flex items-center gap-4">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                    </svg>

                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </svg>
                    </div>

                </div>
            </div>

        </div>
    </footer>
</header>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

@stack('scripts')
</body>
</html>
