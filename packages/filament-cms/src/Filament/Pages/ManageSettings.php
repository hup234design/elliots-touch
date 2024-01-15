<?php

namespace Hup234design\FilamentCms\Filament\Pages;

use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Hup234design\FilamentCms\FilamentCmsSettings;
use RyanChandler\FilamentNavigation\Filament\Fields\NavigationSelect;

class ManageSettings extends Page
{
    protected static ?string $title = 'Site Options';
    protected static ?int $navigationSort = 99;
    protected static ?string $navigationIcon= 'heroicon-o-cog';

    protected static string $view = 'cms::filament.pages.settings';

    public $state = [];

//    public static function shouldRegisterNavigation(): bool
//    {
//        return auth()->user()->hasRole('admin');
//    }

    public function mount(FilamentCmsSettings $settings)
    {
        $this->state = $settings->all();

        $requiredKeys = [
            "site_name" => config('app.name'),
            "posts_slug" => "blog",
            "posts_title" => "Blog",
            "events_enabled" => true,
            "events_slug" => "events",
            "events_title" => "Events",
            "testimonials_enabled" => true,
            "testimonials_slug" => "testimonials",
            "testimonials_title" => "Testimonials",
            "primary_header_menu_id" => null,
            "secondary_header_menu_id" => null,
            "primary_footer_menu_id" => null,
            "secondary_footer_menu_id" => null,
        ];

        foreach ($requiredKeys as $key=>$value) {
            if (!array_key_exists($key, $this->state)) {
                $this->state[$key] = $value;
            }
        }

        $this->form->fill($this->state);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Tabs::make('Settings')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('General')
                        ->schema([
                            Forms\Components\Group::make()
                                ->schema([
                                    Forms\Components\TextInput::make('state.site_name')
                                        ->label('Site Name')
                                        ->required(),
                                ])
                        ]),

                    Forms\Components\Tabs\Tab::make('Events')
                        ->schema([
                            Forms\Components\Toggle::make('state.events_enabled')
                                ->label('Events Enabled')
                                ->default(true)
                                ->live(true),
                            Forms\Components\Group::make([
                                Forms\Components\TextInput::make('state.events_title')
                                    ->label('Title')
                                    ->default('Events')
                                    ->required(),
                                Forms\Components\TextInput::make('state.events_slug')
                                    ->label('Slug')
                                    ->default('events')
                                    ->required(),
                            ])
                            ->visible(fn (Forms\Get $get) => $get('state.events_enabled'))
                        ]),

                    Forms\Components\Tabs\Tab::make('Testimonials')
                        ->schema([
                            Forms\Components\Toggle::make('state.testimonials_enabled')
                                ->label('Testimonials Enabled')
                                ->default(true)
                                ->live(true),
                            Forms\Components\Group::make([
                                Forms\Components\TextInput::make('state.testimonials_title')
                                    ->label('Title')
                                    ->default('Testimonials')
                                    ->required(),
                                Forms\Components\TextInput::make('state.testimonials_slug')
                                    ->label('Slug')
                                    ->default('testimonials')
                                    ->required(),
                            ])
                                ->visible(fn (Forms\Get $get) => $get('state.testimonials_enabled'))
                        ]),

                    Forms\Components\Tabs\Tab::make('Posts')
                        ->schema([
                            Forms\Components\Group::make([
                                Forms\Components\TextInput::make('state.posts_title')
                                    ->label('Title')
                                    ->default('Posts')
                                    ->required(),
                                Forms\Components\TextInput::make('state.posts_slug')
                                    ->label('Slug')
                                    ->default('posts')
                                    ->required(),
                            ])
                                ->columnSpan(2),
                        ])
                        ->columns(3),
                    Forms\Components\Tabs\Tab::make('Navigation')
                        ->schema([
                            NavigationSelect::make('state.primary_header_menu_id')
                                ->label('Primary Header Menu')
                                ->required(),
                            NavigationSelect::make('state.secondary_header_menu_id')
                                ->label('Secondary Header Menu')
                                ->helperText('This will only be used if configured in site theme'),
                            NavigationSelect::make('state.primary_footer_menu_id')
                                ->label('Primary Footer Menu')
                                ->required(),
                            NavigationSelect::make('state.secondary_footer_menu_id')
                                ->label('Secondary Footer Menu')
                                ->helperText('This will only be used if configured in site theme'),
                        ]),
                ])
                ->columnSpan(2)
        ];
    }

    public function submit(FilamentCmsSettings $settings): void
    {
        $this->validate();
        $settings->put($this->state);

        Notification::make()
            ->title('Settings Saved successfully')
            ->success()
            ->send();
    }
}
