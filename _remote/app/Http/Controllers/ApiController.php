<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Mediable;
use App\Models\Page;
use App\Models\Post;
use App\Models\Section;
use App\Models\TeamMember;
use Awcodes\Curator\Models\Media;

class ApiController extends Controller
{
    public function media()
    {
        return response()->json(Media::all());
    }

    public function pages()
    {
        return response()->json(Page::all());
    }

    public function posts()
    {
        return response()->json(Post::all());
    }

    public function events()
    {
        return response()->json(Event::all());
    }

    public function sections()
    {
        return response()->json(Section::with('sectionItems')->get());
    }

    public function team()
    {
        return response()->json(TeamMember::all());
    }

    public function mediables()
    {
        return response()->json(Mediable::all());
    }
}
