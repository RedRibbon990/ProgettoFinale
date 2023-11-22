<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
// By Category
Route::get('article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
// By Author
Route::get('article/user/{user}', [ArticleController::class, 'byAuthor'])->name('article.byAuthor');

// Contact
Route::get('/careers', [PublicController::class, 'careers'])->name('careers')->middleware('auth');
Route::get('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');

Route::patch('/admin/reject-request/{user}/{role}', [AdminController::class, 'rejectRequest'])->name('admin.rejectRequest');

// Home's Role

// Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::middleware('admin')->group(function() {
    Route::post('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');

});
// Revisor
Route::middleware('revisor')->group(function (){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::get('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.accept');
    Route::get('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.reject');
    Route::get('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undo');
});
// Writer
Route::middleware('writer')->group(function (){
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    
});

// Search
Route::get('article/search', [ArticleController::class, 'articleSearch'])->name('article.search');
