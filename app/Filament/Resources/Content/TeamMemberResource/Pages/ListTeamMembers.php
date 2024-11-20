<?php

namespace App\Filament\Resources\Content\TeamMemberResource\Pages;

use App\Filament\Resources\Content\TeamMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListTeamMembers extends ListRecords
{
    protected static string $resource = TeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-s-plus'),
        ];
    }
}
