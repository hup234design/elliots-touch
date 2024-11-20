<?php

namespace App\Filament\Resources\Content\FundraisingIdeaResource\Pages;

use App\Filament\Resources\Content\FundraisingIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFundraisingIdeas extends ListRecords
{
    protected static string $resource = FundraisingIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus'),
        ];
    }
}
