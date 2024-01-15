<?php

namespace Database\Seeders;

use Hup234design\FilamentCms\Models\IndexPage;
use Illuminate\Database\Seeder;

class IndexPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IndexPage::updateOrCreate(
                [
                    'for' => 'posts',
                ],
                [
                    'title' => 'Posts',
                    'slug' => 'posts',
                ]
            );

        IndexPage::updateOrCreate(
            [
                'for' => 'events',
            ],
            [
                'title' => 'Events',
                'slug' => 'events',
            ]
        );

        IndexPage::updateOrCreate(
            [
                'for' => 'testimonials',
            ],
            [
                'title' => 'Testimonials',
                'slug' => 'testimonials',
            ]
        );
    }
}
