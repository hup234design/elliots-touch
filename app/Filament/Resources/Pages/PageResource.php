<?php

namespace App\Filament\Resources\Pages;

use App\Filament\Resources\Pages\PageResource\Pages;
use App\Filament\Resources\Pages\PageResource\RelationManagers;

use App\Livewire\Blocks\ImageTextBlock;

use App\Livewire\Blocks\EditorBlock;
use App\Livewire\Blocks\FundraisingIdeasBlock;
use App\Livewire\Blocks\GalleryBlock;
use App\Livewire\Blocks\GoogleMapBlock;
use App\Livewire\Blocks\HelpOptionsBlock;
use App\Livewire\Blocks\HomeHeroBlock;
use App\Livewire\Blocks\ImageBlock;
use App\Livewire\Blocks\LatestPostsBlock;
use App\Livewire\Blocks\PartnersBlock;
use App\Livewire\Blocks\ProjectsBlock;
use App\Livewire\Blocks\TeamMembersBlock;
use App\Livewire\Blocks\UpcomingEventsBlock;
use App\Livewire\Blocks\VideoBlock;
use App\Models\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
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
                Forms\Components\Group::make()
                    ->schema([
                        \Filament\Forms\Components\Builder::make('content')
                            ->blockNumbers(false)
                            ->collapsible()
                            ->collapsed()
                            ->blocks(fn(Get $get) => [
                                EditorBlock::schema(),
                                ImageBlock::schema(),
                                GalleryBlock::schema(),
                                VideoBlock::schema(),
                                LatestPostsBlock::schema(),
                                UpcomingEventsBlock::schema(),
                                GoogleMapBlock::schema(),
                                TeamMembersBlock::schema(),
//                                ...$get('is_home') ? [HomeHeroBlock::schema()] : [],
//                                ...[LatestPostsBlock::schema(),
//                                UpcomingEventsBlock::schema(),
//                                TeamMembersBlock::schema(),
//                                PartnersBlock::schema(),
//                                HelpOptionsBlock::schema(),
//                                EditorBlock::schema(),
//                                FundraisingIdeasBlock::schema(),
//                                GalleryBlock::schema(),
//                                GoogleMapBlock::schema(),
//                                ImageBlock::schema(),
//                                ProjectsBlock::schema(),
//                                ]
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
                    Tables\Columns\IconColumn::make('is_home')
                        ->boolean(),
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
