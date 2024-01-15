<?php

namespace Database\Seeders;

use Hup234design\FilamentCms\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x=1; $x<=5; $x++ ) {
            $slug = 'post-category-' . $x;
            $title = Str::headline($slug);

            PostCategory::updateOrCreate(
                ['slug' => $slug],
                ['title' => $title]
            );
        }
    }
}
