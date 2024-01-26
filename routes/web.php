<?php

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

\Livewire\Livewire::setScriptRoute(function ($handle) {
    return Route::get(env('LIVEWIRE_SCRIPT_ROUTE', '/livewire/livewire.js'), $handle);
});

\Livewire\Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('LIVEWIRE_UPDATE_ROUTE', '/livewire/update'), $handle);
});
//Route::get('/', function () {
//    return view('welcome');
//});
