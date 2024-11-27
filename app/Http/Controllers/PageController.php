<?php

namespace App\Http\Controllers;

use App\Models\Pages\Page;
use App\Settings\SiteSettings;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(SiteSettings $settings)
    {

        if (auth()->check()) {
            return view('home', ['settings' => $settings]);
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
