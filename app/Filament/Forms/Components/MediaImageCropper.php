<?php

namespace App\Filament\Forms\Components;

use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Field;

class MediaImageCropper extends Field
{
    protected string $view = 'filament.forms.components.media-image-cropper';

    protected ?Media $media = null;
    protected ?array $crops = null;

//    protected ?ImageConversion $conversion = null;

    public function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

        $this->dehydrateStateUsing(function ($state) {
            return $state;
        });
    }

    public function getMedia(): Media
    {
        return $this->media;
    }

    public function getCrops()
    {
        return $this->crops;
    }

    public function media(Media $media): static
    {
        $this->media = $media;

        return $this;
    }

    public function crops(array|null $crops): static
    {
        $this->crops = $crops;

        return $this;
    }

//    public function getConversion(): ?ImageConversion
//    {
//        return $this->conversion;
//    }
//
//    public function conversion(ImageConversion $conversion): static
//    {
//        $this->conversion = $conversion;
//
//        return $this;
//    }

//    public function getConversionDefinition(): ConversionDefinition
//    {
//        if (!is_null($this->conversionDefinition)) {
//            return $this->conversionDefinition;
//        }
//
//        return $this->conversionDefinition = ImageLibrary::getConversionDefinition($this->conversion->conversion_name);
//    }

//    public function getImageWidth(): int
//    {
//        return $this->image->width;
//    }
//
//    public function getImageHeight(): int
//    {
//        return $this->image->height;
//    }

//    public function getImageAspectRatio(bool $asString = false): float|string
//    {
//        $x = $this->media->width;
//        $y = $this->media->height;
//
//        if ($asString) {
//            return "{$x}/{$y}";
//        }
//
//        return round($x / $y, 2);
//    }

//    public function getConversionAspectRatio(bool $asString = false): float|string
//    {
//        $x = $this->getConversion()->width;
//        $y = $this->getConversion()->height;
//
//        if ($asString) {
//            return "{$x}/{$y}";
//        }
//
//        return round($x / $y, 2);
//    }
}
