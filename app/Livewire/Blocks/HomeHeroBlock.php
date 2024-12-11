<?php

namespace App\Livewire\Blocks;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class HomeHeroBlock extends BaseBlockComponent
{
    public static bool $includeHeader = false;

    public static function blockSchema(): array
    {
        return [
            TextInput::make('intro_title'),
            RichEditor::make('intro_text'),
        ];
    }
}
