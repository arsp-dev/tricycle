<?php

use App\Http\Controllers\DevMassImportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\IsolateController;
use App\Http\Controllers\LaboratoryIsolateController;
use App\Http\Controllers\ReleaseStatusController;
use App\Http\Controllers\SiteIsolateController;
use App\Models\ReleaseStatus;
use App\Models\SiteIsolate;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('hospital', HospitalController::class);
    Route::resource('isolates',IsolateController::class);
    Route::resource('site-isolates',SiteIsolateController::class);
    Route::resource('lab-isolates',LaboratoryIsolateController::class);
    Route::get('create-pdf/{isolate_id}',[IsolateController::class,'createPDF']);
    Route::get('create-pdf-lab/{isolate_id}',[IsolateController::class,'createPDFLab']);
    Route::get('create-pdf-site/{isolate_id}',[IsolateController::class,'createPDFSite']);
    Route::post('dev-upload',DevMassImportController::class);
    Route::resource('release-status',ReleaseStatusController::class);
});