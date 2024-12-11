<?php

namespace App\Console\Commands;

use App\Models\Content\FundraisingIdea;
use App\Models\Content\HelpOption;
use App\Models\Content\Partner;
use App\Models\Content\Project;
use App\Models\Content\TeamMember;
use App\Models\Events\Event;
use App\Models\Media\Mediable;
use App\Models\Menus\Menu;
use App\Models\Menus\MenuItem;
use App\Models\Pages\Page;
use App\Models\Posts\Post;
use Awcodes\Curator\Models\Media;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = DB::getDriverName(); // Get the database driver

        if ($connection === 'sqlite') {
            // SQLite-specific logic
            DB::statement('PRAGMA foreign_keys = OFF');
            DB::table('pages')->truncate();
            DB::table('posts')->truncate();
            DB::table('events')->truncate();
            DB::table('team_members')->truncate();
            DB::table('fundraising_ideas')->truncate();
            DB::table('projects')->truncate();
            DB::table('help_options')->truncate();
            DB::table('partners')->truncate();
            //DB::table('menu_items')->truncate();
            //DB::table('menus')->truncate();

            DB::table('mediables')->truncate();
            Media::query()->delete();
            DB::table('media')->truncate();

            DB::statement('PRAGMA foreign_keys = ON');
        } elseif ($connection === 'mysql') {
            // MySQL-specific logic
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            DB::table('pages')->truncate();
            DB::table('posts')->truncate();
            DB::table('events')->truncate();
            DB::table('team_members')->truncate();
            DB::table('fundraising_ideas')->truncate();
            DB::table('projects')->truncate();
            DB::table('help_options')->truncate();
            DB::table('partners')->truncate();
//            DB::table('menu_items')->truncate();
//            DB::table('menus')->truncate();

            DB::table('mediables')->truncate();
            Media::query()->delete();
            DB::table('media')->truncate();

            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        } else {
            throw new \Exception("Unsupported database connection: $connection");
        }

        $this->importMedia();
        $this->importPages();
        $this->importPosts();
        $this->importEvents();
        $this->importTeamMembers();
        $this->importSections();

        $this->importMediables();

