@props(['blocks' => []])

<div class="mb-40">
    @foreach($blocks as $block)
        @livewire('blocks.' . Str::slug($block['type']), ['data' => $block['data']])
    @endforeach
</div>
