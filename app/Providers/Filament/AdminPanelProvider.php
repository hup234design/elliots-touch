<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'et-blue' => [
                    'DEFAULT' =>'#0D6EFD',
                    50 =>'#C3DBFF',
                    100 =>'#AFCFFE',
                    200 =>'#86B7FE',
                    300 =>'#5E9EFE',
                    400 =>'#3586FD',
                    500 =>'#0D6EFD',
                    600 =>'#0255D0',
                    700 =>'#013E99',
                    800 =>'#012861',
                    900 =>'#001129',
                    950 =>'#00050D'
                ],
                'primary' => [
                    'DEFAULT' =>'#0D6EFD',
                    50 =>'#C3DBFF',
                    100 =>'#AFCFFE',
                    200 =>'#86B7FE',
                    300 =>'#5E9EFE',
                    400 =>'#3586FD',
                    500 =>'#0D6EFD',
                    600 =>'#0255D0',
                    700 =>'#013E99',
                    800 =>'#012861',
                    900 =>'#001129',
                    950 =>'#00050D'
                ],
                'et-skyblue' => [
                    'DEFAULT' =>'#24BFF8',
                    50 =>'#D6F3FE',
                    100 =>'#C2EDFD',
                    200 =>'#9BE2FC',
                    300 =>'#73D6FB',
                    400 =>'#4CCBF9',
                    500 =>'#24BFF8',
                    600 =>'#07A3DD',
                    700 =>'#057BA6',
                    800 =>'#045370',
                    900 =>'#022B3A',
                    950 =>'#01171F'
                ],
                'secondary' => [
                    'DEFAULT' =>'#24BFF8',
                    50 =>'#D6F3FE',
                    100 =>'#C2EDFD',
                    200 =>'#9BE2FC',
                    300 =>'#73D6FB',
                    400 =>'#4CCBF9',
                    500 =>'#24BFF8',
                    600 =>'#07A3DD',
                    700 =>'#057BA6',
                    800 =>'#045370',
                    900 =>'#022B3A',
                    950 =>'#01171F'
                ],
                'et-crimson' => [
                    'DEFAULT' => '#F43F5E',
                    50 => '#FEEDF0',
                    100 => '#FDD9DF',
                    200 => '#FBB3BF',
                    300 => '#F88C9F',
                    400 => '#F6667E',
                    500 => '#F43F5E',
                    600 => '#ED0E34',
                    700 => '#B80B28',
                    800 => '#83081D',
                    900 => '#4E0411',
                    950 => '#34030B'
                ],
                'danger' => [
                    'DEFAULT' => '#F43F5E',
                    50 => '#FEEDF0',
                    100 => '#FDD9DF',
                    200 => '#FBB3BF',
                    300 => '#F88C9F',
                    400 => '#F6667E',
                    500 => '#F43F5E',
                    600 => '#ED0E34',
                    700 => '#B80B28',
                    800 => '#83081D',
                    900 => '#4E0411',
                    950 => '#34030B'
                ],
                'et-navy' => [
                    'DEFAULT' => '#06377E',
                    50 =>'#458EF6',
                    100 =>'#3282F5',
                    200 =>'#0C6AF3',
                    300 =>'#0A59CC',
                    400 =>'#0848A5',
                    500 =>'#06377E',
                    600 =>'#032048',
                    700 =>'#010813',
                    800 =>'#000000',
                    900 =>'#000000',
                    950 =>'#000000'
                ],
                'info' => [
                    'DEFAULT' => '#06377E',
                    50 =>'#458EF6',
                    100 =>'#3282F5',
                    200 =>'#0C6AF3',
                    300 =>'#0A59CC',
                    400 =>'#0848A5',
                    500 =>'#06377E',
                    600 =>'#032048',
                    700 =>'#010813',
                    800 =>'#000000',
                    900 =>'#000000',
                    950 =>'#000000'
                ],
                'gray' => Color::Gray,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->userMenuItems([
                MenuItem::make()
                    ->label('View Site')
                    ->url(fn(): string => url('/'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-arrow-top-right-on-square'),
                // ...
            ])
            ->maxContentWidth('full')
            ->sidebarFullyCollapsibleOnDesktop()
            ->breadcrumbs(false)
            ->plugins([
                \TomatoPHP\FilamentUsers\FilamentUsersPlugin::make(),
                \Awcodes\Curator\CuratorPlugin::make()
                    ->label('Media')
                    ->pluralLabel('Media')
                    ->navigationSort(10)
                    ->navigationCountBadge(),
                // ->registerNavigation(false)
                // ->defaultListView('grid' || 'list')
                // ->resource(\App\Filament\Resources\CustomMediaResource::class)
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Page Management')
                    ->icon('heroicon-o-document-duplicate')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Post Management')
                    ->icon('heroicon-o-newspaper')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Event Management')
                    ->icon('heroicon-o-calendar-days')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Content Management')
                    ->icon('heroicon-o-circle-stack')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Site Management')
                    ->icon('heroicon-o-cog')
                    ->collapsed(),
                // NavigationGroup::make()
                //     ->label('Blog')
                //     ->icon('heroicon-o-pencil'),
                // NavigationGroup::make()
                //     ->label(fn (): string => __('navigation.settings'))
                //     ->icon('heroicon-o-cog-6-tooth')
                //     ->collapsed(),
            ])
            ->emailVerification(false);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        dd(__DIR__);
        FilamentAsset::register([
            Js::make('cropper', __DIR__ . '/../../../resources/dist/js/cropper.min.js'),
            Css::make('cropper', __DIR__ . '/../../../resources/dist/css/cropper.min.css'),
        ]);
    }
}
