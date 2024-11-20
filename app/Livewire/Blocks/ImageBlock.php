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

class ImageBlock extends BaseBlockComponent
{
    public ?string $crops = null;
    public ?string $width = 'full';
    public ?string $alignment = 'center';

    public function mount($data)
    {
        if( $data['crops'] ) {
            $this->crops = implode(',', array_values($data['crops']));
        }
        if( isset($data['width']) ) {
            $this->width = $data['width'];
        }
        if( isset($data['alignment']) ) {
            $this->alignment = $data['alignment'];
        }
    }

    public static function blockSchema(): array
    {
        return [
            Group::make([
                Group::make([
                    CuratorPicker::make('media_id')
                        ->constrained(true)
                        ->size('sm')
                        ->label('Selected Media'),
                    Select::make('width')
                        ->inlineLabel()
                        ->options([
                            'full' => 'Full Width',
                            '3/4' => '3/4',
                            '2/3' => '2/3',
                            '1/2' => '1/2',
                        ])
                        ->default('full'),
                    Select::make('alignment')
                        ->inlineLabel()
                        ->options([
                            'center' => 'Center',
                            'left' => 'Left',
                            'right' => 'Right',
                        ])
                        ->default('center'),
                ]),
                MediaImagePreview::make('crops')
                    ->label(fn(Get $get) => 'Image Preview' . ($get('crops') ? ' (Cropped)' : ''))
                    ->media(fn(Get $get) => $get('media_id'))
                    ->live()
                    ->visible(fn(Get $get) => $get('media_id')),
            ])
                ->columnSpanFull()
                ->columns(2),

        ];
    }
}
