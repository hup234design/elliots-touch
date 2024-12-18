<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <div class="grid grid-cols-3 gap-8">
            <div class="grid grid-cols-6 gap-4" @click="state = 'image-strip'">
                <div class="aspect-square bg-gray-200"></div>
                <div class="aspect-square bg-gray-200"></div>
                <div class="aspect-square bg-gray-200"></div>
                <div class="aspect-square bg-gray-200"></div>
                <div class="aspect-square bg-gray-200"></div>
                <div class="aspect-square bg-gray-200"></div>
            </div>
            <div>
                <div class="grid grid-cols-3 gap-4"@click="state = 'image-grid'">
                    <div class="col-span-2 bg-gray-200"></div>
                    <div class="aspect-square bg-gray-200"></div>
                    <div class="aspect-square bg-gray-200"></div>
                    <div class="col-span-2 bg-gray-200"></div>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-3 gap-4"@click="state = 'image-grid'">
                    <div class="aspect-square bg-gray-200"></div>
                    <div class="col-span-2 bg-gray-200"></div>
                    <div class="col-span-2 bg-gray-200"></div>
                    <div class="aspect-square bg-gray-200"></div>
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>
