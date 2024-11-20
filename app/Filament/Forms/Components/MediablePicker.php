<?php

namespace App\Filament\Forms\Components;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Closure;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Get;
use Illuminate\Support\Str;

class MediablePicker
{
    public function __construct(
        public string | null $type = null
    ) {
    }

    public static function make(string | null $type): Section
    {
        return Section::make(Str::headline($type))
            ->relationship($type)
            ->schema([
                Hidden::make('type')->default($type),
                Group::make([
                    CuratorPicker::make('media_id')
                        ->constrained(true)
                        ->buttonLabel('Select or Upload Media')
                        ->size('sm')
                        ->label('Selected Media')
                            ->hiddenLabel(fn(Get $get) => ! $get('media_id'))
                        ->columnSpan(fn(Get $get) => $get('media_id') ? 1 : 4),
//                        ->hidden(fn(Get $get) => $get('media_id')),
                    MediaImagePreview::make('crops')
                        ->label('Image Preview')
//                        ->label(fn(Get $get) => 'Image Preview' . ($get('crops') ? ' (Cropped)' : ''))
                        ->media(fn(Get $get) => $get('media_id'))
                        ->live()
                        ->visible(fn(Get $get) => $get('media_id'))
                        ->columnSpan(3),
                ])
                ->columnSpanFull()
                ->columns(4)
            ]);
    }
}
