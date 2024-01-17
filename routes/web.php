<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('posts')->group(function () {
        Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
        Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
        Route::post('/create', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
        Route::get('/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
        Route::put('{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    });

});

require __DIR__.'/auth.php';
