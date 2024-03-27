<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
Route::middleware("auth")->group(function () {
    Route::post("logout", [LoginController::class, "logout"])->name("logout");

    Route::prefix("admin")->group(function () {
        Route::get("dashboard", function () {
            return view("admin.dashboard");
        })->name("dashboard");
    });
});

// Route::get('/', function () {
//     return view('admin.app');
// });

//user khong can dang nhap
Route::get("/login", [LoginController::class, "showForm"])->name("login");
Route::post("/login", [LoginController::class, "authenticate"])->name("login");
