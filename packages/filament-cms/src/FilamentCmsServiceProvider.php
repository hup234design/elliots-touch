<?php

namespace Hup234design\FilamentCms;

use Hup234design\FilamentCms\Components\AppLayout;
use Hup234design\FilamentCms\Components\EventsLayout;
use Hup234design\FilamentCms\Components\MediaImageRenderer;
use Hup234design\FilamentCms\Components\PostsLayout;
use Hup234design\FilamentCms\Commands\CreateMediaCurations;
use Hup234design\FilamentCms\ContentBlocks\ButtonsBlock;
use Hup234design\FilamentCms\ContentBlocks\CallToActionBlock;
use Hup234design\FilamentCms\ContentBlocks\CardsBlock;
use Hup234design\FilamentCms\ContentBlocks\ContactBlock;
use Hup234design\FilamentCms\ContentBlocks\ImagesBlock;
use Hup234design\FilamentCms\ContentBlocks\MediaObjectListBlock;
use Hup234design\FilamentCms\ContentBlocks\MediaObjectBlock;
use Hup234design\FilamentCms\ContentBlocks\LatestEventsBlock;
use Hup234design\FilamentCms\ContentBlocks\LatestPostsBlock;
use Hup234design\FilamentCms\Livewire\EnquiryForm;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCmsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'cms';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViewComponents('cms',
                AppLayout::class, PostsLayout::class, EventsLayout::class, MediaImageRenderer::class)
            ->hasViews()
            ->hasMigrations([
                'create_mediables_table',
                'create_headerables_table',
                'create_pages_table',
                'create_index_pages_table',
                'create_post_categories_table',
                'create_posts_table',
                'create_event_categories_table',
                'create_events_table',
                'create_enquiries_table',
                'create_testimonials_table',
            ])
            ->hasConfigFile(['cms'])
            ->hasRoute('web')
            ->hasCommand(CreateMediaCurations::class);
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        $this->app->singleton(FilamentCmsSettings::class, function () {
            return FilamentCmsSettings::make(storage_path('app/cms-settings.json'));
        });
    }

    public function packageBooted(): void
    {
        Livewire::component('enquiry-form', EnquiryForm::class);

        Livewire::component('call-to-action-block', CallToActionBlock::class);
        Livewire::component('latest-posts-block', LatestPostsBlock::class);
        Livewire::component('latest-events-block', LatestEventsBlock::class);
        Livewire::component('images-block', ImagesBlock::class);
        Livewire::component('buttons-block', ButtonsBlock::class);
        Livewire::component('cards-block', CardsBlock::class);
        Livewire::component('media-object-block', MediaObjectBlock::class);
        Livewire::component('media-object-list-block', MediaObjectListBlock::class);
        Livewire::component('contact-block', ContactBlock::class);

        //Blade::component('curator-glider', Glider::class);
    }
}

