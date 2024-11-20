<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('home_page.banner_left_image', 0);
        $this->migrator->add('home_page.banner_center_image', 0);
        $this->migrator->add('home_page.banner_right_image', 0);
        $this->migrator->add('home_page.intro_title', '');
        $this->migrator->add('home_page.intro_text', '');
        $this->migrator->add('home_page.cta_links', []);
        $this->migrator->add('home_page.events_title', '');
        $this->migrator->add('home_page.events_text', '');
        $this->migrator->add('home_page.posts_title', '');
        $this->migrator->add('home_page.posts_text', '');
    }
};
