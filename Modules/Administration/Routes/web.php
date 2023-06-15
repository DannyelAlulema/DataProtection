<?php
use Modules\Administration\Http\Controllers\AdministrationController;
use Modules\Administration\Http\Controllers\PayController;
use Modules\Administration\Http\Controllers\UserController;

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

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->prefix('administration')->group(function() {
    Route::get('/', 'AdministrationController@index')->name('administration');

    Route::get('/users' , [ UserController::class, 'index' ])->name('administration.users');
    Route::get('/pays/history' , [ PayController::class, 'index' ])->name('administration.pays.history');
    //Route::get('/pays/requests' , [ PayController::class, 'requests' ])->name('administration.pays.requests');

    Route::post('/get-voucher', [ AdministrationController::class, 'getVoucher' ])->name('get.voucher');
});

