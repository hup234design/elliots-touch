<?php

namespace Database\Seeders;

use Awcodes\Curator\Models\Media;
use Carbon\Carbon;
use Hup234design\FilamentCms\Models\Event;
use Hup234design\FilamentCms\Models\EventCategory;
use Hup234design\FilamentCms\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now()->subDays(rand(14,28));

        for($x=10; $x>0; $x-- ) {
            $slug = 'dummy-event-' . $x;
            $title = Str::headline($slug);

            $media = Media::inRandomOrder()->first();

            $event = Event::updateOrCreate(
                [
                    'slug' => $slug,
                ],
                [
                    'title' => $title,
                    'date' => $date,
                    'is_visible' => rand(0, 10) ? 1 : 0,
                    'summary' => fake()->paragraph(6),
                    'content' => $this->makeContent(),
                    'event_category_id' => EventCategory::inRandomOrder()->first()->id
                ]
            );

            $event->featured_image()->create([
                'media_id' => $media->id,
                'type' => 'featured',
            ]);

            $date->subDays(rand(14,28));
        }

        $date = Carbon::now()->addDays(rand(14,28));

        for($x=11; $x<21; $x++ ) {
            $slug = 'dummy-event-' . $x;
            $title = Str::headline($slug);

            $media = Media::inRandomOrder()->first();

            $event = Event::updateOrCreate(
                [
                    'slug' => $slug,
                ],
                [
                    'title' => $title,
                    'date' => $date,
                    'is_visible' => rand(0, 10) ? 1 : 0,
                    'summary' => fake()->paragraph(6),
                    'content' => $this->makeContent(),
                    'event_category_id' => EventCategory::inRandomOrder()->first()->id
                ]
            );

            $event->featured_image()->create([
                'media_id' => $media->id,
                'type' => 'featured',
            ]);

            $date->addDays(rand(14,28));
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
