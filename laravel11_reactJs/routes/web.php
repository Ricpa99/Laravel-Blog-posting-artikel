<?php

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;


Route::get('/', [IndexController::class, 'home']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/blogs', [IndexController::class, 'blogs']);
Route::get('/blog/{post:slug}', [IndexController::class, 'blog']);
Route::get('/author/{user:username}', [IndexController::class, 'user']);
Route::get('/category/{category:slug}', [IndexController::class, 'category']);
Route::post('/logout', function(){
    return Inertia::render('Welcome');
})->name('blogs.keluar');

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
