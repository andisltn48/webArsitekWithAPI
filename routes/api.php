<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PesananController;
use App\Http\Controllers\API\DesainController;
use App\Http\Controllers\API\InformasiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum', 'cekrole:1,2']], function(){
    //User
    Route::resource('user', UserController::class);
});

Route::group(['middleware' => ['auth:sanctum', 'cekrole:1']], function(){
    //Admin
    Route::resource('pesanan', PesananController::class);
    Route::post('/get-pesanan', [PesananController::class, 'get_pesanan'])->name('pesanan.get-pesanan');

    Route::resource('desain', DesainController::class);
    Route::post('/get-desain', [DesainController::class, 'get_desain'])->name('desain.get-desain');

    Route::resource('informasi', InformasiController::class);
});

Route::group(['middleware' => ['auth:sanctum']], function(){ 
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/get-pesanan', [PesananController::class, 'get_pesanan'])->name('pesanan.get-pesanan');
});