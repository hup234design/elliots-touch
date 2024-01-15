@props(['nopadding' => false, 'fullwidth' => false])

<section
    @class([
        "not-prose",
        "max-w-7xl mx-auto px-8" => ! $fullwidth,
        "py-16" => ! $nopadding
    ])
>
    {{  $slot }}
</section>
