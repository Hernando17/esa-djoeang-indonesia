<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\MainHomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainAkademikAbdiNegaraController;
use App\Http\Controllers\MainRumahBelajarController;
use Illuminate\Support\Facades\Route;

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

// route masih mentahan
Route::get('/login', [DashboardController::class, 'login'])->name('admin.login'); //ini halaman login buat admin
//

Route::controller(MainHomeController::class)->group(function () {
    Route::get('/', 'index')->name('main.home');
});

Route::controller(MainAkademikAbdiNegaraController::class)->group(function () {
    Route::get('/akademik-abdi-negara', 'index')->name('main.akademik-abdi-negara');
});

Route::controller(MainRumahBelajarController::class)->group(function () {
    Route::get('/rumah-belajar', 'index')->name('main.rumah-belajar');
});

route::controller(AuthController::class)->group(function () {
    route::post('/auth', 'authenticate')->name('auth');
    route::get('/logout', 'logout')->name('logout');
    Route::post('/register', 'register')->name('register');
});

Route::middleware(['author'])->group(function () {
    Route::post('/admin/dashboard/useradd', [AuthController::class, 'user_add'])->name('admin.useradd');

    Route::controller(AdminDashboardController::class)->group(function () {
        // Dashboard
        Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    });
    Route::controller(AdminUserController::class)->group(function () {
        // User
        Route::get('/admin/dashboard/user', 'user')->name('admin.user');
        Route::post('/admin/user/update/{id}', 'user_update')->name('admin.user.update');
        Route::get('/admin/delete/{id}', 'user_delete')->name('admin.user.delete');
        // Profile
        Route::get('/admin/profile/{id}', 'admin_profile')->name('admin.profile');
        Route::post('/admin/profile/{id}', 'profile_update')->name('admin.profile.update');
        Route::post('/admin/resetpassword/{id}', 'user_resetpassword')->name('admin.user.resetpassword');
    });
});
