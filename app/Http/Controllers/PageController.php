<?php

namespace App\Http\Controllers;

use App\Models\Pages\Page;
use App\Settings\HomePageSettings;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(HomePageSettings $settings){
        return view('home', ['settings' => $settings ]);
    }

    public function page($slug){
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', ['page' => $page ]);
    }
}
