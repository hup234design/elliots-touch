<?php

use Hup234design\FilamentCms\Http\Controllers\EventController;
use Hup234design\FilamentCms\Http\Controllers\PageController;
use Hup234design\FilamentCms\Http\Controllers\PostController;
use Hup234design\FilamentCms\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->group(function () {

    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');

    Route::get('/events/category/{slug}', [EventController::class, 'category'])->name('events.category');
    Route::get('/events/{slug}', [EventController::class, 'event'])->name('events.event');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    Route::get('/posts/category/{slug}', [PostController::class, 'category'])->name('posts.category');
    Route::get('/posts/{slug}', [PostController::class, 'post'])->name('posts.post');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/{slug}', [PageController::class, 'page'])->name('page');
    Route::get('/', [PageController::class, 'home'])->name('home');

});
