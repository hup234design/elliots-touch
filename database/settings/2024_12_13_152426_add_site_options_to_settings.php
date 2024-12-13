<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings.site_name', "");
        $this->migrator->add('settings.site_active', false);
    }
};
