<?php

namespace App\Filament\Resources\Content\HelpOptionResource\Pages;

use App\Filament\Resources\Content\HelpOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHelpOption extends EditRecord
{
    protected static string $resource = HelpOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
