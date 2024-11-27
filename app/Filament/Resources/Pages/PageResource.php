<?php

namespace App\Filament\Resources\Pages;

use App\Filament\Resources\Pages\PageResource\Pages;
use App\Filament\Resources\Pages\PageResource\RelationManagers;
use App\Livewire\Blocks\EditorBlock;
use App\Livewire\Blocks\GalleryBlock;
use App\Livewire\Blocks\GoogleMapBlock;
use App\Livewire\Blocks\ImageBlock;
use App\Livewire\Blocks\PartnersBlock;
use App\Models\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Hoa\Exception\Group;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

     protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Pages";

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                \Filament\Forms\Components\Group::make()
                    ->schema([
                        \Filament\Forms\Components\Builder::make('content')
                            ->blockNumbers(false)
                            ->collapsible()
                            ->blocks([
                                EditorBlock::schema(),
                                ImageBlock::schema(),
                                GalleryBlock::schema(),
                                PartnersBlock::schema(),
//                                \Filament\Forms\Components\Builder\Block::make('editor_block')
//                                    ->schema([
//                                        Forms\Components\RichEditor::make('content')
//                                            ->hiddenLabel()
//                                    ]),
                                \Filament\Forms\Components\Builder\Block::make('team_members_block')
                                    ->schema([ ]),
                                \Filament\Forms\Components\Builder\Block::make('fundraising_ideas_block')
                                    ->schema([ ]),
                                \Filament\Forms\Components\Builder\Block::make('projects_block')
                                    ->schema([ ]),
                                \Filament\Forms\Components\Builder\Block::make('help_options_block')
                                    ->schema([ ]),
                                GoogleMapBlock::schema(),
                            ])
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_visible')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->hiddenOn('create')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
