<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/galerie', [PublicController::class, 'gallery'])->name('gallery');
Route::get('/galerie/{artwork:slug}', [PublicController::class, 'showArtwork'])->name('artwork.show');
Route::get('/expositions', [PublicController::class, 'exhibitions'])->name('exhibitions');
Route::get('/a-propos', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'storeMessage'])->name('contact.store');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/artworks', \App\Http\Controllers\Admin\ArtworkController::class);
    Route::resource('/exhibitions', \App\Http\Controllers\Admin\ExhibitionController::class);
    Route::resource('/articles', \App\Http\Controllers\Admin\ArticleController::class);
    Route::resource('/messages', \App\Http\Controllers\Admin\MessageController::class)->only(['index', 'show', 'update', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
