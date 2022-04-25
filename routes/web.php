<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainHomeController;
use App\Http\Controllers\AuthController;
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

Route::controller(MainHomeController::class)->group(function () {
    Route::get('/', 'index')->name('main.home');
});

route::controller(AuthController::class)->group(function () {
    route::post('/auth', 'authenticate')->name('auth');
    route::get('/logout', 'logout')->name('logout');
    route::post('/register', 'register')->name('register');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/admin/dashboard/user/index', 'user')->name('admin.user');
    Route::get('/admin/delete/{id}', 'user_delete')->name('admin.user.delete');
});
