@props(['nopadding' => false, 'fullwidth' => false])

<section class="odd:bg-gray-100">
<div
    @class([
        "max-w-7xl mx-auto px-8" => ! $fullwidth,
        "py-20" => ! $nopadding
    ])
>
    {{  $slot }}
</div>
</section>
