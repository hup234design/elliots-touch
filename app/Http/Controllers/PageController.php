<?php

namespace App\Http\Controllers;

use App\Models\Pages\Page;
use App\Settings\SiteSettings;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(SiteSettings $settings){
        return view('home', ['settings' => $settings ]);
    }

    public function page($slug){
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', ['page' => $page ]);
    }
}
