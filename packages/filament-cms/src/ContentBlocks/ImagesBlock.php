<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Hup234design\FilamentCms\Filament\Forms\Fields\ContentBlockHeader;
use Illuminate\Support\Str;
use Livewire\Component;

class ImagesBlock extends AbstractContentBlock
{
    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            Radio::make('format')
                ->label('Display Images As')
                ->inline()
                ->inlineLabel()
                ->live()
                ->options([
                    'grid' => 'Grid',
                    'strip' => 'Image Strip',
                ])
                ->required()
                ->default('grid'),
            CuratorPicker::make('images')
                ->listDisplay()
                ->preserveFilenames()
                ->multiple()
                ->required(),

        ];
    }

    public function render()
    {
        $images = Media::whereIn('id',$this->blockData['images'])->get();
        return view('cms::content-blocks.images-block', compact('images'));
    }
}
