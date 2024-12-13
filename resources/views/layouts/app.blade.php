<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('seo')
        {!! seo() !!}
    @show

    @googlefonts
    @googlefonts('headline')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-white">

    @include('partials/header')

    @section('heading')
        @hasSection('title')
            <section class="bg-et-skyblue-600">
                <div class="container min-h-24 flex flex-col items-center justify-center text-center px-4">
                    <h1 class="font-headline text-3xl font-extrabold text-white lg:text-4xl  leading-none">@yield('title')</h1>
                    @hasSection('subtitle')
                        <div class="max-w-3xl mx-auto">
                            <p class="text-xl font-semibold text-white">@yield('subtitle')</p>
                        </div>
                    @endif
                </div>
            </section>
        @endif
    @show

    <main class="my-12">
        {{ $slot }}
    </main>

    @include('partials/footer')

    @livewireScripts()
</div>
</body>

</html>
