<?php

namespace App\Livewire;

use Hup234design\FilamentCms\ContentBlocks\AbstractContentBlock;
use Hup234design\FilamentCms\Filament\Forms\Fields\ContentBlockHeader;

class FundraisingIdeas extends AbstractContentBlock
{
    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            //
        ];
    }

    public function render()
    {
        return view('livewire.fundraising-ideas');
    }
}
