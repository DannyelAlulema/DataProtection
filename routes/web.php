<?php

use App\Http\Controllers\EnterpriseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('web.index');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/enterprises', [ EnterpriseController::class, 'index' ])->name('enterprises');

    Route::get('/download', function () {
        $path = public_path('files/data_protection.pdf');

        if (file_exists($path)) {
            return Response::download($path);
        } else {
            abort(404, 'El archivo no existe.');
        }

    })->name('download');
});
