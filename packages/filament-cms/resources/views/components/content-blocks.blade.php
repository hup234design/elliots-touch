@props(['blocks' => []])

@if( count($blocks) > 0 )
<div class="mt-20">
@foreach($blocks as $block)
    @livewire($block['type'], ['blockData' => $block['data']])
@endforeach
</div>
@endif
