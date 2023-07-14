<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayRequestController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

Route::get('/', function () {
    return view('web.index');
});

Route::get('/pre-register', function () {
    if (auth()->user() != null)
        abort(404);

    return view('web.preregister');
})->name('pre-register');

Route::get('/about-us', function () {
    return view('web.about-us');
})->name('about-us');

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    Route::resource('appointments', AppointmentController::class);
    Route::resource('pay-requests', PayRequestController::class);

    Route::get('/dashboard', [ HomeController::class, 'index' ])->name('dashboard');

    Route::get('/enterprises', [ EnterpriseController::class, 'index' ])->name('enterprises');

    Route::get('/pay/{user_enterprise_id}', [ EnterpriseController::class, 'pay' ])->name('pay');
    //Route::post('/pay/{enterprise_id}', [ EnterpriseController::class, 'pay' ])->name('pay');

    Route::get('/download/{document}/{enterprise_id}', [ FileController::class, 'download' ])->name('download');
});
