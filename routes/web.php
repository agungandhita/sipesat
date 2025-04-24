<?php

use App\Http\Controllers\admin\ArsipController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DomisiliController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\admin\MeninggalController;
use App\Http\Controllers\admin\PendudukController;
use App\Http\Controllers\admin\PengajuanController;
use App\Http\Controllers\admin\SktmController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
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

Route::get('/cek', function () {
    return view('frontend.surat.sktm');
});





Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/post', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', [App\Http\Controllers\Page\PageController::class, 'index'])->name('home');
    Route::get('/profil', [App\Http\Controllers\Page\PageController::class, 'profil'])->name('profil');
    Route::get('/pengumuman', [App\Http\Controllers\Page\PageController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/artikel', [App\Http\Controllers\Page\PageController::class, 'artikel'])->name('artikel');
    Route::get('/layanan', [App\Http\Controllers\Page\PageController::class, 'layanan'])->name('layanan');

    //riwayat
    Route::get('/pengajuan/riwayat', [App\Http\Controllers\Page\PengajuanController::class, 'riwayat'])->name('pengajuan.riwayat');

    //SKTM
    Route::get('/form/sktm', [App\Http\Controllers\Page\SktmController::class, 'index'])->name('form.sktm');


    //Domisili
    Route::get('/form/domisili', [App\Http\Controllers\Page\DomisiliController::class, 'index'])->name('form.domisili');


    //Suket-Meninggal
    Route::get('form/suket-meinggal', [App\Http\Controllers\Page\MeninggalController::class, 'index'])->name('form.suket-meninggal');
});



Route::middleware('admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    // penduduk
    Route::get('penduduk', [App\Http\Controllers\admin\PendudukController::class, 'index'])->name('penduduk');
    Route::post('penduduk/update/{id}', [PendudukController::class, 'update'])->name('penduduk.update');
    Route::post('penduduk/create', [PendudukController::class, 'store'])->name('penduduk.create');
    Route::post('penduduk/delete/{id}', [PendudukController::class, 'destroy'])->name('penduduk.hapus');

    // arsip
    Route::get('arsip', [ArsipController::class, 'index'])->name('arsip');
    Route::post('arsip/post', [ArsipController::class, 'store'])->name('arsip.post');
    Route::delete('arsip/delete/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');


    // Domisili routes
    Route::get('domisili', [App\Http\Controllers\admin\DomisiliController::class, 'index'])->name('domisili.index');
    Route::get('domisili/create', [App\Http\Controllers\admin\DomisiliController::class, 'create'])->name('domisili.create');
    Route::post('domisili/store', [App\Http\Controllers\admin\DomisiliController::class, 'store'])->name('domisili.store');
    Route::get('/admin/surat-keterangan-domisili/{id}', [App\Http\Controllers\admin\DomisiliController::class, 'show'])->name('domisili.show');
    Route::get('domisili/{id}/edit', [App\Http\Controllers\admin\DomisiliController::class, 'edit'])->name('domisili.edit');
    Route::post('domisili/{id}/update', [App\Http\Controllers\admin\DomisiliController::class, 'update'])->name('domisili.update');
    Route::get('domisili/{id}/download', [App\Http\Controllers\admin\DomisiliController::class, 'download'])->name('domisili.download');

    //informasi-berita
    Route::get('informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('informasi/create', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('informasi/store', [InformasiController::class, 'store'])->name('informasi.store');
    Route::get('informasi/{id}', [InformasiController::class, 'show'])->name('informasi.show');
    Route::get('informasi/edit/{id}', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::put('informasi/update/{id}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('informasi/{id}', [InformasiController::class, 'destroy'])->name('informasi.destroy');
    Route::post('informasi/upload-image', [InformasiController::class, 'uploadImage'])->name('informasi.upload-image');
    Route::post('informasi/{informasi}/komentar', [InformasiController::class, 'storeKomentar'])->name('informasi.komentar.store');
    Route::put('informasi/komentar/{komentar}', [InformasiController::class, 'updateKomentar'])->name('informasi.komentar.update');
    Route::delete('informasi/komentar/{komentar}', [InformasiController::class, 'destroyKomentar'])->name('informasi.komentar.destroy');


    Route::controller(MeninggalController::class)->group(function () {
        Route::get('/surat-keterangan-meninggal', 'index')->name('meninggal.index');
        Route::get('/surat-keterangan-meninggal/create', 'create')->name('meninggal.create');
        Route::post('/surat-keterangan-meninggal', 'store')->name('meninggal.store');
        Route::get('/admin/surat-keterangan-meninggal/{id}',  'show')->name('meninggal.show');
        Route::get('/surat-keterangan-meninggal/{id}/edit', 'edit')->name('meninggal.edit');
        Route::put('/surat-keterangan-meninggal/{id}', 'update')->name('meninggal.update');
        Route::get('/surat-keterangan-meninggal/{id}/download', 'download')->name('meninggal.download');
    });

    // SKTM routes
    Route::prefix('admin/sktm')->name('sktm.')->group(function () {
        Route::get('/', [App\Http\Controllers\admin\SktmController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\admin\SktmController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\admin\SktmController::class, 'store'])->name('store');
        Route::get('/{id}', [App\Http\Controllers\admin\SktmController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [App\Http\Controllers\admin\SktmController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [App\Http\Controllers\admin\SktmController::class, 'update'])->name('update');
        Route::post('/{id}/destroy', [App\Http\Controllers\admin\SktmController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/download', [App\Http\Controllers\admin\SktmController::class, 'download'])->name('download');
    });
});




Route::get('/', [App\Http\Controllers\Page\PageController::class, 'index'])->name('home');
Route::get('/profil', [App\Http\Controllers\Page\PageController::class, 'profil'])->name('profil');
Route::get('/pengumuman', [App\Http\Controllers\Page\PageController::class, 'pengumuman'])->name('pengumuman');
Route::get('/artikel', [App\Http\Controllers\Page\PageController::class, 'artikel'])->name('artikel');
Route::get('/layanan', [App\Http\Controllers\Page\PageController::class, 'layanan'])->name('layanan');
