<?php

use App\Http\Controllers\{ProfileController, appsfunctioncontroller, microloneController, insuranceController, investingorg, adminNavigation, adminCrop, subsidy};
use Illuminate\Support\Facades\Route;
use App\Models\{Cropproject, investor};
use App\Http\Controllers\agriofficer\agriculturalofficerController;
use App\Http\Controllers\agri_org\orgcontroller;
use App\Http\Controllers\farmer\farmerController;
use App\Http\Controllers\invesotr\investorController;
use Illuminate\Support\Facades\DB;

// index page route start
Route::get('/', function () {
    $cropprojects = $cropprojects = DB::select("
        SELECT cp.*, it.investing_amount
        FROM cropprojects cp
        LEFT JOIN investing_tracks it ON cp.id = it.project_id LIMIT 3");

    $totalcroppeoject = DB::select("SELECT COUNT(*) AS totalcroppeoject FROM cropprojects")[0]->totalcroppeoject;

    $totalinvestor = DB::select("SELECT COUNT(*) AS total_investors FROM investors")[0]->total_investors;
    return view('index', compact('cropprojects', 'totalcroppeoject', 'totalinvestor'));
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
    Route::get('/showagroproject/{id}', [appsfunctioncontroller::class, 'showagriproject'])->name('agriproject.show');
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
            Route::get('/edit', [agriculturalofficerController::class, 'editprofile'])->name('agri_officer.profile.edit');
            Route::put('/update', [agriculturalofficerController::class, 'updateprofile'])->name('agri_officer.profile.update');
        });
        //end
    });
});
// agriculture office route end

// Farmer route start
Route::prefix('farmer')->group(function () {
    // login and register
    Route::get('/login', [farmerController::class, 'index'])->name('login_farmer');
    Route::post('/login/owner', [farmerController::class, 'login'])->name('farmer.login');
    Route::post('/register', [farmerController::class, 'register'])->name('farmer.register');
    Route::get('/logout', [farmerController::class, 'logout'])->name('farmer.logout');
    //end
    Route::middleware('farmer')->group(function () {
        //Dashboard routes start
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [farmerController::class, 'dashboard'])->name('farmer.dashboard');
            Route::get('/edit', [farmerController::class, 'editprofile'])->name('farmer.profile.edit');
            Route::put('/update', [farmerController::class, 'updateprofile'])->name('farmer.profile.update');
            // crop projects
            Route::prefix('project')->group(function () {
                Route::get('/cropproject', [farmerController::class, 'cropproject'])->name('farmer.cropproject');
                Route::get('/addproject', [farmerController::class, 'addproject'])->name('farmer.cropproject.add');
                Route::post('/storeproject', [farmerController::class, 'storeproject'])->name('farmer.cropproject.store');
                Route::get('/showproject/{id}', [farmerController::class, 'showproject'])->name('farmer.cropproject.show');
                Route::get('/editproject/{id}', [farmerController::class, 'editproject'])->name('farmer.cropproject.edit');
                Route::put('/updateproject/{id}', [farmerController::class, 'updateproject'])->name('farmer.cropproject.update');
                Route::put('/updatesell/{id}', [farmerController::class, 'updatesell'])->name('farmer.sell.update');
                Route::delete('/deleteproject/{id}', [farmerController::class, 'deleteproject'])->name('farmer.deleteproject.update');
            });
            // microloan
            Route::prefix('microloan')->group(function () {
                Route::get('/loan', [farmerController::class, 'showloanprovider'])->name('farmer.microloan');
                Route::get('/profile/{id}', [farmerController::class, 'viewloanprovider'])->name('viewloanprovider');
                Route::post('/applyloan/{id}', [farmerController::class, 'applyloan'])->name('farmer.applyloan');
            });
            //insurance
            Route::prefix('insurance')->group(function () {
                Route::get('/insurance', [farmerController::class, 'showinsuranceprovider'])->name('farmer.insurance');
                Route::get('/profile/{id}', [farmerController::class, 'viewinsuranceprovider'])->name('viewinsuranceprovider');
                Route::post('/applyinsurance/{id}', [farmerController::class, 'applyinsurance'])->name('farmer.applyinsurance');
            });

            //subsidy routes
            Route::prefix('subsidy')->group(function () {
                Route::get('', [subsidy::class, 'indexsubsidy'])->name('farmer.subsidy');
                Route::get('apply/{id}', [subsidy::class, 'apply'])->name('farmer.subsidy.openapply');
                Route::post('/subsidyapply/{id}', [subsidy::class, 'subsidyapply'])->name('farmer.subsidy.apply');
                Route::get('subside/{id}/status/change/{status}', [subsidy::class, 'subsidestatus'])->name('subside.status.change');
            });
        });
        //end
    });
});
// Farmer  route end

