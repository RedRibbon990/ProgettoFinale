<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

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

// Announcement
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
// All
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
// Show
Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');


Route::get('article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
