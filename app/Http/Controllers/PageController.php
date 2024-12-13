<?php

namespace App\Http\Controllers;

use App\Models\Pages\Page;
use App\Settings\SiteSettings;
use Awcodes\Curator\Models\Media;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        if (auth()->check()) {
            $page = Page::where('is_home', true)->firstOrFail();
            return view('home', ['page' => $page]);
        } else {
            return view('archive.home');
        }
    }

    public function page($slug)
    {
        if (auth()->check()) {
            $page = Page::where('slug', $slug)->firstOrFail();
            return view('page', ['page' => $page]);
        } else {
            return view('archive.' . $slug);
        }
    }
}