// Investor route start
Route::prefix('investor')->group(function () {
    // login and register
    Route::get('/login', [investorController::class, 'index'])->name('login_investor');
    Route::post('/login/owner', [investorController::class, 'login'])->name('investor.login');
    Route::post('/register', [investorController::class, 'register'])->name('investor.register');
    Route::get('/logout', [investorController::class, 'logout'])->name('investor.logout');
    //end
    Route::middleware('investor')->group(function () {
        //Dashboard routes start
        Route::prefix('dashboard')->group(function () {
            // Investor profile routes
            Route::get('/', [investorController::class, 'dashboard'])->name('investor.dashboard');
            Route::get('/edit', [investorController::class, 'editprofile'])->name('investor.profile.edit');
            Route::put('/update', [investorController::class, 'updateprofile'])->name('investor.profile.update');
            Route::get('/button', [investorController::class, 'button'])->name('investor.button');

            // crop project show
            Route::get('/cropproject', [investorController::class, 'cropproject'])->name('investor.cropproject.show');
            Route::get('/cropproject/view/{id}', [investorController::class, 'projectview'])->name('investor.cropproject.view');
            // invest in crop project
            Route::post('/invest/crop/{id}', [investorController::class, 'investcrop'])->name('investor.crop.invest');
            // invest in investing organization
            Route::post('/invest/investingorg/{id}', [investorController::class, 'investingorginvest'])->name('investor.investingorg.invest');

            // Investing organizations
            Route::get('/investingorg', [investorController::class, 'investingorg'])->name('investor.investingorg.show');
            Route::get('/investingorg/view/{id}', [investorController::class, 'investingorgshow'])->name('investor.investingorg.view');
        });
        //end
    });
});


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
            // loan provider user routes
            Route::prefix('loanprovider')->group(function () {
                // About and profile routes
                Route::get('/editprofile', [orgcontroller::class, 'editprofileloanprovider'])->name('loanprovider.editprofile');
                Route::put('/update', [orgcontroller::class, 'updateprofileloanprovider'])->name('loanprovider.profile.update');
                Route::get('/about/{id}', [orgcontroller::class, 'aboutloanprovider'])->name('loanprovider.about');
                Route::get('/addAbout', [orgcontroller::class, 'addAboutloanprovider'])->name('loanprovider.addAbout');
                Route::post('/storeAbout', [orgcontroller::class, 'storeAboutloanprovider'])->name('loanprovider.storeAbout');
                Route::get('/editAbout', [orgcontroller::class, 'editAboutloanprovider'])->name('loanprovider.editabout');
                Route::put('/updateAbout/{id}', [orgcontroller::class, 'updateAboutloanprovider'])->name('loanprovider.updateAbout');
                //loan
                Route::get('/loan', [microloneController::class, 'showloan'])->name('org.loanprovider.loanshow');
                Route::get('/loan/{id}', [microloneController::class, 'viewloan'])->name('org.loanprovider.loanview');
                Route::post('/loan/status/{id}', [microloneController::class, 'loanstatus'])->name('org.loanprovider.status');
                Route::get('/approveloan', [microloneController::class, 'approveloan'])->name('org.loanprovider.approvelloan');
            });

            // Investing  user routes
            Route::prefix('investingorg')->group(function () {
                // About and profile routes
                Route::get('/editprofile', [orgcontroller::class, 'editprofileinvesting'])->name('investing.editprofile');
                Route::put('/update', [orgcontroller::class, 'updateprofileinvesting'])->name('investing.profile.update');
                Route::get('/about/{id}', [orgcontroller::class, 'aboutinvesting'])->name('investing.about');
                Route::get('/addAbout', [orgcontroller::class, 'addAboutinvesting'])->name('investing.addAbout');
                Route::post('/storeAbout', [orgcontroller::class, 'storeAboutinvesting'])->name('investing.storeAbout');
                Route::get('/editabout', [orgcontroller::class, 'editaboutinvesting'])->name('investingorg.editabout');
                Route::put('/updateAbout/{id}', [orgcontroller::class, 'updateAboutinvesting'])->name('investing.updateAbout');

                // invest
                Route::get('/showinvestor', [investingorg::class, 'showinvestor'])->name('investing.show.investor');
                // crop projects
                Route::get('/showcropproject', [investingorg::class, 'showproject'])->name('investing.show.crop.project');
                Route::get('/cropproject/view/{id}', [investingorg::class, 'projectview'])->name('investing.cropproject.view');
                // invest in crop project
                Route::post('/invest/crop/{id}', [investingorg::class, 'investcrop'])->name('investing.crop.invest');
            });

            // Insurance user routes
            Route::prefix('insuranceorg')->group(function () {
                // About and profile routes
                Route::get('/editprofile', [orgcontroller::class, 'editprofileinsurance'])->name('insurance.editprofile');
                Route::put('/update', [orgcontroller::class, 'updateprofileinsurance'])->name('insurance.profile.update');
                Route::get('/about/{id}', [orgcontroller::class, 'aboutinsurance'])->name('insurance.about');
                Route::get('/addAbout', [orgcontroller::class, 'addAboutinsurance'])->name('insurance.addAbout');
                Route::post('/storeAbout', [orgcontroller::class, 'storeAboutinsurance'])->name('insurance.storeAbout');
                Route::get('/editAbout', [orgcontroller::class, 'editAboutinsurance'])->name('insurance.editabout');
                Route::put('/updateAbout/{id}', [orgcontroller::class, 'updateAboutinsurance'])->name('insurance.updateAbout');
            });

            //Insurance loan
            Route::get('/insuranceloan', [insuranceController::class, 'showinsurance'])->name('org.insurance.insuranceshow');
            Route::get('/insuranceloan/{id}', [insuranceController::class, 'viewinsurance'])->name('org.insurance.insuranceview');
            Route::post('/insuranceloan/status/{id}', [insuranceController::class, 'insurancestatus'])->name('org.insurance.status');
            Route::get('/insuranceapproveloan', [insuranceController::class, 'approveinsurance'])->name('org.insurance.approvelloan');
        });
        //end
    });
});
// flnancial_groups route end


// admin routes start
Route::get('/dashboard', [adminNavigation::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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
            Route::get('/editpage/{id}', [adminCrop::class, 'mpedit'])->name('crop.marcketprice.editpage');
            Route::put('/editcrop/{id}', [adminCrop::class, 'pricupdate'])->name('crop.marcketprice.edit');
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
