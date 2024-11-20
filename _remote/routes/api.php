<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(\App\Http\Controllers\ApiController::class)
    ->group(function () {
        Route::get('media', 'media');
        Route::get('pages', 'pages');
        Route::get('posts', 'posts');
        Route::get('events', 'events');
        Route::get('sections', 'sections');
        Route::get('team', 'team');
        Route::get('mediables', 'mediables');
    });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
