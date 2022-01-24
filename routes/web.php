<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

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

Route::get('/search', [SearchController::class, 'index']);
Route::get('/profile', [SearchController::class, 'index']);
Route::get('/profile/{id}', [ProfileController::class, 'index']);
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit']);
Route::put('profile/{id}', [ProfileController::class, 'update']);
//Route::get('/profile/{id}', [ProfileController::class, 'show']);

Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

