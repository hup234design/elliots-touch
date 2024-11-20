<?php

namespace App\Filament\Pages;

use App\Settings\EventsPageSettings;
use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageEventsPage extends SettingsPage
{
    protected static ?string $title = 'Events Page';

    protected static bool $shouldRegisterNavigation = false;

    protected static string $settings = EventsPageSettings::class;

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
            Actions\Action::make('Back to events')
                ->icon('heroicon-m-arrow-uturn-left')
                ->url('/admin/events/events'),
        ];
    }
}
