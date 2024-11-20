{{-- resources/views/components/button.blade.php --}}
@props(['size' => 'base', 'color'=>'primary', 'rounded'=>false])

<button
    type="button"
    {{ $attributes->class([
        'inline-flex items-center justify-center gap-2 border font-semibold hover:shadow-sm focus:ring active:shadow-none ',
        'px-2 py-1 text-sm leading-5' => $size === 'xs',
        'px-3 py-2 text-sm leading-5' => $size === 'sm',
        'px-4 py-2 leading-6' => $size === 'base',
        'px-6 py-3 leading-6' => $size === 'lg',
        'px-8 py-4 leading-6' => $size === 'xl',
        'border-blue-700 bg-blue-700 text-white hover:border-blue-600    hover:bg-blue-600   focus:ring-blue-400/50 active:border-blue-700 dark:focus:ring-blue-400/90' => $color === 'primary',
        'bg-blue-100 border-blue-200 text-blue-800 hover:border-blue-300 hover:text-blue-900 focus:ring-blue-300/25 active:border-blue-200 dark:border-blue-200 dark:bg-blue-200 dark:hover:border-blue-300 dark:hover:bg-blue-300 dark:focus:ring-blue-500/50 dark:active:border-blue-200 dark:active:bg-blue-200' => $color === 'secondary',
        'rounded-full' => $rounded,
        'rounded-lg' => !$rounded
    ]) }}x
>
    {{ $slot }}
</button>
