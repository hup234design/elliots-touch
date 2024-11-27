<?php

namespace App\Filament\Resources\Posts\PostResource\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Manage Categories')
                ->icon('heroicon-o-rectangle-stack')
                ->url('/admin/posts/post-categories'),
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus')
        ];
    }
}
