<?php

namespace App\Filament\Pages;

use App\Models\Menus\Menu;
use App\Settings\GeneralSettings;
use App\Settings\PostsPageSettings;
use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneralSettings extends SettingsPage
{
    protected static ?string $title = 'General Settings';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('site_name')
                    ->required()
                    ->default(config('app.name')),
                TextInput::make('socials'),
                TextInput::make('donation_label'),
                TextInput::make('donation_url'),
                TextInput::make('footer_text'),
                TextInput::make('footer_copyright'),
                Select::make('header_primary_menu')
                    ->options(Menu::all()->pluck('title','id'))
                    ->required(),
                Select::make('footer_primary_menu')
                    ->options(Menu::all()->pluck('title','id'))
                    ->required(),
            ]);
    }
}
