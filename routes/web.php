<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\TagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/search', [PostController::class, 'filter']);
Route::get('/posts/popular', [PostController::class, 'popular']);
Route::get('/posts/{slug}', [PostController::class, 'showBySlug']);
Route::get('/tag/{slug}', [TagController::class, 'showBySlug']);
Route::get('/category', [CategoryController::class, 'indexPage']);
Route::get('/{category}', [CategoryController::class, 'showByName']);
