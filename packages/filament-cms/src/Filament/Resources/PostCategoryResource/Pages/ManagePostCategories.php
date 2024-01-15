<?php

namespace Hup234design\FilamentCms\Filament\Resources\PostCategoryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\PostCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePostCategories extends ManageRecords
{
    protected static string $resource = PostCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
