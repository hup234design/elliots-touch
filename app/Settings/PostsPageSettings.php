<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PostsPageSettings extends Settings
{
    public string $title;
    public string $introduction;

    public static function group(): string
    {
        return 'posts_page';
    }
}
