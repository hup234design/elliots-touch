<?php

namespace Hup234design\FilamentCms\Filament\Navigation;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use RyanChandler\FilamentNavigation\FilamentNavigation;

class CustomFilamentNavigation extends FilamentNavigation
{
    public function getItemTypes(): array
    {
        return array_merge(
            $this->itemTypes,
            [
                'external-link' => [
                    'name' => __('filament-navigation::filament-navigation.attributes.external-link'),
                    'fields' => [
                        TextInput::make('url')
                            ->label(__('filament-navigation::filament-navigation.attributes.url'))
                            ->required(),
                        Select::make('target')
                            ->label(__('filament-navigation::filament-navigation.attributes.target'))
                            ->options([
                                '' => __('filament-navigation::filament-navigation.select-options.same-tab'),
                                '_blank' => __('filament-navigation::filament-navigation.select-options.new-tab'),
                            ])
                            ->default('')
                            ->selectablePlaceholder(false),
                    ],
                ],
            ]
        );
    }
}
