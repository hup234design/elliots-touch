<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public ?int    $home_banner_left_image;
    public ?int    $home_banner_center_image;
    public ?int    $home_banner_right_image;
    public ?string $home_intro_title;
    public ?string $home_intro_text;
    public ?array  $home_cta_links;
    public ?array  $home_content_blocks;
    public ?string $posts_page_title;
    public ?string $posts_page_introduction;
    public ?string $events_page_title;
    public ?string $events_page_introduction;
    public ?string $header_primary_menu;
    public ?string $footer_primary_menu;

    public static function group(): string
    {
        return 'settings';
    }
}