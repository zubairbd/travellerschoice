<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Passenger;
use App\Models\User;
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
    return view('frontend.index');
});
// Route::get('/', 'EmployeeController@showEmployees');
// Route::get('/employee/pdf','EmployeeController@createPDF');

Route::get('/employee/print', [\App\Http\Controllers\EmployeeController::class, 'createprint']);
Route::get('/employee/pdf', [\App\Http\Controllers\EmployeeController::class, 'createPDF']);
Route::get('/employee/pdf/{id}', [\App\Http\Controllers\EmployeeController::class, 'insPDF']);
Route::resource('employee', 'App\Http\Controllers\EmployeeController');
Route::get('/insurance', [\App\Http\Controllers\EmployeeController::class, 'showEmployees']);
Route::get('pdf', [\App\Http\Controllers\PdfController::class, 'pdf']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', function(){
        $passenger = Passenger::count();
        $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('passenger','user_latest'));
    });
    Route::resource('/users', 'App\Http\Controllers\UsersController');
    Route::resource('/passengers', 'App\Http\Controllers\PassengerController');
    Route::resource('/pandingorders', 'App\Http\Controllers\PandingOrderController');
    Route::resource('/payments', 'App\Http\Controllers\PaymentController');
    Route::get('/passenger/status/{id}/{s}', [\App\Http\Controllers\PassengerController::class, 'insStatus']);
    Route::resource('/insurances', 'App\Http\Controllers\InsuranceController');

    Route::get('/insurance/{id}',  [\App\Http\Controllers\InsuranceController::class, 'weCare']);
    Route::post('/passengers/import_passengers', [\App\Http\Controllers\PassengerController::class, 'importExcelToDB'])->name('import_passengers');
    Route::post('/passengers/import_payment', [\App\Http\Controllers\PassengerController::class, 'paymentImportExcelToDB'])->name('import_payment');

    Route::post('/passengers/destroy', [\App\Http\Controllers\DestroyAllController::class, 'AllPassengerDestroy']);
    Route::post('/passengers/download', [\App\Http\Controllers\DestroyAllController::class, 'AllPassengerDownload']);


    Route::get('/wallets',  [\App\Http\Controllers\WalletsController::class, 'walletsIndex'])->name('wallets.index');
    Route::get('/wallets/status/{id}/{s}',  [\App\Http\Controllers\WalletsController::class, 'walletsStatus']);
    Route::get('/wallets/edit/{id}',  [\App\Http\Controllers\WalletsController::class, 'walletsEdit'])->name('wallets.edit');
});

// User Route
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth', 'user']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\User\DashboardController::class, 'userProfile'])->name('profile');
    Route::patch('/profile', [\App\Http\Controllers\User\DashboardController::class, 'userProfileupdate'])->name('profile.update');
    //Insurance
    Route::resource('/insurances', 'App\Http\Controllers\User\InsuranceController');
    Route::get('/travel-insurance', [\App\Http\Controllers\User\InsuranceController::class, 'travelInsurance'])->name('insurance.create');
    Route::get('/travel-insurance/worldtrips', [\App\Http\Controllers\User\InsuranceController::class, 'worldtripsBuy'])->name('worldtrips.buy');
    Route::post('/travel-insurance/worldtrips', [\App\Http\Controllers\User\InsuranceController::class, 'worldtripsGet'])->name('worldtrips.get');
    
    Route::get('/travel-insurance/wecare', [\App\Http\Controllers\User\InsuranceController::class, 'wecareBuy'])->name('wecare.buy');
    Route::post('/travel-insurance/wecare', [\App\Http\Controllers\User\InsuranceController::class, 'wecareGet'])->name('wecare.get');
    
    
    Route::get('/purchase-insurance', [\App\Http\Controllers\User\InsuranceController::class, 'purchaseInsurance'])->name('insurance.purchase');
    Route::get('/insurance/1/{id}', [\App\Http\Controllers\User\InsuranceController::class, 'wecareInsurance'])->name('insurance.wecare');
    Route::get('/insurance/2/{id}', [\App\Http\Controllers\User\InsuranceController::class, 'worldtripsInsurance'])->name('insurance.worldtrips');
    
    Route::get('/insurance/pay/{pp_number}', [\App\Http\Controllers\User\InsuranceController::class, 'insurancePayment'])->name('insurance.payment');
    Route::post('/insurance/pay/submit', [\App\Http\Controllers\User\InsuranceController::class, 'insurancePaymentsubmit'])->name('insurance.payment.submit');
});


Route::get('/agent-registration', [\App\Http\Controllers\Auth\RegisterController::class, 'agentRegistration'])->name('agent.registration');
Route::POST('/agent-registration/submit', [\App\Http\Controllers\Auth\RegisterController::class, 'agentRegistrationSubmit'])->name('agent.registration.submit');

// Agent Route
Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => ['auth', 'agent']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Agent\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/insurance-list', [\App\Http\Controllers\Agent\DashboardController::class, 'insuranceList'])->name('insurance.list');
    Route::get('/insurance-create', [\App\Http\Controllers\Agent\DashboardController::class, 'insuranceCreate'])->name('insurance.create');
    Route::get('/insurance-create', [\App\Http\Controllers\Agent\DashboardController::class, 'insuranceCreate'])->name('insurance.create');
    Route::post('/insurance-store', [\App\Http\Controllers\Agent\DashboardController::class, 'insuranceStore'])->name('insurance.store');
    Route::get('/insurance-worltrip/{id}', [\App\Http\Controllers\Agent\DashboardController::class, 'insuranceWorltrip'])->name('insurance.worltrip');
    Route::get('/insurance-wecare/{id}', [\App\Http\Controllers\Agent\DashboardController::class, 'insuranceWecare'])->name('insurance.wecare');
    Route::get('/insurance/payment/{id}', [\App\Http\Controllers\Agent\WalletController::class, 'insurancePayment'])->name('insurance.payment');
    Route::post('/insurance/payment/submit', [\App\Http\Controllers\Agent\WalletController::class, 'insurancePaymentSubmit'])->name('payment.submit');
    
    Route::get('/wallet', [\App\Http\Controllers\Agent\WalletController::class, 'walletIndex'])->name('wallet.index');
    Route::get('/wallet/deposit', [\App\Http\Controllers\Agent\WalletController::class, 'walletDeposit'])->name('wallet.deposit');
    Route::post('/wallet/deposit/store', [\App\Http\Controllers\Agent\WalletController::class, 'walletDepositStore'])->name('wallet.deposit.store');
   
});

Route::get('token', [\App\Http\Controllers\bkash\PaymentController::class, 'token'])->name('token');
Route::get('createpayment', [\App\Http\Controllers\bkash\PaymentController::class, 'createpayment'])->name('createpayment');
Route::get('executepayment', [\App\Http\Controllers\bkash\PaymentController::class, 'executepayment'])->name('executepayment');
