<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hup234design\FilamentCms\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('PRAGMA FOREIGN_KEY_CHECKS = 0'); //close foreign_key limit
        DB::table('pages')->truncate();
        DB::table('index_pages')->truncate();
        DB::table('posts')->truncate();
        DB::table('post_categories')->truncate();
        DB::table('events')->truncate();
        DB::table('event_categories')->truncate();
        DB::table('headerables')->truncate();
        DB::table('mediables')->truncate();
        DB::table('seo')->truncate();
        DB::statement('PRAGMA FOREIGN_KEY_CHECKS = 1'); //open foreign_key limit

        $this->call(PageSeeder::class);
        $this->call(IndexPageSeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(EventCategorySeeder::class);
        $this->call(EventSeeder::class);
    }
}
