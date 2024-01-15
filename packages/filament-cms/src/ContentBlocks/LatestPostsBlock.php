<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\TextInput;
use Hup234design\FilamentCms\Filament\Forms\Fields\ContentBlockHeader;
use Illuminate\Support\Str;
use Livewire\Component;

class LatestPostsBlock extends AbstractContentBlock
{

    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            ContentBlockHeader::make()
        ];
    }

    public function render()
    {
        return view('cms::livewire.content-blocks.latest-posts-block');
    }
}
