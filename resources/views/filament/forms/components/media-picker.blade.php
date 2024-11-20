@php
    $statePath = $getStatePath();
    $state = $getState();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            insertMedia: function (event) {
                if (event.detail.statePath !== '{{ $statePath }}') return;
                console.log('Updating media_id with:', event.detail.media[0].id);
                $wire.set('{{ $statePath }}.media_id', event.detail.media[0].id);
                $wire.set('{{ $statePath }}.crops', null);
                $wire.set('{{ $statePath }}.curation', null);
                $wire.set('{{ $statePath }}.caption', null);
            },
            removeMedia: function () {
                console.log('removeMedia function called');
                $wire.set('{{ $statePath }}.media_id', null);
                $wire.set('{{ $statePath }}.crops', null);
                $wire.set('{{ $statePath }}.curation', null);
                $wire.set('{{ $statePath }}.caption', null);
            },
            updateCrops: function (event) {
                console.log('updateCrops function called', event.detail);
                $wire.set('{{ $statePath }}.crops', event.detail[0]);
            }
        }"
        x-init="$watch('state.media_id', value => {
            console.log('media_id updated:', value);
        })"
        x-on:insert-content.window="insertMedia($event)"
        x-on:update-crops.window="updateCrops($event)"
        x-on:remove-media.window="removeMedia()"
    >
        <!-- Interact with the `state` property in Alpine.js -->

        @if( $state['media_id'] )
            <div class="border bg-white rounded-lg">
                <div class="flex items-center justify-center gap-4 border-b px-4 py-2">
                    {{ $getAction('openCuratorPicker') }}
                    {{ $getAction('cropImage') }}
                    {{ $getAction('removeImage') }}
{{--                    <x-filament::link size="sm" icon="heroicon-m-trash" x-on:click="removeMedia" tag="button" color="gray">--}}
{{--                        Remove Image--}}
{{--                    </x-filament::link>--}}
                </div>
                <div class="p-4">
            <x-media-renderer :data="$state" class="max-w-full mx-auto"/>
                </div>
            </div>

        @else
            <div class="h-48 border bg-gray-100 flex items-center justify-center">
                {{ $getAction('openCuratorPicker') }}
            </div>
        @endif

        <div>
        </div>

    </div>

</x-dynamic-component>
