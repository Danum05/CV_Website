<?php

use App\Http\Controllers\identitasController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\organisasiController;
use App\Http\Controllers\pendidikanController;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\homeController;
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

Route::get('/', [homeController::class, 'home']);

Route::middleware(['checkRole:admin'])->group(function () {
    Route::resource('identitas', IdentitasController::class);
    Route::resource('portofolio', PortofolioController::class);
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('organisasi', OrganisasiController::class);
    Route::resource('skill', SkillController::class);
    Route::resource('kontak', KontakController::class);
    Route::resource('gallery', galleryController::class);
});

Route::get('login', [loginController::class, 'index']);
Route::post('login', [loginController::class, 'processLogin']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/dashboard/{name}', [landingPageController::class, 'dashboard']);
Route::get('/dashboard2/{name}', [landingPageController::class, 'dashboard2']);


Route::get('/convert-pdf/{name}', [landingPageController::class, 'viewPdf']);

