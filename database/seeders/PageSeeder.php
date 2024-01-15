<?php

namespace Database\Seeders;

use Awcodes\Curator\Models\Media;
use Carbon\Carbon;
use Hup234design\FilamentCms\Models\Page;
use Hup234design\FilamentCms\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::updateOrCreate(['is_home' => 1],[
            'title' => 'Home',
            'slug' => 'home',
            'is_visible' => 1,
            'content' => $this->makeContent(),
        ]);
        $page->featured_image()->create([
            'media_id' => Media::inRandomOrder()->first()->id,
            'type' => 'featured',
        ]);

        $slugs = ['about','research','help-us','fundraising','contact-us'];

        foreach( $slugs as $slug )
        {
            $page = Page::updateOrCreate(['slug' => $slug],[
                'title' => Str::headline($slug),
                'is_visible' => 1,
                'content' => $this->makeContent(),
            ]);

            $page->featured_image()->create([
                'media_id' => Media::inRandomOrder()->first()->id,
                'type' => 'featured',
            ]);
        }
    }

    private function makeContent() {
        $content = [];
        for($x=1; $x<=rand(3,5); $x++) {

            $content[] = [
                'type' => 'paragraph',
                'attrs' => [
                    'textAlign' => 'start',
                    'class' => null
                ],
                'content' => [
                    [
                        'type' => 'text',
                        'text' => fake()->paragraph(rand(10,15), true)
                    ],
                ],
            ];
        }
        return [
            'type' => 'doc',
            'content' => $content
        ];
    }
}
