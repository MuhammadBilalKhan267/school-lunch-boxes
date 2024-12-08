<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Models\Services;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;

Route::get('/', [ServicesController::class, 'get'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('services', ServicesController::class);
    Route::post('/', [ServicesController::class, 'store'])->name('services.store');
    Route::put('/{id}', [ServicesController::class, 'update'])->name('services.update');
});

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.store');

Route::get('/order', [OrderController::class, 'get'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
