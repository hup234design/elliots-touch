<?php

namespace Hup234design\FilamentCms\Filament\Forms\Fields;


use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Component;
use Hup234design\FilamentCms\ContentBlocks\ButtonsBlock;
use Hup234design\FilamentCms\ContentBlocks\CallToActionBlock;
use Hup234design\FilamentCms\ContentBlocks\CardsBlock;
use Hup234design\FilamentCms\ContentBlocks\ContactBlock;
use Hup234design\FilamentCms\ContentBlocks\ImagesBlock;
use Hup234design\FilamentCms\ContentBlocks\LatestEventsBlock;
use Hup234design\FilamentCms\ContentBlocks\LatestPostsBlock;
use Hup234design\FilamentCms\ContentBlocks\MediaObjectBlock;
use Hup234design\FilamentCms\ContentBlocks\MediaObjectListBlock;

class ContentBlocksBuilder
{
    public static function make(): Builder
    {
        return Builder::make('blocks')
            ->addActionLabel('Add Content Block')
            ->labelBetweenItems('Insert Content Block')
            ->label(false)
            ->collapsible()
            ->collapsed()
            ->blockNumbers(false)
            ->blocks([
                CallToActionBlock::make(),
                LatestPostsBlock::make(),
                LatestEventsBlock::make(),
                ImagesBlock::make(),
                ButtonsBlock::make(),
                CardsBlock::make(),
                MediaObjectBlock::make(),
                MediaObjectListBlock::make(),
                ContactBlock::make(),
            ]);
    }
}
