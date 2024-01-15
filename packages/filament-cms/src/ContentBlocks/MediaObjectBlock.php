<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Livewire\Component;

class MediaObjectBlock extends AbstractContentBlock
{

    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            //
        ];
    }

    public function render()
    {
        return view('cms::livewire.content-blocks.media-object-block');
    }
}
