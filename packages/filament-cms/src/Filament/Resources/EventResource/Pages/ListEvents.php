<?php

namespace Hup234design\FilamentCms\Filament\Resources\EventResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Manage Categories')
                ->color('info')
                ->url('/admin/event-categories')
        ];
    }
}
