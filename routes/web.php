<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/thoughts/categories', 'index')
        ->name("categories.index");
    Route::get('/thoughts/categories/{category:slug}', 'show')
        ->name("categories.show");
});


Route::controller(PostController::class)->group(function () {
    Route::get('/thoughts', 'index')
        ->name("posts.index");

    Route::get('/thoughts/create', 'create')
        ->name("posts.create");
    Route::post("/thoughts", 'store')
        ->name("posts.store");

    Route::get('/thoughts/{post:slug}/edit', 'edit')
        ->name("posts.edit");
    Route::put("/thoughts/{post:slug}", 'update')
        ->name("posts.update");

    Route::get('/thoughts/{post:slug}', 'show')
        ->name("posts.show");

    Route::delete('/thoughts/{post:slug}', 'destroy')
        ->name("posts.destroy");
});

Route::controller(AdminController::class)->group(function () {
    Route::get("/admin", 'index')
        ->name("admin.index");
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('/projects', 'index')
        ->name("project.index");

    Route::get('/projects/create', 'create')
        ->name("project.create");
    Route::post("/projects", 'store')
        ->name("project.store");

    Route::get('/projects/{project:slug}/edit', 'edit')
        ->name("project.edit");
    Route::put("/projects/{project:slug}", 'update')
        ->name("project.update");

    Route::get('/projects/{project:slug}', 'show')
        ->name("project.show");

    Route::delete('/projects/{project:slug}', 'destroy')
        ->name("project.destroy");
});
