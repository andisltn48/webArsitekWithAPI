<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserAtAdminController;
use App\Http\Controllers\DesainController;
use App\Http\Controllers\ProfilController;

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

Route::get('/', function () {
    return view('login');
})->name('login');
//Auth::routes(['verify' => true]);
Route::post('/validate',[AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/register-store', [AuthController::class, 'register'])->name('auth.register');

Route::get('/register', function () {
    return view('register');
});

Route::group(['middleware' => ['auth','cekrole:User,Admin']], function(){
    Route::resource('user', UserController::class);

    Route::get('/company-profile', [UserController::class, 'company_profile'])->name('user.company-profile');

    Route::get('/design', [UserController::class, 'design_index'])->name('user.design');
    Route::get('/detail-design/{id}', [UserController::class, 'detail_design'])->name('user.detail-design');

    Route::get('/media-user', [UserController::class, 'media'])->name('user.media');

    Route::get('/informasi-user', [UserController::class, 'informasi'])->name('user.informasi');

    Route::get('/get-pesanan-user', [UserController::class, 'get_pesanan'])->name('user.get-pesanan');
});

Route::group(['middleware' => ['auth','cekrole:Admin']], function(){
    Route::resource('pesanan', PesananController::class);
    Route::get('/get-pesanan', [PesananController::class, 'get_pesanan'])->name('pesanan.get-pesanan');
    Route::get('/confirm/{id}', [PesananController::class, 'confirm'])->name('pesanan.confirm');
    Route::get('/done/{id}', [PesananController::class, 'done'])->name('pesanan.done');
    Route::post('/store-progress/{id}', [PesananController::class, 'store_progress'])->name('pesanan.store-progress');

    Route::resource('desain', DesainController::class);
    Route::get('/get-desain', [DesainController::class, 'get_desain'])->name('desain.get-desain');
    Route::get('/get-gambar-desain/{id}', [DesainController::class, 'get_gambar_desain'])->name('desain.get-gambar-desain');

    Route::resource('profil', ProfilController::class);
    Route::post('/visi-store', [ProfilController::class, 'visi_store'])->name('profil.visi-store');
    Route::post('/misi-store', [ProfilController::class, 'misi_store'])->name('profil.misi-store');
    Route::get('/get-visi', [ProfilController::class, 'get_visi'])->name('profil.get-visi');
    Route::get('/get-misi', [ProfilController::class, 'get_misi'])->name('profil.get-misi');
    Route::post('/visi-update/{id}', [ProfilController::class, 'visi_update'])->name('profil.visi-update');
    Route::post('/visi-destroy/{id}', [ProfilController::class, 'visi_destroy'])->name('profil.visi-destroy');
    Route::post('/misi-update/{id}', [ProfilController::class, 'misi_update'])->name('profil.misi-update');
    Route::post('/misi-destroy/{id}', [ProfilController::class, 'misi_destroy'])->name('profil.misi-destroy');

    Route::resource('media', MediaController::class);
    Route::get('/get-media', [MediaController::class, 'get_media'])->name('media.get-media');
    Route::get('/all-media', [MediaController::class, 'all_media'])->name('media.all-media');

    Route::resource('informasi', InformasiController::class);
    Route::get('/get-info', [InformasiController::class, 'get_info'])->name('informasi.get-info');

    Route::resource('user-admin', UserAtAdminController::class);
    Route::get('/get-user', [UserAtAdminController::class, 'get_user'])->name('user-admin.get-user');
});
