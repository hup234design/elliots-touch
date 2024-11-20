<?php

namespace App\Providers;

use App\Filament\TipTapBlocks\FeaturesList;
use App\Filament\TipTapBlocks\GalleryBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    GalleryBlock::class,
                    FeaturesList::class,
                ])
            ;
        });
    }
}
