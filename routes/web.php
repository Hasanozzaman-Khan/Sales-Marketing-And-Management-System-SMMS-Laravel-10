<?php

use Illuminate\Support\Facades\Route;

/************* Backend Controllers *************/
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Every One
Route::get('/', function () {
    return view('index');
});

// Admin
// Route::group(['prefix'=>'auth', 'middleware'=>'admin'], function(){
Route::group(['middleware'=>'admin'], function(){
    Route::get('/dashboard/employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/dashboard/employee/pending', [EmployeeController::class, 'pending'])->name('employee.pending');
    Route::get('/dashboard/employee/{id}/approve', [EmployeeController::class, 'approve'])->name('employee.approve');
    Route::post('/dashboard/employee/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');
    /************ Resource Route ***************/
    // Route::resource('dashboard/employee', EmployeeController::class);

    // Route::get('/', function () {
    //     return view('Backend.Admin.index');
    // });
    // Route::resource('category', CategoryController::class);
    // Route::resource('subcategory', SubcategoryController::class);
    // Route::resource('childcategory', ChildcategoryController::class);
    //
    // // Admin Listing
    // Route::get('/all-ads', [AdminListingController::class, 'index'])->name('all-ads.index');
    //
    // // Reported Ad listing
    // Route::get('/all-reported-ads', [FraudController::class, 'index'])->name('all-reported-ads.index');
});



// Supervisor
Route::group(['middleware'=>'supervisor'], function(){
    /************ Resource Route ***************/
    Route::resource('dashboard/brand', BrandController::class);
    Route::resource('dashboard/category', CategoryController::class);
    Route::resource('dashboard/size', SizeController::class);

});



// Executive
Route::group(['middleware'=>'executive'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    /************ Resource Route ***************/
    Route::resource('dashboard/product', ProductController::class);

});

// Customer
Route::group(['middleware'=>'auth'], function(){

});
