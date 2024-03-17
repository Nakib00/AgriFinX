<?php

use App\Http\Controllers\{ProfileController, appsfunctioncontroller};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agriofficer\agriculturalofficerController;


// index page route start
Route::get('/', function () {
    return view('index');
});
// index page route end

// website route start
Route::get('/microloan', [appsfunctioncontroller::class, 'mindex'])->name('mindex');
Route::get('/incurance', [appsfunctioncontroller::class, 'iindex'])->name('iindex');
Route::get('/agroproject', [appsfunctioncontroller::class, 'agropindex'])->name('agropindex');
Route::get('/subsides', [appsfunctioncontroller::class, 'sindex'])->name('sindex');
//website route end



// agriculture office route start
Route::prefix('agriculture_office')->group(function () {
    // login and register
    Route::get('/login', [agriculturalofficerController::class, 'index'])->name('login_agri_officer');
    Route::post('/login/owner', [agriculturalofficerController::class, 'login'])->name('agri_officer.login');
    Route::get('/dashboard', [agriculturalofficerController::class, 'dashboard'])->name('agri_officer.dashboard');
    Route::post('/register', [agriculturalofficerController::class, 'register'])->name('agri_officer.register');
    Route::get('/logout', [agriculturalofficerController::class, 'logout'])->name('agri_officer.logout');
    Route::get('/edit', [AgriculturalOfficerController::class, 'editprofile'])->name('agri_officer.profile.edit');
    Route::put('/update', [AgriculturalOfficerController::class, 'updateprofile'])->name('agri_officer.profile.update');
    //end
    Route::get('/button', [agriculturalofficerController::class, 'button'])->name('agri_officer.button');
});
// agriculture office route end


// admin routes start
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
// admin routes end
