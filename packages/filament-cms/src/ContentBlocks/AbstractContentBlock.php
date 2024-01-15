<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\Builder\Block;
use Illuminate\Support\Str;
use Livewire\Component;

abstract class AbstractContentBlock extends Component
{
    abstract protected static function makeFilamentSchema(): array|\Closure;

    protected static function blockName(): string
    {
        return Str::snake(basename(str_replace('\\', '/', static::class)),'-');
    }

    protected static function blockLabel(): string
    {
        return Str::headline(str_replace('-block', '', static::blockName()));
    }

    public ?array $blockData;

    /**
     * Make a new Filament Block instance for this flexible block.
     */
    public static function make(): Block
    {
        return Block::make(static::blockName())
            ->label(static::blockLabel())
            ->schema(static::makeFilamentSchema());
    }

    public function mount($blockData)
    {
        $this->blockData = $blockData;
    }
}
