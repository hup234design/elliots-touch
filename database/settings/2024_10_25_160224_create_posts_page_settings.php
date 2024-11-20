<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('posts_page.title', '');
        $this->migrator->add('posts_page.introduction', '');
    }
};
