<x-blocks.wrapper>
    <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
        <div class="prose">
            @if($this->data['include_titles'] && $this->data['column_one_title'])
                <h2>{{ $this->data['column_one_title'] }}</h2>
            @endif
            @if($this->data['include_images'] && $this->data['column_one_image'])
                    <x-media-renderer :data="$this->data['column_one_image']" class="w-full" />
            @endif
            {!! $this->data['column_one_content'] !!}
        </div>
        <div class="prose">
            @if($this->data['include_titles'] && $this->data['column_two_title'])
                <h2>{{ $this->data['column_two_title'] }}</h2>
            @endif
            @if($this->data['include_images'] && $this->data['column_two_image'])
                <x-media-renderer :data="$this->data['column_two_image']" class="w-full" />
            @endif
            {!! $this->data['column_two_content'] !!}
        </div>
    </div>
</x-blocks.wrapper>
