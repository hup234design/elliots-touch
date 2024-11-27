<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['guest'])->group(function () {
//     Route::view('/elliots-story', 'archive.elliots-story')->name('archive.aout');
//     Route::view('/news-research', 'archive.news-research')->name('archive.news');
//     Route::view('/support-us', 'archive.support-us')->name('archive.support');
//     Route::view('/corporate-partners', 'archive.corporate-partners')->name('archive.partners');
//     Route::view('/contact', 'archive.contact')->name('archive.contact');
//     Route::view('/fundraising', 'archive.fundraising')->name('archive.fundraising');
//     Route::view('/forms', 'archive.forms')->name('archive.forms');
// });

    Route::get('/events/{slug}', [EventController::class, 'event'])->name('events.event');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    Route::get('/posts/{slug}', [PostController::class, 'post'])->name('posts.post');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/{slug}', [PageController::class, 'page'])->name('pages.page');
    Route::get('/', [PageController::class, 'home'])->name('pages.home');

Route::get('/', [PageController::class, 'home'])->name('pages.home');
