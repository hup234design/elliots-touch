@php
$crops = $getCrops();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
    x-data="{
    state: $wire.$entangle('{{ $getStatePath() }}'),
    cropper: null,
    cropperLoaded: false,
    initialStateSet: false,
    initCropper() {
        const self = this;
        self.cropperLoaded = false;
        self.initialStateSet = false;
        self.cropper = new Cropper(document.getElementById('media-image-cropper-{{ $getMedia()->id }}'), {
            viewMode: 2,
            dragMode: false,
            zoomable: false,
            aspectRatio: NaN,
            ready() {
                self.cropper.setData({
                    width: {{ $crops ? $crops['width'] : $getMedia()->width }},
                    height: {{ $crops ? $crops['height'] : $getMedia()->height }},
                    x: {{ $crops ? $crops['x'] : 0 }},
                    y: {{ $crops ? $crops['y'] : 0 }},
                });
                self.initialStateSet = true;
            },
            cropend() {
                var cropData = self.cropper.getData();
                console.log(cropData);
                self.state = {
                    ...self.state,
                    width: Math.round(cropData.width),
                    height: Math.round(cropData.height),
                    x: Math.round(cropData.x),
                    y: Math.round(cropData.y),
                };
            },
            crop(event) {
                if (!self.initialStateSet) {
                    return;
                }
                self.state = {
                    ...self.state,
                    width: Math.round(event.detail.width),
                    height: Math.round(event.detail.height),
                    x: Math.round(event.detail.x),
                    y: Math.round(event.detail.y),
                };
            },
        });
        setTimeout(() => {
            self.cropperLoaded = true;
        }, 400);
    },
    init() {
        const self = this;
        if (self.cropper) {
            self.cropper.destroy();
        }
        self.$nextTick(() => {
            setTimeout(() => {
                self.initCropper();
            }, 100);
        });
    },
}"
>
    <div class="h-[50vh] flex-1 relative flex flex-col lg:flex-row overflow-hidden">
        <div class="flex-1 w-full lg:h-full overflow-auto">
            <div class="h-full w-full">
                <img
                    wire:ignore
                    src="{{ asset($getMedia()->url) }}"
                    id="media-image-cropper-{{ $getMedia()->id }}"
                    wire:key="media-image-cropper-{{ $getMedia()->id }}"
                    class="block max-w-full"
                    x-on:focus="init"
                >
            </div>
        </div>
        <div class="w-full h-64 lg:h-full lg:w-48 overflow-auto bg-gray-50 flex flex-col shadow-top lg:shadow-none z-[1]">
            <div class="flex items-center w-full">
                <div class="flex-1 overflow-hidden">
                    <div class="flex flex-col w-full h-full overflow-y-auto">
                        <h2 class="font-bold py-2 px-4 mb-4 text-center">
                            ADJUSTMENTS
                        </h2>

                        <div class="flex-1 flex flex-col overflow-auto px-4 pb-4">
                            <div class="space-y-3">
                                <div>
                                    <x-filament::button
                                        type="button"
                                        size="md"
                                        color="gray"
                                        class="w-full"
                                        x-on:click="cropper.setAspectRatio(NaN)"
                                    >
                                        FREE
                                    </x-filament::button>
                                </div>
                                <div>
                                    <x-filament::button
                                        type="button"
                                        size="md"
                                        color="gray"
                                        class="w-full"
                                        x-on:click="cropper.setAspectRatio(1/1)"
                                    >
                                        THUMBNAIL
                                    </x-filament::button>
                                </div>
                                <div>
                                    <x-filament::button
                                        type="button"
                                        size="md"
                                        color="gray"
                                        class="w-full"
                                        x-on:click="cropper.setAspectRatio(3/1)"
                                    >
                                        HEADER
                                    </x-filament::button>
                                </div>
                                <div>
                                    <x-filament::button
                                        type="button"
                                        size="md"
                                        color="gray"
                                        class="w-full"
                                        x-on:click="cropper.setAspectRatio(1200/630)"
                                    >
                                        SEO
                                    </x-filament::button>
                                </div>
                                <div>
                                <x-filament::button
                                    type="button"
                                    size="md"
                                    color="gray"
                                    class="w-full"
                                    x-on:click="cropper.setAspectRatio(16/9)"
                                >
                                    16:9
                                </x-filament::button>
                                </div>
                                <div>
                                <x-filament::button
                                    type="button"
                                    size="sm"
                                    color="gray"
                                    class="w-full"
                                    x-on:click="cropper.setAspectRatio(4/3)"
                                >
                                    4:3
                                </x-filament::button>
                                </div>
                                <div>
                                <x-filament::button
                                    type="button"
                                    size="sm"
                                    color="gray"
                                    class="w-full"
                                    x-on:click="cropper.setAspectRatio(1)"
                                >
                                    1:1
                                </x-filament::button>
                                </div>
                                <div>
                                <x-filament::button
                                    type="button"
                                    size="sm"
                                    color="gray"
                                    class="w-full"
                                    x-on:click="cropper.setAspectRatio(2/3)"
                                >
                                    2:3
                                </x-filament::button>
                                </div>

                                <div>
                                    <x-filament::button
                                        type="button"
                                        size="md"
                                        color="danger"
                                        class="w-full"
                                        x-on:click="
            cropper.setData({
                width: {{ $getMedia()->width }},
                height: {{ $getMedia()->height }},
                x: 0,
                y: 0
            });
            state = null;
        "
                                    >
                                        RESET
                                    </x-filament::button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dynamic-component>
