<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
Route::middleware(["auth", "preventbackbutton"])->group(function () {
    Route::post("logout", [LoginController::class, "logout"])->name("logout");
    Route::prefix("admin")->group(function () {
        Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");
        Route::resource('/accounts', UserController::class);
        Route::post('/fetch-districts/{id}', [UserController::class, 'fetchDistricts']);
        Route::post('/fetch-wards/{id}', [UserController::class, 'fetchWards']);
        Route::resource("/members", MembersController::class);

    });

});
//User khong can dang nhap
Route::middleware("guest", "preventbackbutton")->group(function () {
    Route::get("login", [LoginController::class, "showForm"])->name("login");
    Route::post("login", [LoginController::class, "authenticate"])->name("login");
    Route::get("register", [RegisterController::class, "showForm"])->name("register");
    Route::post("register", [RegisterController::class, "registerAccount"])->name("registerAccount");
});

Route::get('/', function () {
    return view('home-page');
});