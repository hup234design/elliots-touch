<?php

namespace App\Livewire\Blocks;

use App\Filament\Forms\Components\MediaImagePreview;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Curations\CurationPreset;
use Awcodes\Curator\Curations\ThumbnailPreset;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;

class GalleryBlock extends BaseBlockComponent
{
    public static function blockSchema(): array
    {
        return [
            CuratorPicker::make('media_ids')
                ->constrained(true)
                ->size('sm')
                ->label('Selected Images')
                ->multiple()
                ->listDisplay(),
        ];
    }
}
