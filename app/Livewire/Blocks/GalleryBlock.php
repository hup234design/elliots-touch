<?php

namespace App\Livewire\Blocks;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;

class GalleryBlock extends BaseBlockComponent
{
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
                            'before' => 'Before Gallery',
                            'after' => 'After Gallery',
                            //'left' => 'Left of Gallery',
                            //'right' => 'Right of Gallery'
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
                    Section::make()
                        ->schema([
                            CuratorPicker::make('images')
                                ->multiple()
                                ->listDisplay()

                        ])
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
