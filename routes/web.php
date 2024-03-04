<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
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

/* Route::get('index', function () {
    return view('index');
}); */

/* Route::get('viewproperty', function () {
    return view('viewproperty');
}); */

Route::get('createproperty', [PropertyController::class, 'createproperty'])->name('createproperty')->middleware('verified.owner');
Route::post('createproperty', [PropertyController::class, 'propertylisting'])->name('propertylisting.post');

Route::get('imagesproperty', [PropertyController::class, 'imagesproperty'])->name('imagesproperty');
Route::post('imagesproperty', [PropertyController::class, 'addimages'])->name('addimages.post');

Route::get('showproperty', [PropertyController::class, 'showproperty'])->name('showproperty');
Route::post('showproperty', [PropertyController::class, 'showrentals'])->name('showrentals.post');


Route::get('/viewproperty/{id}', [PropertyController::class, 'viewproperty'])->name('viewproperty');
Route::post('viewproperty', [PropertyController::class, 'viewone'])->name('viewone.post');

Route::middleware(['web'])->group(function () {
    Route::post('login', [AccountController::class, 'loginPost'])->name('login.post');
});

Route::get('login',[AccountController::class, 'login'])->name('login');

Route::prefix('properties')->group(function () {
    Route::get('/{property}/updateproperty', [PropertyController::class, 'updateproperty'])->name('property.updateproperty');
    Route::put('/updateproperty/{id}', [PropertyController::class, 'updatepropertyform'])->name('properties.updatepropertyform');
    Route::delete('/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
});


Route::get('landlordregister', [AccountController::class, 'landlordregister'])->name('landlordregister');
Route::get('tenantregister', [AccountController::class, 'tenantregister'])->name('tenantregister');
Route::get('adminregister', [AccountController::class, 'adminregister'])->name('adminregister');

Route::get('user',[AccountController::class, 'users'])->name('user');

Route::get('adminregister',[AccountController::class, 'adminregister'])->name('adminregister');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout',[AccountController::class, 'logout'])->name('logout');
});

Route::post('landlordregister', [AccountController::class, 'llregister'])->name('landlordregister.post');
Route::post('tenantregister', [AccountController::class, 'ttregister'])->name('tenantregister.post');
Route::post('adminregister', [AccountController::class, 'adregister'])->name('adminregister.post');

Route::get('index', [PropertyController::class, 'index'])->name('index');
Route::post('index', [PropertyController::class, 'showindex'])->name('showindex.post')->middleware('verified.owner');

Route::get('adminpage', [AdminController::class, 'adminpage'])->name('adminpage');


Route::prefix('admin')->group(function () {
    Route::patch('owner/{id}', [AdminController::class, 'verifylandlord'])->name('admin.verify.landlord');
    Route::patch('property/{id}', [AdminController::class, 'verifyproperty'])->name('admin.verify.property');
});

Route::get('aboutus', [AccountController::class, 'aboutus'])->name('aboutus');



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

