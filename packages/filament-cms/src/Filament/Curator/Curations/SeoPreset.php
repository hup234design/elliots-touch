<?php

namespace Hup234design\FilamentCms\Filament\Curator\Curations;

use Awcodes\Curator\Curations\CurationPreset;

class SeoPreset extends CurationPreset
{
    public function getKey(): string
    {
        return 'seo';
    }

    public function getLabel(): string
    {
        return 'SEO';
    }

    public function getWidth(): int
    {
        return 1200;
    }

    public function getHeight(): int
    {
        return 630;
    }

    public function getFormat(): string
    {
        return 'png';
    }

    public function getQuality(): int
    {
        return 80;
    }
}
