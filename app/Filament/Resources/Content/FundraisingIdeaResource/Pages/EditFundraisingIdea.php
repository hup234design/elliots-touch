<?php

namespace App\Filament\Resources\Content\FundraisingIdeaResource\Pages;

use App\Filament\Resources\Content\FundraisingIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFundraisingIdea extends EditRecord
{
    protected static string $resource = FundraisingIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
