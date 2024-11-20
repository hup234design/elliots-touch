<?php

namespace App\Filament\Resources\Events\EventCategoryResource\Pages;

use App\Filament\Resources\Events\EventCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventCategories extends ListRecords
{
    protected static string $resource = EventCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Back to events')
                ->icon('heroicon-m-arrow-uturn-left')
                ->url('/admin/events/events'),
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus'),
        ];
    }
}
