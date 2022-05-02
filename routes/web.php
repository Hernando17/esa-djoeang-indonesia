<?php

use App\Http\Controllers\AdminController;
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
Route::get('/login', [AdminController::class, 'login'])->name('admin.login'); //ini halaman login buat admin
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

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/admin/dashboard/user', 'user')->name('admin.user');
        Route::get('/admin/delete/{id}', 'user_delete')->name('admin.user.delete');
        route::post('/admin/update/{id}', 'user_update')->name('admin.user.update');
        route::post('/admin/resetpassword/{id}', 'user_resetpassword')->name('admin.user.resetpassword');
        route::get('/admin/profile', 'admin_profile')->name('admin.profile');
    });
});
