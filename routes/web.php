<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('msd.welcome');
})->name('home');

use App\Http\Controllers\PostController;


Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Показати всі пости
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Зберегти новий пост
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); // Показати один пост
Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Форма редагування
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // Оновити пост
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



use App\Http\Controllers\ContactController;

Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');


use App\Http\Controllers\CatController;

Route::get('/form', [CatController::class, 'showForm'])->name('cats.form');
Route::get('/cats', [CatController::class, 'index'])->name('cats.index');
Route::post('/cats', [CatController::class, 'store'])->name('cats.store');

Route::get('/dashboard', function () {
    return view('msd.welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
