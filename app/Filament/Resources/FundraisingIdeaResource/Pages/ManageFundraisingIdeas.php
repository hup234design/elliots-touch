<?php

namespace App\Filament\Resources\FundraisingIdeaResource\Pages;

use App\Filament\Resources\FundraisingIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFundraisingIdeas extends ManageRecords
{
    protected static string $resource = FundraisingIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->slideOver()
                ->modalWidth('5xl'),
        ];
    }
}
