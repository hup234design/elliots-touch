@props(['blocks' => [], 'nopadding' => false])

@foreach($blocks as $block)
    @livewire($block['type'], ['blockData' => $block['data']])
@endforeach
