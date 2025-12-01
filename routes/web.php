<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// ===============================
// ADMIN CONTROLLERS
// ===============================
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\SambutanController;
use App\Http\Controllers\Admin\UsersController;

// ===============================
// USER CONTROLLERS
// ===============================
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserBeritaController;
use App\Http\Controllers\User\UserKegiatanController;
use App\Http\Controllers\User\UserPrestasiController;
use App\Http\Controllers\User\UserPpdbController;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (USER)
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman menu user (tampilan)
Route::controller(UserController::class)->group(function () {
    Route::get('/galeri', 'galeri')->name('user.galeri');
    Route::get('/guru', 'guru')->name('user.guru');
    Route::get('/ekskul', 'ekskul')->name('user.ekskul');
    Route::get('/lokasi', 'lokasi')->name('user.lokasi');
    Route::get('/sejarah', 'sejarah')->name('user.sejarah');
    Route::get('/ppdb', 'ppdb')->name('user.ppdb');
});

// Route untuk submit PPDB (user)
Route::post('/ppdb/store', [UserPpdbController::class, 'store'])->name('user.ppdb.store');

// BERITA - USER
Route::get('/berita', [UserBeritaController::class, 'index'])->name('user.berita');
Route::get('/berita/{slug}', [UserBeritaController::class, 'show'])->name('user.single-berita');

// KEGIATAN - USER
Route::get('/kegiatan', [UserKegiatanController::class, 'index'])->name('user.kegiatan');
Route::get('/kegiatan/{id}', [UserKegiatanController::class, 'show'])->name('user.single-kegiatan');

// PRESTASI - USER
Route::get('/prestasi', [UserPrestasiController::class, 'index'])->name('user.prestasi');
Route::get('/prestasi/{id}', [UserPrestasiController::class, 'show'])->name('user.single-prestasi');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified', 'adminmiddleware'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN CRUD ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'adminmiddleware'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('/berita', BeritaController::class);
        Route::resource('/galeri', GaleriController::class);
        Route::resource('/prestasi', PrestasiController::class);
        Route::resource('/guru', GuruController::class);
        Route::resource('/kegiatan', KegiatanController::class);
        Route::resource('/ekskul', EkskulController::class);
        Route::resource('/lokasi', LokasiController::class);

        // ===============================
        // HOME SETTING (BARU DITAMBAHKAN)
        // ===============================
        
        // Hero slides (only index/edit/update)
        Route::get('/hero', [\App\Http\Controllers\Admin\HeroController::class, 'index'])->name('hero.index');
        Route::get('/hero/{hero}/edit', [\App\Http\Controllers\Admin\HeroController::class, 'edit'])->name('hero.edit');
        Route::put('/hero/{hero}', [\App\Http\Controllers\Admin\HeroController::class, 'update'])->name('hero.update');

        // Sambutan (index, create, store, edit, update)
        Route::get('/sambutan', [\App\Http\Controllers\Admin\SambutanController::class, 'index'])->name('sambutan.index');
        Route::get('/sambutan/create', [\App\Http\Controllers\Admin\SambutanController::class, 'create'])->name('sambutan.create');
        Route::post('/sambutan', [\App\Http\Controllers\Admin\SambutanController::class, 'store'])->name('sambutan.store');
        Route::get('/sambutan/{sambutan}/edit', [\App\Http\Controllers\Admin\SambutanController::class, 'edit'])->name('sambutan.edit');
        Route::put('/sambutan/{sambutan}', [\App\Http\Controllers\Admin\SambutanController::class, 'update'])->name('sambutan.update');


        // PPDB ADMIN ROUTE
        // PPDB ADMIN ROUTE
        // =========================
// PPDB ADMIN
// =========================
        Route::prefix('ppdb')->group(function () {

            Route::get('/', [AdminPpdbController::class, 'index'])->name('ppdb.index');
            Route::get('/show/{id}', [AdminPpdbController::class, 'show'])->name('ppdb.show');

            Route::delete('/delete/{id}', [AdminPpdbController::class, 'destroy'])->name('ppdb.delete');
            Route::delete('/delete-all', [AdminPpdbController::class, 'destroyAll'])->name('ppdb.deleteAll');

            // EXPORT & IMPORT
            Route::get('/export', [AdminPpdbController::class, 'export'])->name('ppdb.export');
            Route::post('/import', [AdminPpdbController::class, 'import'])->name('ppdb.import');

        });



        // Management Admin
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/users', [UsersController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

    });


/*
|--------------------------------------------------------------------------
| USER PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
