<?php

use App\Http\Controllers\Admin\PaymentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Insurance;
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
        $Insurance = Insurance::count();
        $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('Insurance','user_latest'));
    });
    Route::resource('/users', 'App\Http\Controllers\Admin\UsersController');
    Route::resource('/orders-completed', 'App\Http\Controllers\Admin\CompletedOrderController', ['names' => 'order_completed']);
    Route::get('/orders-completed/status/{id}/{s}', [\App\Http\Controllers\Admin\CompletedOrderController::class, 'insStatus']);
    Route::resource('/panding-orders', 'App\Http\Controllers\Admin\PandingOrderController', ['names' => 'order_panding']);
    Route::get('/panding-orders/status/{id}/{s}', [\App\Http\Controllers\Admin\PandingOrderController::class, 'insStatus']);
    Route::post('/panding-orders/import_insurances', [\App\Http\Controllers\Admin\PandingOrderController::class, 'importExcelToDB'])->name('import_insurances');
    Route::post('/panding-orders/import_payment', [\App\Http\Controllers\Admin\PandingOrderController::class, 'paymentImportExcelToDB'])->name('import_payment');
    
    Route::get('/insurance-worltrip/{id}', [\App\Http\Controllers\Admin\InsurancePrintController::class, 'insurancePrintWorltrip'])->name('insurance.worltrip');
    Route::get('/insurance-wecare/{id}', [\App\Http\Controllers\Admin\InsurancePrintController::class, 'insurancePrintWecare'])->name('insurance.wecare');
    
    Route::resource('/payments', 'App\Http\Controllers\Admin\PaymentsController');
    Route::get('autocomplete', [PaymentsController::class, 'autocomplete'])->name('autocomplete');

    Route::resource('/products', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('/discounts', 'App\Http\Controllers\Admin\DiscountController');


    Route::resource('/wallets', 'App\Http\Controllers\Admin\WalletController');
    Route::get('/wallets',  [\App\Http\Controllers\Admin\WalletController::class, 'walletsIndex'])->name('wallets.index');
    Route::get('/wallets/status/{id}/{s}',  [\App\Http\Controllers\Admin\WalletController::class, 'walletsStatus']);
    Route::PATCH('/wallets/edit/{id}',  [\App\Http\Controllers\Admin\WalletController::class, 'walletsEdit'])->name('wallets.edit');
    
    Route::resource('/accounts', 'App\Http\Controllers\Admin\AccountController');
    Route::PATCH('/accounts/active/{id}', [App\Http\Controllers\Admin\AccountController::class, 'accountActive'])->name('accounts.active');
    // Route::resource('/profile', 'App\Http\Controllers\Admin\ProfileController');
    
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::post('/changepassword', [App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('profile.changepassword');
    
    Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'reportIndex'])->name('report.filter');
});

// User Route
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth', 'user']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\User\DashboardController::class, 'userProfile'])->name('profile');
    Route::patch('/profile', [\App\Http\Controllers\User\DashboardController::class, 'userProfileupdate'])->name('profile.update');
    //Insurance
    Route::resource('/insurances', 'App\Http\Controllers\User\InsuranceController');
    Route::get('/apply-insurance', [\App\Http\Controllers\User\InsuranceController::class, 'travelInsurance'])->name('insurance.create');
    
    Route::get('/travel-insurance/wecare', [\App\Http\Controllers\User\InsuranceController::class, 'wecareBuy'])->name('wecare.buy');
    Route::post('/travel-insurance/wecare', [\App\Http\Controllers\User\InsuranceController::class, 'wecareGet'])->name('wecare.get');
    
    
    Route::get('/purchase-list', [\App\Http\Controllers\User\InsuranceController::class, 'purchaseInsurance'])->name('insurance.list');
    Route::get('/insurance/1/{id}', [\App\Http\Controllers\User\InsuranceController::class, 'wecareInsurance'])->name('insurance.wecare');
    Route::get('/insurance/2/{id}', [\App\Http\Controllers\User\InsuranceController::class, 'worldtripsInsurance'])->name('insurance.worldtrips');
    
    Route::get('/insurance/pay/{pp_number}', [\App\Http\Controllers\User\InsuranceController::class, 'insurancePayment'])->name('insurance.payment');
    Route::post('/insurance/pay/submit', [\App\Http\Controllers\User\InsuranceController::class, 'insurancePaymentsubmit'])->name('insurance.payment.submit');
    
    // Route::get('/travel-insurance/worldtrips', [\App\Http\Controllers\User\InsuranceController::class, 'worldtripsBuy'])->name('worldtrips.buy');
    // Route::post('/travel-insurance/worldtrips', [\App\Http\Controllers\User\InsuranceController::class, 'worldtripsGet'])->name('worldtrips.get');
    
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
    
    Route::resource('/profile', 'App\Http\Controllers\Agent\ProfileController');
    Route::post('/profile/changepassword', [App\Http\Controllers\Agent\ProfileController::class, 'changePassword'])->name('profile.changepassword');
    Route::post('/profile/photo', [\App\Http\Controllers\Agent\ProfileController::class, 'imageUpload'])->name('profile.photo');
   
    
    Route::resource('/account', 'App\Http\Controllers\Agent\AccountController');
});


Route::post('token', [\App\Http\Controllers\Bkash\PaymentController::class, 'token'])->name('token');
Route::get('createpayment', [\App\Http\Controllers\Bkash\PaymentController::class, 'createpayment'])->name('createpayment');
Route::get('executepayment', [\App\Http\Controllers\Bkash\PaymentController::class, 'executepayment'])->name('executepayment');

