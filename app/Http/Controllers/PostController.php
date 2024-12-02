<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use App\Settings\SiteSettings;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(SiteSettings $settings){
        $posts = Post::where('is_visible', true)->get();
        return view('posts', [
            'settings' => $settings,
            'posts' => $posts
        ]);
    }

    public function post(SiteSettings $settings, $slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post', [
            'settings' => $settings,
            'post' => $post
        ]);
    }
}
