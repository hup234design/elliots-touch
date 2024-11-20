<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string|null $site_name;
    public array|null  $socials;
    public string|null $donation_label;
    public string|null $donation_url;
    public string|null $footer_text;
    public string|null $footer_copyright;
    public string|null $header_primary_menu;
    public string|null $footer_primary_menu;

    public static function group(): string
    {
        return 'general';
    }
}
