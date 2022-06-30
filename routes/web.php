<?php

use App\Http\Controllers\admin\VaccineRegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/certificate/print', [App\Http\Controllers\CertificateController::class, 'index'])->name('certificate');
Route::get('/foreigner-verify-online', [App\Http\Controllers\SurokkhaController::class, 'surokkha'])->name('surokkha');
Route::get('/certificate', [App\Http\Controllers\SurokkhaController::class, 'certificate'])->name('certificate.index');
Route::get('/certificate/foreigners', [App\Http\Controllers\SurokkhaController::class, 'certificateForeigners'])->name('certificate.foreigners');


Route::get('/verify', [App\Http\Controllers\SurokkhaController::class, 'verify'])->name('verify.index');
Route::get('/verify/foreigners', [App\Http\Controllers\SurokkhaController::class, 'verifyForeigners'])->name('verify.foreigners');
Route::post('/foreigner-verify-certificate', [App\Http\Controllers\SurokkhaController::class, 'Search'])->name('verify.search');

// Admin Route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('vaccines', VaccineRegistrationController::class);
    
});