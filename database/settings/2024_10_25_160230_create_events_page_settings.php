<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('events_page.title', '');
        $this->migrator->add('events_page.introduction', '');
    }
};
