<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Hup234design\FilamentCms\Filament\Forms\Components\MediablePreview;
use Hup234design\FilamentCms\Filament\Forms\Fields\MediaObjectSchema;
use Illuminate\Support\Str;
use Livewire\Component;

class MediaObjectBlock extends AbstractContentBlock
{
    protected static bool $includeHeader = false;

    protected static function makeFilamentSchema(): array|\Closure
    {
        return MediaObjectSchema::make();
    }

    /**
     * Make a new Filament Block instance for this flexible block.
     */
    public static function make(): Block
    {
        return Block::make(static::blockName())
            ->label(function (?array $state): string {
                if ($state === null) {
                    return static::blockLabel();
                }
                return static::blockLabel() . ' : ' . $state['title'];
            })
            ->schema(static::makeFilamentSchema());
    }

    public function render()
    {
        return view('cms::content-blocks.media-object-block');
    }
}
