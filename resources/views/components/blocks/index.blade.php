@props(['blocks' => []])

<div class="">
    @foreach($blocks as $block)
        @livewire('blocks.' . Str::slug($block['type']), ['data' => $block['data']])
    @endforeach
</div>
