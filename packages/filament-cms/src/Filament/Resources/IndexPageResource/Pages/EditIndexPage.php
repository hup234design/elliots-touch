<?php

namespace Hup234design\FilamentCms\Filament\Resources\IndexPageResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\IndexPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndexPage extends EditRecord
{
    protected static string $resource = IndexPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
