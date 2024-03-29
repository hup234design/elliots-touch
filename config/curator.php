<?php

return [
    'accepted_file_types' => [
        'image/jpeg',
        'image/png',
        'image/webp',
        'image/svg+xml',
        'application/pdf',
    ],
    'cloud_disks' => [
        's3',
        'cloudinary',
        'imgix',
    ],
    'curation_formats' => [
        'jpg',
        'jpeg',
        'webp',
        'png',
        'avif',
    ],
    'curation_presets' => [
        \Hup234design\FilamentCms\Filament\Curator\Curations\ThumbnailPreset::class,
        \Hup234design\FilamentCms\Filament\Curator\Curations\HeaderPreset::class,
        \Hup234design\FilamentCms\Filament\Curator\Curations\SeoPreset::class,
    ],
    'directory' => 'media',
    'disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),
    'glide' => [
        'server' => \Awcodes\Curator\Glide\DefaultServerFactory::class,
        'fallbacks' => [],
        'route_path' => 'curator',
    ],
    'image_crop_aspect_ratio' => null,
    'image_resize_mode' => null,
    'image_resize_target_height' => null,
    'image_resize_target_width' => null,
    'is_limited_to_directory' => false,
    'is_tenant_aware' => true,
    'max_size' => 5000,

    //'model' => \Awcodes\Curator\Models\Media::class,
    'model' => \Hup234design\FilamentCms\Models\CustomMedia::class,

    'min_size' => 0,
    'path_generator' => null,
    'resources' => [
        'label' => 'Media',
        'plural_label' => 'Media',
        'navigation_group' => null,
        'navigation_icon' => 'heroicon-o-photo',
        'navigation_sort' => null,
        'navigation_count_badge' => false,
        'resource' => \Awcodes\Curator\Resources\MediaResource::class,
    ],
    'should_preserve_filenames' => true,
    'should_register_navigation' => true,
    'visibility' => 'public',
];
