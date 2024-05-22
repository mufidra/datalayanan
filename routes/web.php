<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KategoriLayananController;
use App\Http\Controllers\layananController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', [HalamanController::class, 'index']);
Route::get('/kontak', [HalamanController::class, 'kontak']);
Route::get('/tentang', [HalamanController::class, 'tentang']);

Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);

Route::resource('kategori-layanan', KategoriLayananController::class);
Route::get('layanan/excel', [layananController::class, 'excel'])->name('layanan.excel');
Route::get('layanan/pdf', [layananController::class, 'pdf'])->name('layanan.pdf');
Route::resource('layanan', layananController::class);

Route::get('/', function () {
    return view('sesi/welcome');
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');

    return 'Optimize Successfully';
});

