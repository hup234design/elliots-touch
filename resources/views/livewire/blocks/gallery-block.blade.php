<div>
    <div class="flex gap-4">
        @foreach($this->data['media_ids'] ?? [] as $media_id)
            <div class="flex-1 border aspect-square">
                @php
                $data = [
                    'media_id' => $media_id
                    ];
                @endphp
                <div class="w-full h-full bg-red-900">
                    <x-media-renderer :data="$data" class="object-cover object-center w-full h-full" />
                </div>
            </div>
        @endforeach
    </div>
</div>
