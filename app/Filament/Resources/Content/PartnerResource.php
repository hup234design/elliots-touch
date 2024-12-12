<?php

namespace App\Filament\Resources\Content;

use App\Filament\Resources\Content\PartnerResource\Pages;
use App\Filament\Resources\Content\PartnerResource\RelationManagers;
use App\Models\Content\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 8;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                        'codeBlock'
                    ])
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('url'),
                Forms\Components\Textarea::make('logo')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
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
            'index' => PartnerResource\Pages\ListPartners::route('/'),
            'create' => PartnerResource\Pages\CreatePartner::route('/create'),
            'edit' => PartnerResource\Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
