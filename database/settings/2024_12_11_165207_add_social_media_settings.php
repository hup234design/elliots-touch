<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings.social_facebook', null);
        $this->migrator->add('settings.social_instagram', null);
        $this->migrator->add('settings.social_youtube', null);
        $this->migrator->add('settings.social_linkedin', null);
        $this->migrator->add('settings.social_twitter', null);
        $this->migrator->add('settings.social_bluesky', null);
    }
};
