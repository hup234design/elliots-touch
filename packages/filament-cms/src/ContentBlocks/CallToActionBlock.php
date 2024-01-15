<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Livewire\Component;

class CallToActionBlock extends AbstractContentBlock
{
    protected static function blockLabel(): string
    {
        return "Call To Action";
    }
    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            TextInput::make('title'),
        ];
    }

    public function render()
    {
        return view('cms::content-blocks.call-to-action-block');
    }
}
