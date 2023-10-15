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
    Route::get('/danu-dashboard/1', [landingPageController::class, 'danu']);
    Route::get('/danu-dashboard2/1', [landingPageController::class, 'danu2']);
});

Route::middleware(['checkRole:rahma'])->group(function () {
    Route::get('/rahma-dashboard/2', [landingPageController::class, 'rahma']);
    Route::get('/rahma-dashboard2/2', [landingPageController::class, 'rahma2']);
});

Route::middleware(['checkRole:reihan'])->group(function () {
    Route::get('/reihan-dashboard/3', [landingPageController::class, 'reihan']);
    Route::get('/reihan-dashboard2/3', [landingPageController::class, 'reihan2']);
});

Route::middleware(['checkRole:yasmin'])->group(function () {
    Route::get('/yasmin-dashboard/4', [landingPageController::class, 'yasmin']);
    Route::get('/yasmin-dashboard2/4', [landingPageController::class, 'yasmin2']);
});

Route::get('/convert-pdf/{id}', [landingPageController::class, 'viewPdf']);
