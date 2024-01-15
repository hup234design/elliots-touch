<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\IndexPage;
use Hup234design\FilamentCms\Models\Post;
use Hup234design\FilamentCms\Models\PostCategory;

class PostController extends Controller
{
    public function index()
    {
        $page = IndexPage::where('for', 'posts')->firstOrFail();

        $posts = Post::query()
            ->where('is_visible', true)
            ->orderBy('publish_at', 'desc')
            ->paginate(10);

        return view('cms::posts.index', compact('page', 'posts'));
    }

    public function post($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return view('cms::posts.post', compact('post'));
    }

    public function category($slug)
    {
        $category = PostCategory::whereSlug($slug)->firstOrFail();

        $posts = $category
            ->posts()
            ->visible()
            ->orderBy('publish_at', 'desc')
            ->paginate(10);

        return view('cms::posts.category', compact('category','posts'));
    }
}
