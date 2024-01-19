@props(['heading','text'])

<div class="mb-20 mx-auto max-w-5xl text-center">
    @isset($heading)
        <h2 class="font-heading text-3xl font-semibold sm:text-5xl uppercase">
            {{ $heading }}
        </h2>
    @endisset
    @isset($text)
        <p class="mt-4 text-lg leading-8 text-gray-600">
            {{ $text  }}
        </p>
    @endisset
</div>
