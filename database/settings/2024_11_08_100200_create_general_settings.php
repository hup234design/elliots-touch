<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', '');
        $this->migrator->add('general.socials', []);
        $this->migrator->add('general.donation_label', '');
        $this->migrator->add('general.donation_url', '');
        $this->migrator->add('general.footer_text', '');
        $this->migrator->add('general.footer_copyright', '');
        $this->migrator->add('general.header_primary_menu', 0);
        $this->migrator->add('general.footer_primary_menu', 0);
    }
};
