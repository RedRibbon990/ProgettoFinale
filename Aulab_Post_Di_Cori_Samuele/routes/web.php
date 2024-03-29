<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WriterController;

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
    // Create
Route::middleware(['auth'])->group(function (){
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
});
// Contact
Route::get('/careers', [PublicController::class, 'careers'])->name('careers')->middleware('auth');
Route::get('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');

// Admin
Route::middleware('admin')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Show User
    Route::get('/admin/users', [AdminController::class, 'showAllUsers'])->name('admin.showUser');
    // Change User Role
    Route::post('/admin/change-user-role/{user}/{newRole}', [AdminController::class, 'changeUserRole'])->name('admin.changeUserRole');
    Route::get('/admin/change-user-role/{user}/{currentRole}/{newRole}', [AdminController::class, 'showChangeUserRoleView'])->name('admin.changeUserRoleView');
    // Set role
    Route::post('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    // Reject role
    Route::patch('/admin/reject-request/{user}/{role}', [AdminController::class, 'rejectRequest'])->name('admin.rejectRequest');
    // Tag
    Route::put('/admin/edit/{tag}/tag', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    // Category
    Route::put('/admin/edit/{category}/category', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
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
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('article/{article}', [ArticleController::class, 'update'])->name('article.update');

});

// Search
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');
