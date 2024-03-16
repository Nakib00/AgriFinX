<?php

use App\Http\Controllers\{ProfileController,appsfunctioncontroller};
use Illuminate\Support\Facades\Route;

// index page route start
Route::get('/', function () {
    return view('website.index');
});
// index page route end

// website route start
Route::get('/microloan',[appsfunctioncontroller::class, 'mindex'])->name('mindex');
Route::get('/incurance',[appsfunctioncontroller::class, 'iindex'])->name('iindex');
Route::get('/agroproject',[appsfunctioncontroller::class, 'agropindex'])->name('agropindex');
Route::get('/subsides',[appsfunctioncontroller::class, 'sindex'])->name('sindex');
//website route end

// admin routes start
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// admin routes end
