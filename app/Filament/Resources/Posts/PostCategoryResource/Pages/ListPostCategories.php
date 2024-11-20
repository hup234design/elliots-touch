<?php

namespace App\Filament\Resources\Posts\PostCategoryResource\Pages;

use App\Filament\Resources\Posts\PostCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostCategories extends ListRecords
{
    protected static string $resource = PostCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Back to posts')
                ->icon('heroicon-m-arrow-uturn-left')
                ->url('/admin/posts/posts'),
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus'),
        ];
    }
}
