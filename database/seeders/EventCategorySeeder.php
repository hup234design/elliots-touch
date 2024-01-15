<?php

namespace Database\Seeders;

use Hup234design\FilamentCms\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x=1; $x<=5; $x++ ) {
            $slug = 'event-category-' . $x;
            $title = Str::headline($slug);

            EventCategory::updateOrCreate(
                ['slug' => $slug],
                ['title' => $title]
            );
        }
    }
}
