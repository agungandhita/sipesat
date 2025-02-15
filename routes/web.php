<?php

use App\Http\Controllers\admin\ArsipController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PendudukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

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

Route::get('/cek', function () {
    return view('frontend.surat.sktm');
});

Route::get('/', [App\Http\Controllers\Page\PageController::class, 'index'])->name('home');
Route::get('/profil', [App\Http\Controllers\Page\PageController::class, 'profil'])->name('profil');


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/post', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    // penduduk
    Route::get('penduduk', [App\Http\Controllers\admin\PendudukController::class, 'index'])->name('penduduk');
    Route::post('penduduk/create', [PendudukController::class , 'store'])->name('penduduk.create');
    Route::post('penduduk/delete/{id}', [PendudukController::class, 'destroy'])->name('penduduk.hapus');

    // arsip
    Route::get('arsip', [ArsipController::class, 'index'])->name('arsip');
    Route::post('arsip/post', [ArsipController::class, 'store'])->name('arsip.post');
    Route::delete('arsip/delete/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');

});
