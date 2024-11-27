<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'archive.home');
Route::view('/elliots-story', 'archive.elliots-story');
Route::view('/news-research', 'archive.news-research');
Route::view('/support-us', 'archive.support-us');
Route::view('/corporate-partners', 'archive.corporate-partners');
Route::view('/contact', 'archive.contact');
Route::view('/fundraising', 'archive.fundraising');
Route::view('/forms', 'archive.forms');

//Route::get('/events/{slug}', [EventController::class, 'event'])->name('events.event');
//Route::get('/events', [EventController::class, 'index'])->name('events.index');
//
//Route::get('/posts/{slug}', [PostController::class, 'post'])->name('posts.post');
//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//
//Route::get('/{slug}', [PageController::class, 'page'])->name('pages.page');
//Route::get('/', [PageController::class, 'home'])->name('pages.home');
