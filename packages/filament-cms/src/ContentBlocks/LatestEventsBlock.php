<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\TextInput;
use Hup234design\FilamentCms\Filament\Forms\Fields\ContentBlockHeader;
use Hup234design\FilamentCms\Models\Event;
use Illuminate\Support\Str;
use Livewire\Component;

class LatestEventsBlock extends AbstractContentBlock
{

    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            ContentBlockHeader::make()
        ];
    }

    public function render()
    {
        $events = Event::visible()->upcoming()->orderBy('date','asc')->take(3)->get();
        return view('cms::content-blocks.latest-events-block', compact('events'));
    }
}
