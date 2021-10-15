<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');
Route::post('/check/creat', [\App\Http\Controllers\CheckController::class, 'creat'])->name('creat');
Route::get('/check/list', [\App\Http\Controllers\CheckController::class, 'list'])->name('list');


