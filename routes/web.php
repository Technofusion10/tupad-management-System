<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\TupadProjectController;
use App\Http\Controllers\Admin\TupadController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\CheckIdentificationController;
use App\Models\TupadInformation;
use App\Models\TupadEmployee;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Print Identification Card
Route::get('/Identification/{id}', [CheckIdentificationController::class, 'index']);

Route::fallback(function () {
    // Check if the user is not authenticated
    if (!Auth::check())
    {
        return redirect()->route('login');
    }

    // Handle the 404 error for authenticated users
    // return response()->view('errors.404', [], 404);
    return redirect()->route('home');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// Users
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');


    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [UserController::class, 'export'])->name('export');

});

Route::middleware('auth')->group(function () {

    // --------------------------------
    // TUPAD Program
    // --------------------------------

    // Navigate to add tupad beneficiary/employee form
    Route::get('/dashboard/add-tupad-form', function () {
        return view('admin.Tupad.add-beneficiary-form');
    })->name('add-tupad-beneficiary-form');

    // Store Tupad Beneficiary Info
    Route::post('/dashboard/add-tupad-form/store', [TupadController::class, 'store'])
    ->name('admin.tupad.add.beneficiary');

    // Store Tupad Beneficiary Info
    Route::post('/dashboard/add-family-member-form/store', [TupadController::class, 'storeMember'])
    ->name('admin.tupad.add.family.member');

    // Navigate to add tupad project info form
    Route::get('/dashboard/add-tupad-project-info-form', function () {
        return view('admin.Tupad.add-tupad-project-form');
    })->name('add-tupad-project-info-form');

    // Store Tupad Project Info
    Route::post('/dashboard/add-tupad-project-info-form/store', [TupadProjectController::class, 'store'])
    ->name('admin.tupad.add.project');

    // Navigate to Tupad Data-Table
    Route::get('/dashboard/tupad-project-table', function () {
        //$tupadProject = TupadInformation::where('status', '=', 'PENDING')->paginate(15);
        $tupadProject = TupadInformation::paginate(15);
        return view('admin.Tupad.tupad-data-table', ['tupadProject' => $tupadProject]);
    });

    // Navigate to Tupad Beneficiaries Data-Table
    Route::get('/dashboard/tupad-beneficiaries-table', function () {
        $tupadBeneficiaries = TupadEmployee::paginate(15);
        return view('admin.Tupad.beneficiaries-data-table', ['tupadBeneficiaries' => $tupadBeneficiaries]);
    });

    // View Selected Tupad Project Information In Data-Table
    Route::get('/dashboard/tupad-project-table/{id}', [TupadProjectController::class, 'show'])
    ->name('admin.tupad.project.show.info');

    // Edit Tupad Project Details
    Route::get('/dashboard/tupad-project-table/edit/{id}', [TupadProjectController::class, 'edit'])
    ->name('admin.tupad.edit.project');

    // Update Tupad Project Information
    Route::post('/dashboard/tupad-project-table/edit/update', [TupadProjectController::class, 'update'])
    ->name('admin.tupad.update.project-info');

    // Search Data-Table Tupad Project Information
    Route::get('/tupad-project-table-search', [TupadProjectController::class, 'search'])
    ->name('admin.tupad.search.project');

    // Approved Tupad Project
    Route::post('/dashboard/tupad-project-table/project-evaluate-evaluate', [TupadProjectController::class, 'evaluate'])
    ->name('admin.tupad.evaluate.tupad.project');

    // Pending Tupad Project
    Route::get('/dashboard/pending-tupad-project-table', [TupadProjectController::class, 'pendingTupadProject'])
    ->name('admin.pending.tupad.project');




    // Approved Tupad Project
    Route::post('/dashboard/tupad-beneficiary-table/beneficiary-evaluate-evaluate', [TupadController::class, 'evaluate'])
    ->name('admin.tupad.evaluate.tupad.beneficiary');

    // View Selected Tupad Beneficiary Information In Data-Table
    Route::get('/dashboard/tupad-beneficiary-table-information/{id}', [TupadController::class, 'show'])
    ->name('admin.tupad.beneficiary.show.info');

    // Edit Tupad Beneficiaries Details
    Route::get('/dashboard/tupad-beneficiary-table-information/edit/{id}', [TupadController::class, 'edit'])
    ->name('admin.tupad.edit.beneficiary');

    // Update Tupad Beneficiary Information
    Route::post('/dashboard/tupad-beneficiary-table-information/edit/update', [TupadController::class, 'update'])
    ->name('admin.tupad.update.beneficiary');

    // Search Data-Table Tupad Beneficiaries Information
    Route::get('/dashboard/tupad-beneficiaries-table-search', [TupadController::class, 'search'])
    ->name('admin.tupad.search.beneficiaries');





    // Search Data-Table Tupad Project Information
    /*Route::get('/tupad-project-table-search', [TupadProjectController::class, 'search'])
    ->name('admin.tupad.search');*/



    // Print Identification Card
    Route::get('/print-identification-card-tupad/{id}', [PDFController::class, 'tupadBeneficiary']);


    Route::post('/import-Beneficiaries', [TupadController::class, 'importBeneficiaries'])
    ->name('import_TupadBeneficiaries');

    // Export Tupad Beneficiaries With The Same Group ID
    Route::get('/export_tupad_beneficiaries/{id}', [TupadController::class, 'exportBeneficiaries'])
    ->name('export_TupadBeneficiaries');

    // Export Tupad Information
    Route::get('/export_tupad_information/{id}', [TupadController::class, 'exportTupadInformation'])
    ->name('export_TupadInformation');

    Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

    Route::get('/image/{filename}', function ($filename) {
        $path = 'tupadBeneficiariesPicture/' . $filename;

        if (Storage::exists($path)) {
            return Storage::response($path);
        }

        abort(404);
    });

    /*Route::post('/export-Beneficiaries/{id}', [TupadController::class, 'exportBeneficiaries'])
    ->name('export_TupadBeneficiaries');*/


    //Route::get('import-Beneficiaries', [TupadController::class, 'importBeneficiaries'])
    //->name('import_TupadBeneficiaries');


    // --------------------------------
    // LIVELIHOOD Program
    // --------------------------------
    // --------------------------------


});


// ----------> Clear Route <----------
Route::get('/cleareverything', function () {

    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

    $cleardebugbar = Artisan::call('debugbar:clear');
    echo "Debug Bar cleared<br>";

});
// ----------> End <----------

