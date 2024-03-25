<?php

use App\Http\Controllers\{ProfileController, appsfunctioncontroller, microloneController, insuranceController, investingorg, adminNavigation, adminCrop};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agriofficer\agriculturalofficerController;
use App\Http\Controllers\agri_org\orgcontroller;

// index page route start
Route::get('/', function () {
    return view('index');
});
// index page route end

// website route start
Route::prefix('/')->group(function () {
    // loans provider
    Route::prefix('/microloan')->group(function () {
        Route::get('/', [appsfunctioncontroller::class, 'mindex'])->name('mindex');
        Route::get('/profile/{id}', [microloneController::class, 'mview'])->name('mprofile');
    });
    // incurance
    Route::prefix('incurance')->group(function () {
        Route::get('/', [appsfunctioncontroller::class, 'iindex'])->name('iindex');
        Route::get('/profile/{id}', [insuranceController::class, 'iview'])->name('iprofile');
    });
    // invsting group
    Route::prefix('investinggroup')->group(function () {
        Route::get('/', [appsfunctioncontroller::class, 'ivesindex'])->name('ivesindex');
        Route::get('/profile/{id}', [investingorg::class, 'ivesview'])->name('ivesprofile');
    });
    // agri project
    Route::get('/agroproject', [appsfunctioncontroller::class, 'agropindex'])->name('agropindex');
});
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
            // edit profile routes
            Route::get('/edit', [orgcontroller::class, 'editprofile'])->name('org.profile.edit');
            Route::put('/update', [orgcontroller::class, 'updateprofile'])->name('org.profile.update');
            // add info
            Route::get('/addAbout', [orgcontroller::class, 'addAbout'])->name('org.addAbout');
            Route::post('/storeAbout', [orgcontroller::class, 'storeAbout'])->name('org.storeAbout');
            Route::get('/about/{id}', [orgcontroller::class, 'about'])->name('org.about');
            // update info
            Route::get('/editAbout', [orgcontroller::class, 'editAbout'])->name('org.editabout');
            Route::put('/updateAbout/{id}', [orgcontroller::class, 'updateAbout'])->name('org.updateAbout');
        });
        //end
    });
});
// flnancial_groups route end


// admin routes start
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // profile edit
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // sideber navigation

    //admin navigation
    Route::prefix('/dashboard')->group(function () {
        // Crop section
        Route::prefix('/crop')->group(function () {
            Route::get('/', [adminNavigation::class, 'crop'])->name('crop');
            Route::post('/storecrop', [adminCrop::class, 'cropStore'])->name('crop.store');
            Route::get('/editpage/{id}', [adminCrop::class, 'edit'])->name('crop.editpage');
            Route::put('/editcrop/{id}', [adminCrop::class, 'update'])->name('crop.edit');
            Route::delete('/deletecrop/{id}', [adminCrop::class, 'delete'])->name('crop.delete');
        });
        // End
        // Crop marcket Price
        Route::prefix('/crop/marcketprice')->group(function () {
            Route::get('/', [adminNavigation::class, 'marckerprice'])->name('crop.marcketprice');
            Route::post('/storecrop', [adminCrop::class, 'priceStore'])->name('crop.marcketprice.store');
            Route::get('/editpage/{id}', [adminCrop::class, 'mpedit'])->name('crop.marcketprice.editpage');
            Route::put('/editcrop/{id}', [adminCrop::class, 'pricupdate'])->name('crop.marcketprice.edit');
            Route::delete('/deletecrop/{id}', [adminCrop::class, 'pricdelete'])->name('crop.marcketprice.delete');
        });
        // end
        // farmer section
        Route::prefix('/farmer')->group(function () {
            Route::get('/', [adminNavigation::class, 'showfarmer'])->name('farmer.show');
        });
        // end
        // invistor section
        Route::prefix('/invistor')->group(function () {
            Route::get('/', [adminNavigation::class, 'showinvistor'])->name('invistor.show');
        });
        // end
        // invistor section
        Route::prefix('/agricultureorganization')->group(function () {
            Route::get('/loanprovider', [adminNavigation::class, 'showloanprovider'])->name('loanprovider.show');
            Route::get('/investingorg', [adminNavigation::class, 'showinvestingorg'])->name('investingorg.show');
            Route::get('/insurance', [adminNavigation::class, 'showinsurance'])->name('insurance.show');
        });
        // end
    });
});

require __DIR__ . '/auth.php';
// admin routes end
