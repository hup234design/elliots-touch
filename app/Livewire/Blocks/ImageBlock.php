<?php

namespace App\Livewire\Blocks;

use App\Filament\Forms\Components\MediaPicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;

class ImageBlock extends BaseBlockComponent
{
//    public ?string $crops = null;
//    public ?string $width = 'full';
//    public ?string $alignment = 'center';

//    public function mount($data)
//    {
//        if( $data['crops'] ) {
//            $this->crops = implode(',', array_values($data['crops']));
//        }
//        if( isset($data['width']) ) {
//            $this->width = $data['width'];
//        }
//        if( isset($data['alignment']) ) {
//            $this->alignment = $data['alignment'];
//        }
//    }

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
                            'before' => 'Before Image',
                            'after' => 'After Image',
                            'left' => 'Left of Image',
                            'right' => 'Right of Image'
                        ])
                        ->default('right')
                        ->live()
                        ->visible(fn(Get $get) => $get('include_text')),
                ])
                ->columnSpanFull(),
            Group::make()
                ->schema([
                    RichEditor::make('text')
                        ->disableToolbarButtons([
                            'attachFiles',
                            'strike',
                            'codeBlock'
                        ])
                        ->columnSpan(fn(Get $get) => $get('text_alignment') == 'before' ? 2 : 1)
                        ->visible(fn(Get $get) => $get('include_text') && in_array($get('text_alignment'), ['before','left'])),
                    MediaPicker::make('image')
                        ->columnSpan(fn(Get $get) => $get('include_text') && in_array($get('text_alignment'), ['left','right']) ? 1 : 2),
                    RichEditor::make('text')
                        ->disableToolbarButtons([
                            'attachFiles',
                            'strike',
                            'codeBlock'
                        ])
                        ->columnSpan(fn(Get $get) => $get('text_alignment') == 'after' ? 2 : 1)
                        ->visible(fn(Get $get) => $get('include_text') && in_array($get('text_alignment'), ['right','after']))
                ])
                ->columnSpanFull()
                ->columns(2)
        ];
    }
}
