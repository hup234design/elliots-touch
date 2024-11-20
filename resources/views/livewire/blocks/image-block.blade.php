<div>
    {{ json_encode($this->data) }}
    <div
        @class([
            'mx-auto' => $this->alignment == 'center',
            'ml-auto' => $this->alignment == 'right',
            'w-full'  => $this->width == 'full',
            'w-3/4'   => $this->width == '3/4',
            'w-2/3'   => $this->width == '2/3',
            'w-1/2'   => $this->width == '1/2',
        ])
    >
        @if( $crops )
            <x-curator-glider
                class='w-full'
                fit="crop"
                :crop="$crops"
                :media="$this->data['media_id']"
            />
        @else
            <x-curator-glider
                class='w-full'
                {{--            :class="$class"--}}
                :media="$this->data['media_id']"
            />
        @endif
    </div>
</div>
