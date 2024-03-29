<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Livewire\Component;

class CardsBlock extends AbstractContentBlock
{
    protected static bool $includeHeader = false;

    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            //
        ];
    }

    public function render()
    {
        return view('cms::content-blocks.cards-block');
    }
}
