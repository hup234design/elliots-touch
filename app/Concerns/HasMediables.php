<?php

namespace App\Concerns;

use App\Models\Media\Mediable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasMediables
{
    public function featuredImage(): MorphOne
    {
        return $this->morphOne(Mediable::class, 'mediable')
            ->where('type', 'featuredImage');
    }

    public function headerImage(): MorphOne
    {
        return $this->morphOne(Mediable::class, 'mediable')
            ->where('type', 'headerImage');
    }

    public function seoImage(): MorphOne
    {
        return $this->morphOne(Mediable::class, 'mediable')
            ->where('type', 'seoImage');
    }
}
