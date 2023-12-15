<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;

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


Route::group(['middlewareGroups' => 'web'], function () {
    Route::get('/', [PagesController::class, 'homepage']);
    Route::get('about', [PagesController::class, 'about']);

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('register', function () {
        return redirect('/');
    });
    Route::get('siswa/cari', [SiswaController::class, 'cari']);
    Route::resource('user', UserController::class);
    Route::resource('kelas', KelasController::class)->middleware('auth');
    Route::resource('hobi', HobiController::class)->middleware('auth');
    Route::resource('siswa', SiswaController::class)->middleware('auth');
    Route::get('siswa', [SiswaController::class, 'index'])->withoutMiddleware('auth');
    Route::get('siswa/{siswa}', [SiswaController::class, 'show'])->withoutMiddleware('auth')->name('siswa.show');
});

Route::get('date-mutator', [SiswaController::class, 'dateMutator']);
