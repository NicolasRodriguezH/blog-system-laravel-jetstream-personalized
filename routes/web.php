<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;

// Em el controlador se crea el metodo que aparece aca como segundo parametro de instancia de la clase
Route::get('/', [PostController::class, "index"])->name("posts.index");

Route::get('posts/{post}', [PostController::class, "show"])->name("posts.show");

Route::get('category/{category}', [PostController::class, "category"])->name("posts.category");

Route::get('tag/{tag}', [PostController::class, "tag"])->name("posts.tag");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
