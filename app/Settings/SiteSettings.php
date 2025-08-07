<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
//    public ?int    $home_banner_left_image;
//    public ?int    $home_banner_center_image;
//    public ?int    $home_banner_right_image;
//    public ?string $home_intro_title;
//    public ?string $home_intro_text;
//    public ?array  $home_cta_links;
//    public ?array  $home_content_blocks;
    public ?string $posts_page_title;
    public ?string $posts_page_introduction;
    public ?string $events_page_title;
    public ?string $events_page_introduction;
    public ?string $header_primary_menu;
    public ?string $footer_primary_menu;
    public ?string $social_facebook;
    public ?string $social_instagram;
    public ?string $social_youtube;
    public ?string $social_linkedin;
    public ?string $social_twitter;
    public ?string $social_bluesky;
    public ?string $site_name;
    public ?bool   $site_active;
    public ?string $charity_name;
    public ?string $charity_url;
    public ?int $charity_logo;
    public ?string $charity_text;

    public static function group(): string
    {
        return 'settings';
    }
}
