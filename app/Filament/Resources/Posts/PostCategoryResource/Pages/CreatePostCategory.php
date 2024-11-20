<?php

namespace App\Filament\Resources\Posts\PostCategoryResource\Pages;

use App\Filament\Resources\Posts\PostCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostCategory extends CreateRecord
{
    protected static string $resource = PostCategoryResource::class;
}
