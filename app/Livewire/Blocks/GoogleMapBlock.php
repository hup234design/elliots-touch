<?php

namespace App\Livewire\Blocks;

use ArberMustafa\FilamentLocationPickrField\Forms\Components\LocationPickr;
use Awcodes\Matinee\Matinee;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Livewire\Component;

class GoogleMapBlock extends BaseBlockComponent
{
    public $latitude;
    public $longitude;

    public function mount($data)
    {
        $this->latitude  = $data['location']['lat'];
        $this->longitude = $data['location']['lng'];
    }

    public static function blockSchema(): array
    {
        return [
            Group::make()
                ->schema([
                    Toggle::make('include_text')
                        ->inlineLabel()
                        ->live()
                        ->default(false),
                    Radio::make('text_alignment')
                        ->inline()
                        ->inlineLabel()
                        ->required()
                        ->options([
                            'before' => 'Before Map',
                            'after' => 'After Map',
                            'left' => 'Left of Map',
                            'right' => 'Right of Map'
                        ])
                        ->default('right')
                        ->live()
                        ->visible(fn(Get $get) => $get('include_text')),
                ])
                ->columnSpanFull(),
            Group::make()
                ->schema([
                    RichEditor::make('text')
                        ->columnSpan(fn(Get $get) => $get('text_alignment') == 'before' ? 2 : 1)
                        ->visible(fn(Get $get) => $get('include_text') && in_array($get('text_alignment'), ['before','left'])),
                    LocationPickr::make('location')
                        ->mapControls([
                            'mapTypeControl'    => true,
                            'scaleControl'      => true,
                            'streetViewControl' => true,
                            'rotateControl'     => true,
                            'fullscreenControl' => true,
                            'zoomControl'       => true,
                        ])
                        ->defaultZoom(12)
                        ->draggable()
                        ->clickable()
                        ->height('40vh')
                        ->columnSpan(fn(Get $get) => $get('include_text') && in_array($get('text_alignment'), ['left','right']) ? 1 : 2),
                    RichEditor::make('text')
                        ->columnSpan(fn(Get $get) => $get('text_alignment') == 'after' ? 2 : 1)
                        ->visible(fn(Get $get) => $get('include_text') && in_array($get('text_alignment'), ['right','after']))
                ])
                ->columnSpanFull()
                ->columns(2)
        ];
    }
}
