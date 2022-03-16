<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('employees')->middleware("auth",'admin')->group(function(){

    Route::get('/',[EmployeeController::class,'index'])->name('employees');
    Route::get('/create',[EmployeeController::class,'create'])->name('employees.create');
    Route::post('/store',[EmployeeController::class,'store'])->name('employees.store');
    Route::get('/edit/{user}',[EmployeeController::class,'edit'])->name('employees.edit');
    Route::post('/update',[EmployeeController::class,'update'])->name('employees.update');
    Route::post('/delete/{user}', [EmployeeController::class, 'delete'])->name('employees.delete');

});
Route::prefix('customers')->middleware("auth")->group(function(){

    Route::get('/',[CustomerController::class,'index'])->name('customers');
    Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
    Route::post('/store',[CustomerController::class,'store'])->name('customers.store');
    Route::get('/edit/{customer}',[CustomerController::class,'edit'])->name('customers.edit');
    Route::post('/update',[CustomerController::class,'update'])->name('customers.update');
    Route::get('/action/{customer}',[CustomerController::class,'action'])->name('customers.action');
    Route::post('/delete/{customer}', [CustomerController::class, 'delete'])->name('customers.delete')->middleware('admin');

});
Route::prefix('actions')->middleware("auth")->group(function(){

    Route::get('/',[ActionController::class,'index'])->name('actions');
    Route::get('/create',[ActionController::class,'create'])->name('actions.create');
    Route::post('/store',[ActionController::class,'store'])->name('actions.store');
    Route::get('/edit/{action}',[ActionController::class,'edit'])->name('actions.edit');
    Route::post('/update',[ActionController::class,'update'])->name('actions.update');
    Route::post('/delete/{action}', [ActionController::class, 'delete'])->name('actions.delete')->middleware('admin');

});
Route::prefix('account')->middleware("auth")->group(function(){
    Route::get('setting',[AccountController::class,'index'])->name('account.setting');
    Route::post('details', [AccountController::class, 'details'])->name('account.details');
    Route::post('/email', [AccountController::class, 'email'])->name('account.email');
    Route::post('/password', [AccountController::class, 'password'])->name('account.password');
});

