<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings.home_banner_left_image', 3);
        $this->migrator->add('settings.home_banner_center_image', 7);
        $this->migrator->add('settings.home_banner_right_image', 14);
        $this->migrator->add('settings.home_intro_title', "A message from the Stevens family...");
        $this->migrator->add('settings.home_intro_text', "<p>Welcome to Elliot's Touch, where you can find out all about our charity, the projects we are supporting and the events we hold throughout the year. Our aim is to bring communities together to raise awareness and funds for research into Mitochondrial Disease and Cardiomyopathy, which took the life of our son Elliot at only a year old. We hope that one day our research will make a real difference in helping to find cures for these horrible diseases.<br><br>Thank you to all those who support us!<br><br>Donna and Paul Stevens<\/p><p><br><\/p>");
        $this->migrator->add('settings.home_cta_links', []);
        $this->migrator->add('settings.home_content_blocks', []);
        $this->migrator->add('settings.posts_page_title', 'News');
        $this->migrator->add('settings.posts_page_introduction', null);
        $this->migrator->add('settings.events_page_title', 'Events');
        $this->migrator->add('settings.events_page_introduction', '');
        $this->migrator->add('settings.header_primary_menu', null);
        $this->migrator->add('settings.footer_primary_menu', null);
    }

    public function down(): void
    {
        \Spatie\LaravelSettings\Models\SettingsProperty::query()->delete();
    }
};
