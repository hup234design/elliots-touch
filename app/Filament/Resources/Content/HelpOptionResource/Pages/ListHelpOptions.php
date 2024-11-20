<?php

namespace App\Filament\Resources\Content\HelpOptionResource\Pages;

use App\Filament\Resources\Content\HelpOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHelpOptions extends ListRecords
{
    protected static string $resource = HelpOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus'),
        ];
    }
}
