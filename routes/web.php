<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});

require __DIR__.'/auth.php';

Route::resource('product', ProductController::class);

Route::get('/about-us', [AboutUsController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::resource('/monster', MonsterController::class);
//Route::get('/monster/detail', [MonsterController::class, 'show']);
//Route::get('/monster', [MonsterController::class, 'index']);

Route::get('/test', function () {
    return view('test-auth');
});


