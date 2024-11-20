<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EventsPageSettings extends Settings
{
    public string $title;
    public string $introduction;

    public static function group(): string
    {
        return 'events_page';
    }
}
