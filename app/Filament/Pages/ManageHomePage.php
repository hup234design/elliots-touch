<?php

namespace App\Filament\Pages;

use App\Filament\Forms\Components\MediablePicker;
use App\Filament\Forms\Components\MediaImagePreview;
use App\Settings\HomePageSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\SettingsPage;

class ManageHomePage extends SettingsPage
{
    protected static ?string $title = 'Home Page';

    protected static string $settings = HomePageSettings::class;

    protected static bool $shouldRegisterNavigation = false;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                            CuratorPicker::make('banner_left_image')
                                ->label('Selected Media')
                                ->columnSpan(1),
                        CuratorPicker::make('banner_center_image')
                            ->label('Selected Media')
                            ->columnSpan(2),
                        CuratorPicker::make('banner_right_image')
                            ->label('Selected Media')
                            ->columnSpan(1),
//                TextInput::make('banner_left_image')
//                    ->integer()
//                    ->required(),
//                TextInput::make('banner_center_image')
//                    ->integer()
//                    ->required(),
//                MediablePicker::make('bannerImageCenter'),
//                TextInput::make('banner_right_image')
//                    ->integer()
//                    ->required(),
                    ])
                    ->columns(4),
                TextInput::make('intro_title')
                    ->required(),
                RichEditor::make('intro_text')
                    ->required()
                    ->columnSpanFull(),
//                Builder::make('content_blocks')
//                    ->blocks([
//                        Builder\Block::make('team_members')
//                            ->schema([ ]),
//                        Builder\Block::make('fundraising_ideas')
//                            ->schema([ ]),
//                        Builder\Block::make('projects')
//                            ->schema([ ]),
//                        Builder\Block::make('help_options')
//                            ->schema([ ]),
//                    ]),
                TextInput::make('events_title')
                    ->required(),
                Textarea::make('events_text'),
                TextInput::make('posts_title')
                    ->required(),
                Textarea::make('posts_text'),
            ])
            ->columns(1);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Back to pages')
                ->icon('heroicon-m-arrow-uturn-left')
                ->url('/admin/pages/pages'),
        ];
    }
}
