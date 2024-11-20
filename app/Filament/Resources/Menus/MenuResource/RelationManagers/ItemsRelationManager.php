<?php

namespace App\Filament\Resources\Menus\MenuResource\RelationManagers;

use App\Models\Menus\MenuItem;
use App\Models\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('route')
                    ->label('Type')
                    ->options([
                        'pages.home'  => 'Home Page',
                        'posts.index'  => 'Posts',
                        'events.index'  => 'Events',
                        'pages.page'  => 'Page',
//                        ...IndexPage::all()->map(function($indexPage) {
//                            return [
//                                $indexPage.'.index' => Str::headline($indexPage->slug)
//                            ];
//                        }),
                        'dropdown'    => 'Dropdown',
                    ])
                    ->required()
                    ->default('pages.page')
                    ->live()
                    ->afterStateUpdated(function(Forms\Set $set, $state) {
                        switch ($state) {
                            case "pages.home":
                                $set('title', 'Home');
                                break;
                            case "posts.index":
                                $set('title', 'Posts');
                                break;
                            case "events.index":
                                $set('title', 'Events');
                                break;
                            default:
                                break;
                        }
                    }),

                Forms\Components\Select::make('page_id')
                    ->label('Page')
                    ->live()
                    ->options(Page::visible()->pluck('title','id'))
                    ->required(fn(Forms\Get $get) => $get('route') == 'pages.page')
                    ->visible(fn(Forms\Get $get) => $get('route') == 'pages.page')
                    ->afterStateUpdated(fn(Forms\Set $set, $state) => $set('title', Page::find($state)->title)),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Repeater::make('children')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('page_id')
                            ->options(Page::visible()->pluck('title','id'))
                            ->required(),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                    ->collapsible()
                    ->collapsed(true)
                    ->columns(2)
                    ->visible(fn(Forms\Get $get) => $get('route') == 'dropdown')
            ])
            ->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('route')
                    ->label('Links To')
                    ->state(function (MenuItem $record): string {
                        $linksTo = "";
                        switch($record->route) {
                            case "pages.home":
                                $linksTo = "Home Page";
                                break;
                            case "pages.page":
                                $linksTo = "Page" . " : " . $record->page->title;
                                break;
                            case "dropdown":
                                $linksTo = "Dropdown Menu";
                                break;
                            default:
                                $linksTo = Str::headline(Str::replace('.index','',$record->route). ' Index Page');
                        }
                        return $linksTo;
                    }),
                Tables\Columns\TextColumn::make('children')
                    ->getStateUsing(fn($record) => $record->children ? count($record->children) : '-' )
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->slideOver(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->slideOver(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
