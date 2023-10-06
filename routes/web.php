<?php

use App\Http\Controllers\identitasController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\organisasiController;
use App\Http\Controllers\pendidikanController;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\landingPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

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
    return view('welcome');
});

Route::middleware(['checkRole:admin'])->group(function () {
    Route::resource('identitas', IdentitasController::class);
    Route::resource('portofolio', PortofolioController::class);
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('organisasi', OrganisasiController::class);
    Route::resource('skill', SkillController::class);
    Route::resource('kontak', KontakController::class);
});

Route::get('login', [loginController::class, 'index']);
Route::post('login', [loginController::class, 'processLogin']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['checkRole:danu'])->group(function () {
    Route::get('/danu-dashboard', [landingPageController::class, 'danu']);
});

Route::middleware(['checkRole:rahma'])->group(function () {
    Route::get('/rahma-dashboard', [landingPageController::class, 'rahma']);
});

Route::middleware(['checkRole:reihan'])->group(function () {
    Route::get('/reihan-dashboard', [landingPageController::class, 'reihan']);
});

Route::middleware(['checkRole:yasmin'])->group(function () {
    Route::get('/yasmin-dashboard', [landingPageController::class, 'yasmin']);
});

Route::get('/danu-pdf', [landingPageController::class, 'viewPdf']);