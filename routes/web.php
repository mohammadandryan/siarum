<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SubkController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PresensiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//Page
Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [PageController::class, 'home'])->name('page.home');
        Route::get('/soon', [PageController::class, 'soon'])->name('page.soon');
    });
Route::get('/back', [PageController::class, 'back'])->name('page.back');

//EndPage


//Auth System
Route::resource('users', AdminController::class)->middleware('auth', 'admin');
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');
//End Auth System


Route::resource('events', EventController::class)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth', 'verified');
Route::get('/datatable', function(){
    return view('page.datatable');
})->name('page.datatable');
Route::get('/email/verify', function () {
    session()->flash('warning', 'Pendaftaran Berhasil Silahkan verifikasi email dulu!');
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    session()->flash('success', 'Verifikasi Email berhasil');
    return redirect()->route('dashboard.index');
})->middleware(['auth', 'signed'])->name('verification.verify');
use Illuminate\Http\Request;

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();


    return redirect()->route('verification.notice')->with('success', 'Link verifikasi telah dikirim kembali!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('data-warga', function () {
    return view('warga.index');
});


//Presensi
Route::resource('kegiatans', KegiatanController::class);
Route::resource('subks', SubkController::class);
Route::resource('wargas', WargaController::class);
Route::get('/presensi/{subk_id}/{nim}', [PresensiController::class, 'store'])->name('presensi.scan');
Route::get('/presensi/{subk_id}', [PresensiController::class, 'create'])->name('presensi.create');
Route::get('/qr', function () {
    return view('presensi.scan');
});
//EndPresensi
