<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{appsfunctioncontroller};


Route::get('/', function () {
    return view('website.index');
});

Route::get('/microloan',[appsfunctioncontroller::class, 'mindex'])->name('mindex');
Route::get('/incurance',[appsfunctioncontroller::class, 'iindex'])->name('iindex');
Route::get('/agroproject',[appsfunctioncontroller::class, 'agropindex'])->name('agropindex');
Route::get('/subsides',[appsfunctioncontroller::class, 'sindex'])->name('sindex');
