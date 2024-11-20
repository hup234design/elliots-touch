<?php

namespace App\Filament\Resources\Content;

use App\Filament\Forms\Components\MediablePicker;
use App\Filament\Forms\Components\MediaPicker;
use App\Filament\Resources\Content\TeamMemberResource\Pages;
use App\Filament\Resources\Content\TeamMemberResource\RelationManagers;
use App\Models\Content\TeamMember;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

     protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?int $navigationSort = 7;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Team Member Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('role'),
                        Forms\Components\Textarea::make('bio')
                            ->rows(10)
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_visible')
                            ->required(),
                    ])
                    ->columnSpan(1),
                Forms\Components\Section::make('Profile Picture')
                    ->schema([
                        MediaPicker::make('profile_image')
                            ->hiddenLabel()
                    ])
                    ->columnSpan(1),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with('featuredImage'))
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->columns([
                CuratorColumn::make('profile_image.media_id')
                    ->size(80),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
