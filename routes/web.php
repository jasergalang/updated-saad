<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Input;
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
Route::get('lalagyan', function () {
    return view('lalagyan');
});
/* Route::get('index', function () {
    return view('index');
}); */

/* Route::get('viewproperty', function () {
    return view('viewproperty');
}); */

// Routes for Login and Register
Route::middleware(['web'])->group(function () {
    Route::post('login', [AccountController::class, 'loginPost'])->name('login.post');
    Route::get('login', [AccountController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AccountController::class, 'logout'])->name('logout');
});

Route::prefix('register')->group(function () {
    Route::get('landlord', [AccountController::class, 'landlordregister'])->name('landlordregister');
    Route::get('tenant', [AccountController::class, 'tenantregister'])->name('tenantregister');
    Route::post('landlord', [AccountController::class, 'llregister'])->name('landlordregister.post');
    Route::post('tenant', [AccountController::class, 'ttregister'])->name('tenantregister.post');
});



// Routes for Tenant
Route::prefix('tenant')->middleware(['auth', 'tenant'])->group(function () {
    Route::get('index', [PropertyController::class, 'index'])->name('index');
    Route::post('index', [PropertyController::class, 'showindex'])->name('showindex.post')->middleware('verified.owner');


    Route::get('showproperty', [PropertyController::class, 'showproperty'])->name('showproperty');
    Route::post('showproperty', [PropertyController::class, 'showrentals'])->name('showrentals.post');

    Route::get('/viewproperty/{id}', [PropertyController::class, 'viewproperty'])->name('viewproperty');
    Route::post('viewproperty', [PropertyController::class, 'viewone'])->name('viewone.post');

    Route::get('aboutus', [AccountController::class, 'aboutus'])->name('aboutus');

    Route::get('paymentform', [ContractController::class, 'paymentform'])->name('paymentform');
    Route::post('paymentformPost', [ContractController::class, 'paymentformPost'])->name('paymentformPost');

    Route::get('profile',[AccountController::class, 'profile'])->name('profile');

});


// Routes for Owner
Route::prefix('owner')->middleware(['auth', 'owner'])->group(function () {

    Route::get('createproperty', [PropertyController::class, 'createproperty'])->name('createproperty')->middleware('verified.owner');
    Route::post('createproperty', [PropertyController::class, 'propertylisting'])->name('propertylisting.post');

    Route::get('imagesproperty', [PropertyController::class, 'imagesproperty'])->name('imagesproperty')->middleware('verified.owner');;
    Route::post('imagesproperty', [PropertyController::class, 'addimages'])->name('addimages.post');

    Route::get('/{property}/updateproperty', [PropertyController::class, 'updateproperty'])->name('property.updateproperty');
    Route::put('/updateproperty/{id}', [PropertyController::class, 'updatepropertyform'])->name('properties.updatepropertyform');
    Route::delete('/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

    Route::get('inquiriesform', [ContractController::class, 'inquiriesform'])->name('inquiriesform');
    Route::post('inquire', [ContractController::class, 'inquire'])->name('inquire.post');

    Route::post('/inquiries/{id}/reject', [ContractController::class, 'rejectInquiry'])->name('inquiries.reject');
    Route::post('/inquiries/{id}/accept', [ContractController::class, 'acceptInquiry'])->name('inquiries.accept');

    Route::get('/tenantcontract', [ContractController::class, 'tenantcontract'])->name('tenantcontract');
    Route::post('/tenantcontract/{inquiries_id}', [ContractController::class, 'createcontract'])->name('createcontract');

    Route::get('user',[AccountController::class, 'users'])->name('user');
});

// Routes for Administrator
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::patch('owner/{id}', [AdminController::class, 'verifylandlord'])->name('admin.verify.landlord');
    Route::patch('property/{id}', [AdminController::class, 'verifyproperty'])->name('admin.verify.property');

    Route::delete('/owners/{ownerDelete}', [AdminController::class, 'destroyOwner'])->name('admin.destroy.owner');
    Route::delete('/tenants/{tenantDelete}', [AdminController::class, 'destroyTenant'])->name('admin.destroy.tenant');
    Route::delete('/properties/{propertyDelete}', [AdminController::class, 'destroyProperty'])->name('admin.destroy.property');


    Route::get('landlordVerification', [AdminController::class, 'landlordVerification'])->name('admin.landlordVerification');
    Route::get('propertyVerification', [AdminController::class, 'propertyVerification'])->name('propertyVerification');

    Route::get('adminManageOwner', [AdminController::class, 'adminManageOwner'])->name('adminManageOwner');
    Route::get('adminManageProperty', [AdminController::class, 'adminManageProperty'])->name('adminManageProperty');
    Route::get('adminManageTenant', [AdminController::class, 'adminManageTenant'])->name('adminManageTenant');

    Route::get('adminregister', [AccountController::class, 'adminregister'])->name('adminregister');
    Route::post('adminregister', [AccountController::class, 'adregister'])->name('adminregister.post');

    Route::get('adminInterface', [AdminController::class, 'adminInterface'])->name('adminInterface');
});


Route::get('verifiyOwner', [AdminController::class, 'verifiyOwner'])->name('verifiyowner');


/*
Route::get('rentals', function () {
    return view('rentals');
});

Route::get('page1', function () {
    return view('page1');
});

Route::get('imagesproperty', function () {
    return view('imagesproperty');
});


Route::get('adminpage', function () {
    return view('adminpage');
});
 */

