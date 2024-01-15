<?php

namespace Database\Seeders;

use Awcodes\Curator\Models\Media;
use Carbon\Carbon;
use Hup234design\FilamentCms\Models\Post;
use Hup234design\FilamentCms\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publish_at = Carbon::now();

        for($x=20; $x>0; $x-- ) {
            $slug = 'dummy-post-' . $x;
            $title = Str::headline($slug);

            $media = Media::inRandomOrder()->first();

            $post = Post::updateOrCreate(
                [
                    'slug' => $slug,
                ],
                [
                    'title' => $title,
                    'publish_at' => $publish_at,
                    'is_visible' => rand(0, 10) ? 1 : 0,
                    'summary' => fake()->paragraph(6),
                    'content' => $this->makeContent(),
                    'post_category_id' => PostCategory::inRandomOrder()->first()->id
                ]
            );

            $post->featured_image()->create([
                'media_id' => $media->id,
                'type' => 'featured',
            ]);

            $publish_at->subDays(rand(1,7))->subHours(rand(1,24))->subMinutes(rand(1,60))->subSeconds(rand(1,60));
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
