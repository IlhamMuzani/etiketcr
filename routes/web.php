<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Back\TiketController;
use App\Http\Controllers\Back\HomeController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\ProdukController;
use App\Http\Controllers\Back\LevelController;
use App\Http\Controllers\Back\LayananController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Back\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [AuthController::class, 'login']);

// Back

Route::get('/', [HomeController::class, 'index']);

Route::resource('role', RoleController::class);
Route::resource('tiket', TiketController::class);
Route::resource('produk', ProdukController::class);
Route::resource('user', UserController::class);
Route::resource('layanan', LayananController::class);
Route::resource('produk', ProdukController::class);
Route::resource('level', LevelController::class);

// Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);

Route::post('update-status', [TiketController::class, 'updateStatus']);

// Front

Route::get('/dashboard', [FrontController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
