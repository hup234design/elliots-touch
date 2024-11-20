<?php

namespace App\Filament\Resources\Pages\PageResource\Pages;

use App\Filament\Resources\Pages\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['content'] = [['type'=>'editor_block','data'=>['content'=>'']]];
        return $data;
    }
}
