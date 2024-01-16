<?php

namespace Hup234design\FilamentCms\ContentBlocks;

use Filament\Forms\Components\TextInput;
use Hup234design\FilamentCms\Filament\Forms\Fields\ContentBlockHeader;
use Hup234design\FilamentCms\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class LatestPostsBlock extends AbstractContentBlock
{

    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            ContentBlockHeader::make()
        ];
    }

    public function render()
    {
        $posts = Post::visible()->orderBy('publish_at','desc')->take(3)->get();
        return view('cms::content-blocks.latest-posts-block', compact('posts'));
    }
}
