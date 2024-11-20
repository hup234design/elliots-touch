<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomePageSettings extends Settings
{
    public int  $banner_left_image;
    public int  $banner_center_image;
    public int  $banner_right_image;
    public string $intro_title;
    public string $intro_text;
    public array  $cta_links;
    public string $events_title;
    public string $events_text;
    public string $posts_title;
    public string $posts_text;

    public static function group(): string
    {
        return 'home_page';
    }
}
