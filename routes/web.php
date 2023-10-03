<?php

use App\Http\Controllers\identitasController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\organisasiController;
use App\Http\Controllers\pendidikanController;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\danuController;
use App\Http\Controllers\rahmaController;
use App\Http\Controllers\reihanController;
use App\Http\Controllers\yasminController;
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
});

Route::get('login', [loginController::class, 'index']);
Route::post('login', [loginController::class, 'processLogin']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['checkRole:danu'])->group(function () {
    Route::get('/danu-dashboard', [DanuController::class, 'index']);
});

Route::middleware(['checkRole:rahma'])->group(function () {
    Route::get('/rahma-dashboard', [RahmaController::class, 'index']);
});

Route::middleware(['checkRole:reihan'])->group(function () {
    Route::get('/reihan-dashboard', [ReihanController::class, 'index']);
});

Route::middleware(['checkRole:yasmin'])->group(function () {
    Route::get('/yasmin-dashboard', [YasminController::class, 'index']);
});

Route::get('/danu-pdf', [DanuController::class, 'viewPdf']);