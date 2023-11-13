<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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
    Route::get('/thoughts/{post:slug}/edit', 'edit')
        ->name("posts.edit");
    Route::post("/thoughts", 'store')
        ->name("posts.store");
    Route::put("/thoughts/{post:slug}", 'update')
        ->name("posts.update");
    Route::get('/thoughts/{post:slug}', 'show')
        ->name("posts.show");
});
