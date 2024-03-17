<?php

use App\Http\Controllers\{ProfileController, appsfunctioncontroller};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agriofficer\agriculturalofficerController;
use App\Http\Controllers\agri_org\orgcontroller;

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
    Route::post('/register', [agriculturalofficerController::class, 'register'])->name('agri_officer.register');
    Route::get('/logout', [agriculturalofficerController::class, 'logout'])->name('agri_officer.logout');
    //end
    Route::middleware('agricultural_officer')->group(function () {
        //Dashboard routes start
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [agriculturalofficerController::class, 'dashboard'])->name('agri_officer.dashboard');
            Route::get('/edit', [AgriculturalOfficerController::class, 'editprofile'])->name('agri_officer.profile.edit');
            Route::put('/update', [AgriculturalOfficerController::class, 'updateprofile'])->name('agri_officer.profile.update');
            Route::get('/button', [agriculturalofficerController::class, 'button'])->name('agri_officer.button');
        });
        //end
    });
});
// agriculture office route end

// flnancial_groups route start
Route::prefix('flnancial_groups')->group(function () {
    // login and register
    Route::get('/login', [orgcontroller::class, 'index'])->name('login_org');
    Route::post('/login/owner', [orgcontroller::class, 'login'])->name('org.login');
    Route::post('/register', [orgcontroller::class, 'register'])->name('org.register');
    Route::get('/logout', [orgcontroller::class, 'logout'])->name('org.logout');

    //end
    Route::middleware('financial_group')->group(function () {
        //Dashboard routes start
        Route::prefix('dashboard')->group(function () {
            Route::get('/edit', [orgcontroller::class, 'editprofile'])->name('org.profile.edit');
            Route::put('/update', [orgcontroller::class, 'updateprofile'])->name('org.profile.update');
            Route::get('/button', [orgcontroller::class, 'button'])->name('org.button');
        });
        //end
    });
});
// flnancial_groups route end


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
