<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use App\Settings\PostsPageSettings;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(PostsPageSettings $settings){
        $posts = Post::where('is_visible', true)->get();
        return view('posts', [
            'settings' => $settings,
            'posts' => $posts
        ]);
    }

    public function post(PostsPageSettings $settings, $slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post', [
            'settings' => $settings,
            'post' => $post
        ]);
    }
}
