<?php

namespace App\Livewire\Blocks;

use App\Filament\Forms\Components\MediaPicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;

class TwoColumnsBlock extends BaseBlockComponent
{
    public static function blockSchema(): array
    {
        return [
            Section::make()
                ->schema([
                    Toggle::make('include_titles')
                        ->inlineLabel()
                        ->live()
                        ->default(false),
                    Toggle::make('include_images')
                        ->inlineLabel()
                        ->live()
                        ->default(false),
                ])
                ->columnSpanFull(),
            Group::make()
                ->schema([
                    Group::make()
                        ->schema([
                            TextInput::make('column_one_title')
                                ->visible(fn(Get $get) => $get('include_titles')),
                            MediaPicker::make('column_one_image')
                                ->visible(fn(Get $get) => $get('include_images')),
                            RichEditor::make('column_one_content')
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'strike',
                                    'codeBlock'
                                ])
                                ->hiddenLabel(),
                        ])
                        ->columnSpan(1),
                    Group::make()
                        ->schema([
                            TextInput::make('column_two_title')
                                ->visible(fn(Get $get) => $get('include_titles')),
                            MediaPicker::make('column_two_image')
                                ->visible(fn(Get $get) => $get('include_images')),
                            RichEditor::make('column_two_content')
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'strike',
                                    'codeBlock'
                                ])
                                ->hiddenLabel(),
                        ]),
                ])
                ->columnSpanFull()
                ->columns(2)
        ];
    }
}
