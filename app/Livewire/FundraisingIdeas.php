<?php

namespace App\Livewire;

use App\Models\FundraisingIdea;
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
        $ideas = FundraisingIdea::all();
        return view('livewire.fundraising-ideas', [
            'ideas' => $ideas
        ]);
    }
}
