<?php

namespace App\Models\Media;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Mediable extends Model
{
    protected $guarded = false;

    protected function casts(): array
    {
        return [
            'crops'      => 'json',
        ];
    }

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    public function media() : BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function($model){
            if( !$model->media_id ) {
                $model->crops = null;
            }
        });
    }
}