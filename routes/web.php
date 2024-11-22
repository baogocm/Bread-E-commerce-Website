<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;


Route::get('/', function () {
    return view('welcome');
});
/* Admin */
//Auth
Route::get('adminz', [AuthController::class, 'index'])
->name('auth.admin');
Route::get('logout', [AuthController::class, 'logout'])
->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])
->name('auth.login')
->middleware(LoginMiddleware::class);

//Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])
->name('dashboard.index')
->middleware(AuthenticateMiddleware::class);
