<?php

namespace App\Filament\Pages;

use App\Livewire\Blocks\GalleryBlock;
use App\Livewire\Blocks\LatestPostsBlock;
use App\Livewire\Blocks\TeamMembersBlock;
use App\Livewire\Blocks\UpcomingEventsBlock;
use App\Models\Menus\Menu;
use App\Settings\SiteSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Actions;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class SiteSettingsPage extends SettingsPage
{
    protected static ?string $title = 'Site Options';

    protected static string $settings = SiteSettings::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Site Options';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?int $navigationSort = 0;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->schema([
                                // ...
                            ]),
//                        Tabs\Tab::make('Home Page')
//                            ->schema([
//                                Group::make()
//                                    ->schema([
//                                        CuratorPicker::make('home_banner_left_image')
//                                            ->label('Selected Media')
//                                            ->columnSpan(1),
//                                        CuratorPicker::make('home_banner_center_image')
//                                            ->label('Selected Media')
//                                            ->columnSpan(2),
//                                        CuratorPicker::make('home_banner_right_image')
//                                            ->label('Selected Media')
//                                            ->columnSpan(1),
//                                    ])
//                                    ->columns(4),
//                                TextInput::make('home_intro_title')
//                                    ->required(),
//                                RichEditor::make('home_intro_text')
//                                    ->required()
//                                    ->columnSpanFull(),
//                                Builder::make('home_content_blocks')
//                                    ->blocks([
////                                        LatestPostsBlock::schema(),
////                                        UpcomingEventsBlock::schema(),
////                                        TeamMembersBlock::schema(),
////                                        PartnersBlock::schema(),
////                                        HelpOptionsBlock::schema(),
////                                        EditorBlock::schema(),
////                                        FundraisingIdeasBlock::schema(),
//                                        Block::make('gallery')
//                                            ->schema([
//                                                CuratorPicker::make('images')
//                                            ])
////                                        GoogleMapBlock::schema(),
////                                        ImageBlock::schema(),
////                                        ProjectsBlock::schema(),
//                                    ])
//                                    ->columnSpanFull(),
//                            ]),
                        Tabs\Tab::make('Events Page')
                            ->schema([
                                TextInput::make('events_page_title'),
                                RichEditor::make('events_page_introduction'),
                            ]),
                        Tabs\Tab::make('Posts Page')
                            ->schema([
                                TextInput::make('posts_page_title'),
                                RichEditor::make('posts_page_introduction'),
                            ]),
                        Tabs\Tab::make('Navigation')
                            ->schema([
                                Select::make('header_primary_menu')
                                    ->options(Menu::all()->pluck('title','id'))
                                    ->required(),
                                Select::make('footer_primary_menu')
                                    ->options(Menu::all()->pluck('title','id'))
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Socials')
                            ->columns([
                                'default' => 1,
                                'md' => 2,
                            ])
                            ->schema([
                                TextInput::make('social_facebook')
                                    ->inlineLabel()->label('Facebook')
                                    ->url()
                                    ->columnStart(1),
                                TextInput::make('social_instagram')
                                    ->inlineLabel()->label('Instagram')
                                    ->url()
                                    ->columnStart(1),
                                TextInput::make('social_twitter')
                                    ->inlineLabel()->label('Twitter/X')
                                    ->url()
                                    ->columnStart(1),
//                                TextInput::make('social_bluesky')
//                                    ->inlineLabel()->label('BlueSky')
//                                    ->url()
//                                    ->columnStart(1),
//                                TextInput::make('social_youtube')
//                                    ->inlineLabel()->label('YouTube')
//                                    ->url()
//                                    ->columnStart(1),
//                                TextInput::make('social_linkedin')
//                                    ->inlineLabel()->label('LinkedIn')
//                                    ->url()
//                                    ->columnStart(1),
                            ])
                            ->columns(2),
                        Tabs\Tab::make('Contact')
                            ->schema([
                                // ...
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
