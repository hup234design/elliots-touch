<?php

use App\Livewire\Blocks\HelpOptionsBlock;
use App\Livewire\Blocks\LatestPostsBlock;
use App\Livewire\Blocks\PartnersBlock;
use App\Livewire\Blocks\TeamMembersBlock;
use App\Livewire\Blocks\UpcomingEventsBlock;
use App\Livewire\Blocks\EditorBlock;
use App\Livewire\Blocks\FundraisingIdeasBlock;
use App\Livewire\Blocks\GalleryBlock;
use App\Livewire\Blocks\GoogleMapBlock;
use App\Livewire\Blocks\ImageBlock;
use App\Livewire\Blocks\ProjectsBlock;

return [
    'blocks' => [
        LatestPostsBlock::schema(),
        UpcomingEventsBlock::schema(),
        TeamMembersBlock::schema(),
        PartnersBlock::schema(),
        HelpOptionsBlock::schema(),
        EditorBlock::schema(),
        FundraisingIdeasBlock::schema(),
        //GalleryBlock::schema(),
        GoogleMapBlock::schema(),
        ImageBlock::schema(),
        ProjectsBlock::schema(),
    ]
];
