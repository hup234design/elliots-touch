<?php

namespace App\Filament\Resources\Pages\PageResource\Pages;

use App\Filament\Resources\Pages\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Edit Home Page')
                ->icon('heroicon-m-home')
                ->url('/admin/manage-home-page'),
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus')
        ];
    }
}
