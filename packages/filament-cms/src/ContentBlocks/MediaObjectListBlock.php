<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Hup234design\FilamentCms\Filament\Forms\Fields\ContentBlockHeader;
use Hup234design\FilamentCms\Filament\Forms\Fields\MediaObjectSchema;
use Illuminate\Support\Str;
use Livewire\Component;

class MediaObjectListBlock extends AbstractContentBlock
{

    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            ContentBlockHeader::make(),
            Repeater::make('media_objects')
                ->collapsible()
                ->schema(MediaObjectSchema::make())
                ->defaultItems(0)
                ->required()
                ->itemLabel(fn (array $state): ?string => ('Media Object : ' . $state['title']) ?? null),

        ];
    }

    public function render()
    {
        return view('cms::content-blocks.media-object-list-block');
    }
}
