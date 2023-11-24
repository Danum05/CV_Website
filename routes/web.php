<?php

use App\Http\Controllers\identitasController;
use App\Http\Controllers\identitasUserController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\organisasiController;
use App\Http\Controllers\organisasiUserController;
use App\Http\Controllers\pendidikanController;
use App\Http\Controllers\pendidikanUserController;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\portofolioUserController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\galleryUserController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KontakUserController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SkillUserController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckIdentitasOwner;

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

Route::middleware(['checkRole:superadmin'])->group(function () {
    Route::resource('users', userController::class);
});

Route::middleware(['checkRole:user'])->group(function ()  {
    Route::get('identitas_user/{identitas_user}/create', [IdentitasUserController::class, 'create'])->name('identitas_user.create');
    Route::post('identitas_user', [IdentitasUserController::class, 'store'])->name('identitas_user.store');
    Route::get('identitas_user/{identitas_user}', [IdentitasUserController::class, 'show'])->name('identitas_user.show');
    Route::get('identitas_user/{identitas_user}/edit', [IdentitasUserController::class, 'edit'])->name('identitas_user.edit');
    Route::put('identitas_user/{identitas_user}', [IdentitasUserController::class, 'update'])->name('identitas_user.update');
    Route::delete('identitas_user/{identitas_user}', [IdentitasUserController::class, 'destroy'])->name('identitas_user.destroy');
    Route::get('identitas_user', [IdentitasUserController::class, 'index'])->name('identitas_user.index');
    Route::resource('skill_user', SkillUserController::class);
    Route::get('skill_user/{skill_user}', [skillUserController::class, 'show'])->name('skill.show');
    Route::resource('portofolio_user', PortofolioUserController::class);
    Route::get('portofolio_user/{portofolio_user}', [portofolioUserController::class, 'show'])->name('portofolio.show');
    Route::resource('pendidikan_user', pendidikanUserController::class);
    Route::get('pendidikan_user/{pendidikan_user}', [pendidikanUserController::class, 'show'])->name('pendidikan.show');
    Route::resource('organisasi_user', OrganisasiUserController::class);
    Route::get('organisasi_user/{organisasi_user}', [organisasiUserController::class, 'show'])->name('organisasi.show');
    Route::resource('gallery_user', galleryUserController::class);
    Route::get('gallery_user/{gallery_user}', [galleryUserController::class, 'show'])->name('gallery.show');
    Route::resource('kontak_user', KontakUserController::class);
    Route::get('kontak_user/{kontak_user}', [kontakUserController::class, 'show'])->name('kontak.show');
});

Route::get('login', [loginController::class, 'index']);
Route::post('login', [loginController::class, 'processLogin']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [loginController::class, 'register'])->name('register');
Route::post('register', [loginController::class, 'register_action'])->name('register.action');

Route::get('/dashboard/{name}', [landingPageController::class, 'dashboard']);
Route::get('/dashboard2/{name}', [landingPageController::class, 'dashboard2']);


Route::get('/convert-pdf/{name}', [landingPageController::class, 'viewPdf']);

