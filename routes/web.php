<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ServicesAccess;
Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/service1', function () {
    // ...
})->middleware('access');*/


Route::post('registry',[App\Http\Controllers\CustomerController::class,'registry']);
Route::get('customer-list',[App\Http\Controllers\CustomerController::class,'customer_list']);
Route::get('customer',[App\Http\Controllers\CustomerController::class,'customer_detail']);
Route::delete('delete-customer',[App\Http\Controllers\CustomerController::class,'delete_customer']);



//require __DIR__.'/auth.php';
