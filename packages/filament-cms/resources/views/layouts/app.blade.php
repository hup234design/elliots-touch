<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" value="{{ csrf_token() }}"/>
    @vite('resources/css/app.css')
</head>
<body class="antialiased">

<x-cms::header :pageLinks="$pageLinks"  :menuLinks="$menuLinks"/>

@section('heading')
@show

<main class="mt-16">
{{ $slot }}
</main>

<x-cms::footer :pageLinks="$pageLinks"/>
</body>
</html>
