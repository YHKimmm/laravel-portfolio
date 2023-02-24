<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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
    return view('welcome');
});

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);

Route::get('/about', [ProjectController::class, 'about']);

Route::get('/projects/categories/{category:slug}', [ProjectController::class, 'listByCategory']);
Route::get('/projects/tags/{tag:slug}', [ProjectController::class, 'listByTag']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::fallback(function() {

    // Set a flash message
    session()->flash('error','Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/projects', [ProjectController::class, 'index']);
    Route::get('/admin/projects/create', [ProjectController::class, 'create']);
    Route::post('/admin/projects/create', [ProjectController::class, 'store']);
    Route::get('/admin/projects/{project:slug}/edit', [ProjectController::class, 'edit']);
    Route::patch('/admin/projects/{project:slug}/edit', [ProjectController::class, 'update']);
    Route::get('/admin/projects/{project:slug}/delete', [ProjectController::class, 'destroy']);
    Route::delete('/admin/projects/{project:slug}/delete', [ProjectController::class, 'destroy']);
    Route::get('/admin/projects/{project:slug}', [ProjectController::class, 'show']);
   
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users/create', [AdminController::class, 'create']);
    Route::post('/admin/users/create', [AdminController::class, 'store']);
    Route::get('/admin/users/{user:id}/edit', [AdminController::class, 'edit']);
    Route::patch('/admin/users/{user:id}/edit', [AdminController::class, 'update']);
    Route::get('/admin/users/{user:id}/delete', [AdminController::class, 'destroy']);
    Route::delete('/admin/users/{user:id}/delete', [AdminController::class, 'destroy']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories/create', [CategoryController::class, 'store']);
    Route::get('/admin/categories/{category:slug}/edit', [CategoryController::class, 'edit']);
    Route::patch('/admin/categories/{category:slug}/edit', [CategoryController::class, 'update']);
    Route::get('/admin/categories/{category:slug}/delete', [CategoryController::class, 'destroy']);
    Route::delete('/admin/categories/{category:slug}/delete', [CategoryController::class, 'destroy']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/tags/create', [TagController::class, 'create']);
    Route::post('/admin/tags/create', [TagController::class, 'store']);
    Route::get('/admin/tags/{tag:slug}/edit', [TagController::class, 'edit']);
    Route::patch('/admin/tags/{tag:slug}/edit', [TagController::class, 'update']);
    Route::get('/admin/tags/{tag:slug}/delete', [TagController::class, 'destroy']);
    Route::delete('/admin/tags/{tag:slug}/delete', [TagController::class, 'destroy']);
});

Route::get('/api/projects', [ProjectController::class, 'getProjectsJSON']);
Route::get('/api/categories', [CategoryController::class, 'getCategoriesJSON']);
Route::get('/api/tags', [TagController::class, 'getTagsJSON']);