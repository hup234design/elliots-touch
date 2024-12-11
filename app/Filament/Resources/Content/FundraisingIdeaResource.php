<?php

namespace App\Filament\Resources\Content;

use App\Filament\Forms\Components\MediaPicker;
use App\Filament\Resources\Content\FundraisingIdeaResource\Pages;
use App\Filament\Resources\Content\FundraisingIdeaResource\RelationManagers;
use App\Models\Content\FundraisingIdea;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FundraisingIdeaResource extends Resource
{
    protected static ?string $model = FundraisingIdea::class;

     protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?int $navigationSort = 6;

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
                Forms\Components\Textarea::make('content')
                    ->columnSpanFull(),
                MediaPicker::make('featured_image')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_visible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with('featuredImage'))
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->columns([
                CuratorColumn::make('featured_image.media_id')
                    ->size(80),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
            'index' => Pages\ListFundraisingIdeas::route('/'),
            'create' => Pages\CreateFundraisingIdea::route('/create'),
            'edit' => Pages\EditFundraisingIdea::route('/{record}/edit'),
        ];
    }
}
