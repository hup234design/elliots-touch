<?php

namespace App\Filament\Curator\Curations;

use Awcodes\Curator\Curations\CurationPreset;

class ThumbnailPreset extends CurationPreset
{
    public function getKey(): string
    {
        return 'thumbnail';
    }

    public function getLabel(): string
    {
        return 'Thumbnail';
    }

    public function getWidth(): int
    {
        return 400;
    }

    public function getHeight(): int
    {
        return 400;
    }

    public function getFormat(): string
    {
        return 'webp';
    }

    public function getQuality(): int
    {
        return 60;
    }
}
