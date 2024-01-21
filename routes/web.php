<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TailorController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::prefix('AdminPanel')->group(function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('login', [LoginController::class, 'index'])->name('admin.login');
        Route::post('login', [LoginController::class, 'login']);
        Route::get('register', [RegisterController::class, 'index'])->name('admin.register');
        Route::post('register', [RegisterController::class, 'store']);

        Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
        Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post'); 
        Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
        Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('orders', [DashboardController::class, 'orders'])->name('admin.orders');
        Route::get('logout', [LogoutController::class, 'index'])->name('admin.logout');

        Route::get('tailors', [TailorController::class, 'index'])->name('admin.tailors');
        Route::get('/approveTailor/{id}', [TailorController::class, 'approveTailor']);
        Route::get('/rejectTailor/{id}', [TailorController::class, 'rejectTailor']);
        Route::get('/approveOrder/{id}', [TailorController::class, 'approveOrder']);
        Route::get('/processOrder/{id}', [TailorController::class, 'processOrder']);
        Route::get('/completeOrder/{id}', [TailorController::class, 'completeOrder']);

        Route::get('users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/approve/{id}', [UserController::class, 'approve']);
        Route::get('/reject/{id}', [UserController::class, 'reject']);
        Route::post('users', [UserController::class, 'store']);
        Route::put('users', [UserController::class, 'update']);
        Route::delete('users', [UserController::class, 'destroy']);

        Route::get('profile', [UserController::class, 'profile'])->name('admin.profile');
        Route::post('profile', [UserController::class, 'updateProfile']);
        Route::put('profile', [UserController::class, 'updatePassword'])->name('admin.update-password');

        Route::get('features', [UserController::class, 'showFeatures'])->name('admin.features');
        Route::post('features', [UserController::class, 'features']);

        Route::get('reviews', [UserController::class, 'showreviews'])->name('admin.reviews');
    });

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
});

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/contactus', [MainController::class, 'contact']);
Route::get('/services', [MainController::class, 'services']);
Route::get('/aboutus', [MainController::class, 'about']);
Route::get('/tailorDesigns/{id}', [MainController::class, 'showTailorDesigns'])->name('tailorDesigns.show');
Route::get('/categories', [MainController::class, 'categories']);
Route::get('/signin', [LoginController::class, 'index']);
Route::get('/signup', [RegisterController::class, 'index']);

Route::get('/addwish/{id}', [MainController::class, 'addwish'])->middleware('auth');
Route::post('/reviews/{id}', [MainController::class, 'reviews'])->middleware('auth')->name('reviews.store');
Route::get('/wishlist', [MainController::class, 'list'])->middleware('auth');

Route::get('/order', [MainController::class, 'addorder'])->middleware('auth');
Route::get('/order/{id}', [MainController::class, 'addTailorOrder'])->middleware('auth');
Route::get('/orders', [MainController::class, 'showOrders'])->middleware('auth');
Route::get('/checkout/{cart}/{amount}', [MainController::class, 'checkout'])->middleware('auth');
Route::get('/checkout/{amount}/{orderId}', [MainController::class, 'checkoutPage'])->name('main.checkout');
Route::get('/checkoutPage', [MainController::class, 'checkoutPage'])->middleware('auth')->name('main.checkout');
Route::post('/checkout', [MainController::class, 'processCheckout'])->middleware('auth')->name('main.processCheckout');
Route::get('/orderNotFound', [MainController::class, 'orderNotFound'])->middleware('auth')->name('main.orderNotFound');

Route::post('/logout', [MainController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
