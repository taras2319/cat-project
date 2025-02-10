<?php
use App\Http\Controllers\PostController;


Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Показати всі пости
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Зберегти новий пост
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); // Показати один пост
Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Форма редагування
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); // Оновити пост
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');




Route::get('/', function () {
    return view('msd.welcome');
})->name('home');


