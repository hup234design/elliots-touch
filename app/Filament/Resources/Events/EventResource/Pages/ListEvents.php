<?php

namespace App\Filament\Resources\Events\EventResource\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Edit Events Page')
                ->icon('heroicon-m-queue-list')
                ->url('/admin/manage-events-page'),
            Actions\Action::make('Manage Categories')
                ->icon('heroicon-o-rectangle-stack')
                ->url('/admin/events/event-categories'),
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus')
        ];
    }
}
