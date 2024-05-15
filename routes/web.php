<?php

use App\Http\Controllers\AuthGoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
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
// Route::group(['middleware' => ['auth', 'preventbackbutton']], function () {
//     Route::post("logout", [LoginController::class, "logout"])->name("logout");
// });
Route::middleware(["auth", "preventbackbutton"])->group(function () {
    Route::post("logout", [LoginController::class, "logout"])->name("logout");
});
Route::group(['middleware' => 'auth.users'], function () {
    Route::middleware("guest")->group(function () {
        Route::get("login", [LoginController::class, "showForm"])->name("login");
        Route::post("login", [LoginController::class, "authenticate"])->name("login");
        Route::get("register", [RegisterController::class, "showForm"])->name("register");
        Route::post("register", [RegisterController::class, "registerAccount"])->name("registerAccount");
        Route::get('auth/google', [AuthGoogleController::class, 'redirectGoogle'])->name('authGoogle');
        Route::get('auth/google/call-back', [AuthGoogleController::class, 'callbackGoogle']);

        //Chuyển đến trang forgot password
        Route::get('forget-password', [ForgetPasswordController::class, 'forgetPasswordForm'])->name('forgetPassword');
        //Xác thực email và gửi thông báo đến mail
        Route::post('forget-password', [ForgetPasswordController::class, 'getPasswordForm'])->name('getPasswordForm.post');
        //Đến trang reset password
        Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('resetPassword');
        //Submit và thực hiện chức năng update password
        Route::post('reset-password', [ForgetPasswordController::class, 'changePassword'])->name('changePassword');

    });

    Route::middleware("auth")->group(function () {
        Route::prefix("admin")->group(function () {
            Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");
            Route::resource('/accounts', UserController::class);
            Route::post('/fetch-districts/{id}', [UserController::class, 'fetchDistricts']);
            Route::post('/fetch-wards/{id}', [UserController::class, 'fetchWards']);
            Route::resource("/members", MembersController::class);
        });
    });
});

//User khong can dang nhap
// Route::group(['middleware' => 'auth.users'], function () {
//     Route::middleware("guest", "preventbackbutton")->group(function () {
//         Route::get("login", [LoginController::class, "showForm"])->name("login");
//         Route::post("login", [LoginController::class, "authenticate"])->name("login");
//         Route::get("register", [RegisterController::class, "showForm"])->name("register");
//         Route::post("register", [RegisterController::class, "registerAccount"])->name("registerAccount");
//         Route::get('auth/google', [AuthGoogleController::class, 'redirectGoogle'])->name('authGoogle');
//         Route::get('auth/google/call-back', [AuthGoogleController::class, 'callbackGoogle']);
//     });
// });

// Route::group(['middleware' => 'auth.users'], function () {
//     Route::middleware(["auth", "preventbackbutton"])->group(function () {
//         Route::post("logout", [LoginController::class, "logout"])->name("logout");
//         Route::prefix("admin")->group(function () {
//             Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");
//             Route::resource('/accounts', UserController::class);
//             Route::post('/fetch-districts/{id}', [UserController::class, 'fetchDistricts']);
//             Route::post('/fetch-wards/{id}', [UserController::class, 'fetchWards']);
//             Route::resource("/members", MembersController::class);
//         });

//     });
// });
// Route::middleware(["auth", "preventbackbutton"])->group(function () {
//     Route::post("logout", [LoginController::class, "logout"])->name("logout");
//     Route::prefix("admin")->group(function () {
//         Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");
//         Route::resource('/accounts', UserController::class);
//         Route::post('/fetch-districts/{id}', [UserController::class, 'fetchDistricts']);
//         Route::post('/fetch-wards/{id}', [UserController::class, 'fetchWards']);
//         Route::resource("/members", MembersController::class);
//     });

// });
Route::get('/', function () {
    return view('home-page');
});
