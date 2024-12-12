<?php

namespace App\Livewire\Blocks;

use Filament\Forms\Components\RichEditor;

class EditorBlock extends BaseBlockComponent
{
    public static function blockSchema(): array
    {
        return [
            RichEditor::make('content')
                ->disableToolbarButtons([
                    'attachFiles',
                    'strike',
                    'codeBlock'
                ])
                ->hiddenLabel()
                ->columnSpanFull(),
        ];
    }
}
