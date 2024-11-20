<?php

namespace App\Models;

use App\Concerns\HasMediables;
use App\Models\Media\Mediable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\LaravelSettings\Models\SettingsProperty;

class MediableSettings extends SettingsProperty
{
    public function bannerImageCenter(): MorphOne
    {
        return $this->morphOne(Mediable::class, 'mediable')
            ->where('type', 'bannerImageCenter');
    }
}
