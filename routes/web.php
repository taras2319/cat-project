<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');


use App\Http\Controllers\PostController;



Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Показати всі пости
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Зберегти новий пост
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); // Показати один пост
Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Форма редагування
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // Оновити пост
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');
Route::get('/admin/posts/{id}/approve', [PostController::class, 'approve'])->name('posts.approve');
Route::get('/admin/posts/{id}/reject', [PostController::class, 'reject'])->name('posts.reject');


use App\Http\Controllers\ContactController;

Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');


use App\Http\Controllers\PhotoController;

Route::get('/form', [PhotoController::class, 'showForm'])->name('cats.form');
Route::get('/cats', [PhotoController::class, 'index'])->name('cats.index');
Route::post('/cats', [PhotoController::class, 'store'])->name('cats.store');
Route::get('/admin/photos/{id}/approve', [PhotoController::class, 'approve'])->name('photos.approve');
Route::get('/admin/photos/{id}/reject', [PhotoController::class, 'reject'])->name('photos.reject');

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

use App\Http\Controllers\BlogController;
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');

use App\Http\Controllers\InfoController;
Route::get('/contacts', [InfoController::class, 'index'])->name('info.index');




