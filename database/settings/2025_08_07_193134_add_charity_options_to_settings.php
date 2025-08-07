<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings.charity_name', "");
        $this->migrator->add('settings.charity_url', "");
        $this->migrator->add('settings.charity_logo', null);
    }
};