//        $this->addMenus();
    }

    private function importTeamMembers()
    {
        $response = Http::get('https://elliotstouch.hup234design.com/api/team');
        $data = $response->collect()->toArray();
        foreach ($data as $item) {
            $teamMember = TeamMember::create([
                'id' => $item['id'],
                'sort_order' => $item['sort_order'],
                'name' => $item['name'],
                'role' => $item['role'],
                'bio' => $item['bio'],
                'profile_image' => $item['media_id']
                    ? [ 'media_id' => $item['media_id'] ]
                    : null,
                'is_visible' => $item['is_visible'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ]);
        }
        $this->info('Team Members Imported');
    }

    private function importSections()
    {
        $response = Http::get('https://elliotstouch.hup234design.com/api/sections');
        $data = $response->collect()->toArray();
        foreach ($data as $section) {
            switch ($section['slug']) {
                case "projects":
                    foreach ($section['section_items'] as $item) {
                        Project::create([
                            'id' => $item['id'],
                            'sort_order' => $item['sort_order'],
                            'title' => $item['title'],
                            'subtitle' => $item['subtitle'],
//                            'content' => json_encode($item['content']),
                            'content' => tiptap_converter()->asHTML($item['content']),
                            'is_visible' => $item['is_visible'],
                            'created_at' => $item['created_at'],
                            'updated_at' => $item['updated_at'],
                        ]);
                    }
                    break;
                case "fundraising-ideas":
                    foreach ($section['section_items'] as $item) {
                        FundraisingIdea::create([
                            'id' => $item['id'],
                            'sort_order' => $item['sort_order'],
                            'title' => $item['title'],
//                            'content' => $item['content'],
                            'content' => tiptap_converter()->asHTML($item['content']),
                            'is_visible' => $item['is_visible'],
                            'created_at' => $item['created_at'],
                            'updated_at' => $item['updated_at'],
                        ]);
                    }
                    break;
                case "ways-to-help":
                    foreach ($section['section_items'] as $item) {
                        HelpOption::create([
                            'id' => $item['id'],
                            'sort_order' => $item['sort_order'],
                            'title' => $item['title'],
//                            'content' => json_encode($item['content']),
                            'content' => tiptap_converter()->asHTML($item['content']),
                            'is_visible' => $item['is_visible'],
                            'created_at' => $item['created_at'],
                            'updated_at' => $item['updated_at'],
                        ]);
                    }
                    break;
                case "partners":
                    foreach ($section['section_items'] as $item) {
                        Partner::create([
                            'id' => $item['id'],
                            'sort_order' => $item['sort_order'],
                            'name' => $item['title'],
//                            'description' => json_encode($item['content']),
                            'description' => tiptap_converter()->asHTML($item['content']),
                            'url' => $item['url'],
                            'is_visible' => true,
                            'created_at' => $item['created_at'],
                            'updated_at' => $item['updated_at'],
                        ]);
                    }
                    break;
                default:
                    break;
            }
        }
        $this->info('Sections Imported');
    }

    private function importPages()
    {
        $response = Http::get('https://elliotstouch.hup234design.com/api/pages');
        $data = $response->collect()->toArray();
        foreach ($data as $item) {
                $content = [];
                if( $sections = $item['content'] ) {
                    foreach ($sections['content'] ?? [] as $idx=>$section) {
                        if( $section['type'] == "tiptapBlock" ) {
                            if( $section['attrs']['type'] == "galleryBlock") {
                                $content[] = [
                                    "type" => "gallery_block",
                                    "data" => [
                                        "images" => $section['attrs']['data']['images']
                                    ]
                                ];
                                unset($item['content']['content'][$idx]);
                                // Reindex the array to reset keys
                                $item['content']['content'] = array_values($item['content']['content']);
                            }
                        }
                    }
                }

                $content[] = [
                    "type" => "editor_block",
                    "data" => [
                        "content" => tiptap_converter()->asHTML($item['content'])
                    ]
                ];

                if($item['is_home']) {

                    $content = [];

                    $content[] = [
                        "type" => "image_block",
                        "data" => [
                            'include_header' => true,
                            'header_title' => "A message from the Stevens family...",
                            'title_alignment' => "left",
                            'include_text' => true,
                            'text_alignment' => 'left',
                            'text' => "<p>Welcome to Elliot's Touch, where you can find out all about our charity, the projects we are supporting and the events we hold throughout the year. Our aim is to bring communities together to raise awareness and funds for research into Mitochondrial Disease and Cardiomyopathy, which took the life of our son Elliot at only a year old. We hope that one day our research will make a real difference in supporting other families and helping to find cures for these horrible diseases.</p><p>Thank you to all those who support us!</p><p>Donna and Paul Stevens</p>",
                            'image' => [
                                'media_id' => 222
                            ]
                        ]
                    ];

                    $content[] = [
                        "type" => "upcoming_events_block",
                        "data" => [
                            'include_header' => true,
                            'header_title' => "Upcoming Events",
                            'title_alignment' => "center",
                        ]
                    ];
                    $content[] = [
                        "type" => "latest_posts_block",
                        "data" => [
                            'include_header' => true,
                            'header_title' => "Latest News",
                            'title_alignment' => "center",
                        ]
                    ];
                }
                elseif( $item['id'] == 7) {
                    $content[] = [
                        "type" => "team_members_block",
                        "data" => [
                            'include_header' => false,
                        ]
                    ];
                }
                elseif( $item['id'] == 8) {
                    $content[] = [
                        "type" => "projects_block",
                        "data" => [
                            'include_header' => false,
                        ]
                    ];
                }
                elseif( $item['id'] == 9) {
                    $content[] = [
                        "type" => "partners_block",
                        "data" => [
                            'include_header' => false,
                        ]
                    ];
                }
                elseif( $item['id'] == 4) {
                    $content[] = [
                        "type" => "help_options_block",
                        "data" => [
                            'include_header' => false,
                        ]
                    ];
                }
                elseif( $item['id'] == 5) {
                    $content[] = [
                        "type" => "fundraising_ideas_block",
                        "data" => [
                            'include_header' => false,
                        ]
                    ];
                }

//                ["title" => "Ways To Help", "page_id" => "4"],
//                ["title" => "Fundraising Ideas", "page_id" => "5"],


                Page::create([
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'slug' => Str::slug($item['title']),
                    'content' => $content,
                    'is_visible' => $item['is_visible'],
                    'is_home' => $item['is_home'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at'],
                ]);
            }

        $this->info('Pages Imported');
    }

    private function importPosts()
    {
        $response = Http::get('https://elliotstouch.hup234design.com/api/posts');
        $data = $response->collect()->toArray();
        foreach ($data as $item) {
            $post = Post::create([
                'id' => $item['id'],
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'summary' => $item['summary'],
//                'content' => json_encode($item['content']),
                'content' => tiptap_converter()->asHTML($item['content']),
                'is_visible' => $item['is_visible'],
                'published_at' => $item['published_at'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ]);
        }
        $this->info('Posts Imported');
    }

    private function importEvents()
    {
        $response = Http::get('https://elliotstouch.hup234design.com/api/events');
        $data = $response->collect()->toArray();
        foreach ($data as $item) {
            Event::create([
                'id' => $item['id'],
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'summary' => $item['summary'],
//                'content' => json_encode($item['content']),
                'content' => tiptap_converter()->asHTML($item['content']),
                'is_visible' => $item['is_visible'],
                'date' => $item['date'],
                'start_time' => $item['start_time'],
                'end_time' => $item['end_time'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ]);
        }
        $this->info('Events Imported');
    }

    private function importMedia()
    {
        $response = Http::get('https://elliotstouch.hup234design.com/api/media');
        $data = $response->collect()->toArray();
        foreach ($data as $item) {
            $url = "https://elliotstouch.hup234design.com/storage/" . $item['path'];
            $name = Str::slug($item['title'],'-');

            $item['curations'] = null;
            $item['name'] = $name;
            $item['path'] = "media/" . $name . "." . $item['ext'];
            $item['title'] = $name;

            unset($item['url']);
            unset($item['thumbnail_url']);
            unset($item['medium_url']);
            unset($item['large_url']);
            unset($item['resizable']);
            unset($item['size_for_humans']);
            unset($item['pretty_name']);

            Media::create($item);
            $imageContents = file_get_contents($url);
            Storage::disk('public')->put($item['path'], $imageContents);
        }
        $this->info('Media Imported');
    }

    private function importMediables()
    {
        $mediablesResponse = Http::get('https://elliotstouch.hup234design.com/api/mediables');

        // POSTS
        $data = $mediablesResponse->collect()
            ->where('mediable_type', 'App\Models\Post')
            ->where('type', 'featured')
            ->whereIn('mediable_id', Post::all()->pluck('id'))
            ->toArray();
        foreach ($data as $item) {
            Post::find($item['mediable_id'])->update([
                'featured_image' => [
                    'media_id' => $item['media_id']
                ]
            ]);
        }

        // EVENTS
        $data = $mediablesResponse->collect()
            ->where('mediable_type', 'App\Models\Event')
            ->where('type', 'featured')
            ->whereIn('mediable_id', Event::all()->pluck('id'))
            ->toArray();
        foreach ($data as $item) {
            Event::find($item['mediable_id'])->update([
                'featured_image' => [
                    'media_id' => $item['media_id']
                ]
            ]);
        }

        // PROJECTS
        $data = $mediablesResponse->collect()
            ->where('mediable_type', 'App\Models\SectionItem')
            ->where('type', 'featured')
            ->whereIn('mediable_id', Project::all()->pluck('id'))
            ->toArray();
        foreach ($data as $item) {
            Project::find($item['mediable_id'])->update([
                'featured_image' => [
                    'media_id' => $item['media_id']
                ]
            ]);
        }

        // FUNDRAISING IDEAS
        $data = $mediablesResponse->collect()
            ->where('mediable_type', 'App\Models\SectionItem')
            ->where('type', 'featured')
            ->whereIn('mediable_id', FundraisingIdea::all()->pluck('id'))
            ->toArray();
        foreach ($data as $item) {
            FundraisingIdea::find($item['mediable_id'])->update([
                'featured_image' => [
                    'media_id' => $item['media_id']
                ]
            ]);
        }

        // HELP OPTIONS
        $data = $mediablesResponse->collect()
            ->where('mediable_type', 'App\Models\SectionItem')
            ->where('type', 'featured')
            ->whereIn('mediable_id', HelpOption::all()->pluck('id'))
            ->toArray();
        foreach ($data as $item) {
            HelpOption::find($item['mediable_id'])->update([
                'featured_image' => [
                    'media_id' => $item['media_id']
                ]
            ]);
        }

        // PARTNERS OPTIONS
        $data = $mediablesResponse->collect()
            ->where('mediable_type', 'App\Models\SectionItem')
            ->where('type', 'featured')
            ->whereIn('mediable_id', Partner::all()->pluck('id'))
            ->toArray();
        foreach ($data as $item) {
            Partner::find($item['mediable_id'])->update([
                'logo' => [
                    'media_id' => $item['media_id']
                ]
            ]);
        }

        $this->info('Mediables Imported');
    }

    private function addMenus()
    {
        $menu = Menu::create([
            'title' => 'Header',
            'slug' => 'header'
        ]);

        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Home', 'route' => 'pages.home']);
        MenuItem::create([
            'menu_id' => $menu->id, 'title'=>'About', 'route' => 'dropdown',
            'children' => [
                ["title" => "Elliot's Story", "page_id" => 2],
                ["title" => "Our Team", "page_id" => 7],
                ["title" => "Mitochondrial Disease", "page_id" => 3],
                ["title" => "Our Projects", "page_id" => 8],
                ["title" => "Our Partners", "page_id" => 9],
            ]
        ]);
        MenuItem::create([
            'menu_id' => $menu->id, 'title'=>'Help us', 'route' => 'dropdown',
            'children' => [
                ["title" => "Ways To Help", "page_id" => "4"],
                ["title" => "Fundraising Ideas", "page_id" => "5"],
            ]
        ]);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Partners', 'route' => 'pages.page', 'page_id' => 9]);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Events', 'route' => 'events.index']);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'News', 'route' => 'posts.index']);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Contact', 'route' => 'pages.page', 'page_id' => 6]);

        $menu = Menu::create([
            'title' => 'Footer',
            'slug' => 'footer'
        ]);

        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Home', 'route' => 'pages.home']);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Partners', 'route' => 'pages.page', 'page_id' => 9]);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Events', 'route' => 'events.index']);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'News', 'route' => 'posts.index']);
        MenuItem::create(['menu_id' => $menu->id, 'title'=>'Contact', 'route' => 'pages.page', 'page_id' => 6]);

        $this->info('Menus Created');
    }
}
