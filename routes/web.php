<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DiagnosaController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\PengetahuanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ScreeningController;
use Illuminate\Routing\RouteGroup;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/home', [HomeController::class, 'index'])->name("home");

Route::get('/register', function () {
    return view('auth.register');
})->name("register");

Route::get('/screening', [ScreeningController::class, 'index'])->name('screening');
Route::get('/riwayat', [ScreeningController::class, 'riwayat'])->name('riwayat');
Route::post('/hasil', [ScreeningController::class, 'hasil_konsultasi'])->name('hasil_konsultasi');
Route::get('/hasil/{id}', [ScreeningController::class, 'show_hasil'])->name('lihat_hasil');
Route::get('/hasil-pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdf');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [PageController::class, 'admin'])->name('home');
    Route::resource('pengguna', AnggotaController::class);
    Route::resource('gejala', GejalaController::class);
    Route::resource('pengetahuan', PengetahuanController::class);
    Route::resource('diagnosa', DiagnosaController::class);
    Route::resource('artikel', ArtikelController::class);
});
