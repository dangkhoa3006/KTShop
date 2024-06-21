<?php

use App\Http\Controllers\AuthFacebookController;
use App\Http\Controllers\AuthGoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Models\Specification;
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

//Yêu cầu đăng nhập
Route::middleware(["auth", "preventbackbutton"])->group(function () {
    Route::post("logout", [LoginController::class, "logout"])->name("logout");
    //Xem và chỉnh sửa profile
    Route::get('/account/profile', [ProfileController::class, 'showProfile'])->name('showProfile');
    Route::post('/account/profile/update-avatar', [ProfileController::class, 'updateAvatar'])->name('updateAvatar');
    Route::post('/account/profile/update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/fetch-districts/{id}', [ProfileController::class, 'fetchDistricts']);
    Route::post('/fetch-wards/{id}', [ProfileController::class, 'fetchWards']);
});
Route::group(['middleware' => 'auth.users'], function () {
    //nếu đường dẫn đến trang /admin/dashboard thì quay lại trang login -> bắt buộc đăng nhập
    Route::middleware('auth')->group(function () {
        Route::prefix("admin")->group(function () {
            Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");
            Route::resource('/accounts', UserController::class);
            Route::post('/fetch-districts/{id}', [UserController::class, 'fetchDistricts']);
            Route::post('/fetch-wards/{id}', [UserController::class, 'fetchWards']);
            Route::resource("/members", MembersController::class);
            Route::resource('/categories', CategoryController::class);
            Route::resource('/subcategories', SubCategoryController::class);
            Route::resource('/products', ProductController::class);
            Route::post('/fetch-subcategories/{id}', [ProductController::class, 'fetchSubCategories']);
            Route::resource('/specifications', Specification::class);
        });
    });
    //Không yêu cầu đăng nhập
    Route::middleware("guest")->group(function () {
        //Chức năng đăng nhập tài khoản
        Route::get("login", [LoginController::class, "showForm"])->name("login");
        Route::post("login", [LoginController::class, "authenticate"])->name("login");
        //Chức năng đăng ký tài khoản
        Route::get("register", [RegisterController::class, "showForm"])->name("register");
        Route::post("register", [RegisterController::class, "registerAccount"])->name("registerAccount");
        //Xác thực tài khoản
        Route::get('/verify-account/{token}', [RegisterController::class, 'verifyAccount'])->name('verifyAccount');
        //Đăng nhập Google
        Route::get('auth/google', [AuthGoogleController::class, 'redirectGoogle'])->name('authGoogle');
        Route::get('auth/google/call-back', [AuthGoogleController::class, 'callbackGoogle']);
        //Đăng nhập Facebook
        Route::get('auth/facebook', [AuthFacebookController::class, 'redirectFacebook'])->name('authFacebook');
        Route::get('auth/facebook/callback', [AuthFacebookController::class, 'callbackFacebook']);
        //Chuyển đến trang Quên mật khẩu
        Route::get('forget-password', [ForgetPasswordController::class, 'forgetPasswordForm'])->name('forgetPassword');
        //Xác thực email và gửi thông báo đến mail
        Route::post('forget-password', [ForgetPasswordController::class, 'getPasswordForm'])->name('getPasswordForm.post');
        //Đến trang reset password
        Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('resetPassword');
        //Submit và thực hiện chức năng update password
        Route::post('reset-password', [ForgetPasswordController::class, 'changePassword'])->name('changePassword');

        //Trang chi tiết giỏ hàng
        Route::get('/cart', [CartController::class, 'index'])->name('indexCart');
        Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/remove/{rowId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/cart/update/{rowId}', [CartController::class, 'updateQuantity'])->name('cart.update');
        //Trang chi tiết sản phẩm
        Route::get('/sanpham/{productSlug}', [ProductController::class, 'show'])->name('showProduct');
        //Hiển thị tất cả sản phẩm trong danh mục
        Route::get('/{categorySlug}', [CategoryController::class, 'show'])->name('showCategory');
        //Hiển thị tất cả sản phẩm trong loại sản phẩm
        Route::get('/{categorySlug}/{subcategorySlug}', [SubCategoryController::class, 'show'])->name('showSubCategory');
    });

});
//Trang chủ
Route::get("/", [HomeController::class, 'Homepage'])->name('homepage');
