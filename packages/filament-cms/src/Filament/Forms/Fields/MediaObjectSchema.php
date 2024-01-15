<?php

namespace Hup234design\FilamentCms\Filament\Forms\Fields;


use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\FilamentCms\Filament\Forms\Components\MediablePreview;

class MediaObjectSchema
{
    public static function make(): array {
        return [
            Forms\Components\TextInput::make('title')
                ->required()
                ->columnSpanFull(),
            Forms\Components\TextInput::make('subtitle')
                ->columnSpanFull(),
            TiptapEditor::make('content')
                ->profile('minimal')
                ->output(TiptapOutput::Json)
                ->columnSpanFull(),

            CuratorPicker::make('media_id')
                ->constrained()
                ->label('Image')
                ->live()
                ->afterStateUpdated(function (Forms\Set $set, $state) {
                    $set('media_curation', null);
                })
                ->required(),

            Forms\Components\Group::make([
                Forms\Components\Hidden::make('media_type')
                    ->default('thumbnail'),

                Forms\Components\Select::make('media_curation')
                    ->placeholder('No Curation')
                    ->options(fn(Forms\Get $get) => collect(collect($get('media_id'))->first()['curations'] ?? [])
                        ->mapWithKeys(function ($item) {
                            return [$item["curation"]["key"] => $item["curation"]["key"]];
                        }))
                    ->live()
                    ->visible(fn(Forms\Get $get) => $get('media_id')),

                MediablePreview::make('preview')
                    ->media(fn(Forms\Get $get) => $get('media_id'))
                    ->curation(fn(Forms\Get $get) => $get('media_curation'))
                    ->visible(fn(Forms\Get $get) => $get('media_id'))
                    ->columnSpan(2),
            ])
                ->columns(3)
                ->columnSpanFull(),

        ];
    }
}
