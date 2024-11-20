<?php

namespace App\Filament\Pages;

use App\Settings\PostsPageSettings;
use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManagePostsPage extends SettingsPage
{
    protected static ?string $title = 'Posts Page';

    protected static string $settings = PostsPageSettings::class;

    protected static bool $shouldRegisterNavigation = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->required(),
                RichEditor::make('introduction')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Back to posts')
                ->icon('heroicon-m-arrow-uturn-left')
                ->url('/admin/posts/posts'),
        ];
    }
}
