<?php

namespace App\Filament\Curator\Curations;

use Awcodes\Curator\Curations\CurationPreset;

class HeaderPreset extends CurationPreset
{
    public function getKey(): string
    {
        return 'header';
    }

    public function getLabel(): string
    {
        return 'Header';
    }

    public function getWidth(): int
    {
        return 1920;
    }

    public function getHeight(): int
    {
        return 640;
    }

    public function getFormat(): string
    {
        return 'webp';
    }

    public function getQuality(): int
    {
        return 100;
    }
}
