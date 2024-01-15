@props(['heading','text'])

<div class="mb-12 mx-auto max-w-2xl text-center">
    @isset($heading)
        <h2 class="text-2xl font-bold tracking-tight text-pink-500 sm:text-6xl">
            {{ $heading }}
        </h2>
    @endisset
    @isset($text)
        <p class="mt-2 text-lg leading-8 text-gray-600">
            {{ $text  }}
        </p>
    @endisset
</div>
