<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" value="{{ csrf_token() }}"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf_token" value="{{ csrf_token() }}"/>
    @googlefonts
    @googlefonts('gloria-hallelujah')
    @vite(['resources/css/app.css','resources/js/app.js'])
{{--    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>--}}
    @livewireStyles
</head>
<body class="antialiased text-gray-800">

<x-cms::header :menuLinks="$menus['header']"/>

@section('heading')
@show

<main class="mt-16">
{{ $slot }}
</main>

<x-cms::footer :menuLinks="$menus['footer']"/>
@livewireScripts
</body>
</html>
