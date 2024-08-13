<?php

use App\Http\Controllers\Admin\AdminAcaraController;
use App\Http\Controllers\Admin\AdminAlumniController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminDonasiController;
use App\Http\Controllers\Admin\AdminJurusanController;
use App\Http\Controllers\Admin\AdminLevelController;
use App\Http\Controllers\Admin\AdminPekerjaanController;
use App\Http\Controllers\Admin\AdminPengurusController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Alumni\AlumniAcaraController;
use App\Http\Controllers\Alumni\AlumniDonasiController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Pengurus\PengurusAcaraController;
use App\Http\Controllers\Pengurus\PengurusAlumniController;
use App\Http\Controllers\Pengurus\PengurusBeritaController;
use App\Http\Controllers\Pengurus\PengurusDonasiController;
use App\Http\Controllers\Setting\SettingController;

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

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login-action', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout-action', [LoginController::class, 'logout'])->name('login.logout');

// Dashboard
Route::group(['middleware' => ['auth', 'verified']], function () {

    // Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/updateprofile', [SettingController::class, 'updateprofile'])->name('setting.updateprofile');
    Route::post('/setting/updateusername', [SettingController::class, 'updateusername'])->name('setting.updateusername');
    Route::post('/setting/updatepassword', [SettingController::class, 'updatepassword'])->name('setting.updatepassword');
    Route::post('/setting/updategambar', [SettingController::class, 'updategambar'])->name('setting.updategambar');
    Route::post('/setting/hapusgambar', [SettingController::class, 'hapusgambar'])->name('setting.hapusgambar');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/biodata/{id}', [DashboardController::class, 'biodata'])->name('dashboard.biodata');
    Route::post('/dashboard/updatebiodata', [DashboardController::class, 'updatebiodata'])->name('dashboard.updatebiodata');

    // Admin
    Route::group(['middleware' => [CekLevel::class . ':1']], function () { {

            // Data Donasi
            Route::get('/data-donasi', [AdminDonasiController::class, 'index'])->name('data-donasi.index');
            Route::get('/data-donasi/create', [AdminDonasiController::class, 'create'])->name('data-donasi.create');
            Route::post('/data-donasi/store', [AdminDonasiController::class, 'store'])->name('data-donasi.store');
            Route::get('/data-donasi/edit/{id}', [AdminDonasiController::class, 'edit'])->name('data-donasi.edit');
            Route::post('/data-donasi/update/{id}', [AdminDonasiController::class, 'update'])->name('data-donasi.update');
            Route::post('/data-donasi/destroy/{id}', [AdminDonasiController::class, 'destroy'])->name('data-donasi.destroy');

            // Data Pekerjaan
            Route::get('/data-pekerjaan', [AdminPekerjaanController::class, 'index'])->name('data-pekerjaan.index');
            Route::get('/data-pekerjaan/create', [AdminPekerjaanController::class, 'create'])->name('data-pekerjaan.create');
            Route::post('/data-pekerjaan/store', [AdminPekerjaanController::class, 'store'])->name('data-pekerjaan.store');
            Route::get('/data-pekerjaan/edit/{id}', [AdminPekerjaanController::class, 'edit'])->name('data-pekerjaan.edit');
            Route::post('/data-pekerjaan/update/{id}', [AdminPekerjaanController::class, 'update'])->name('data-pekerjaan.update');
            Route::post('/data-pekerjaan/destroy/{id}', [AdminPekerjaanController::class, 'destroy'])->name('data-pekerjaan.destroy');

            // Data Alumni
            Route::get('/data-alumni', [AdminAlumniController::class, 'index'])->name('data-alumni.index');
            Route::get('/data-alumni/alumni/{id}', [AdminAlumniController::class, 'alumni'])->name('data-alumni.alumni');
            Route::get('/data-alumni/create/{id}', [AdminAlumniController::class, 'create'])->name('data-alumni.create');
            Route::get('/data-alumni/edit/{id}', [AdminAlumniController::class, 'edit'])->name('data-alumni.edit');
            Route::post('/data-alumni/store', [AdminAlumniController::class, 'store'])->name('data-alumni.store');
            Route::post('/data-alumni/update/{id}', [AdminAlumniController::class, 'update'])->name('data-alumni.update');
            Route::post('/data-alumni/destroy/{id}', [AdminAlumniController::class, 'destroy'])->name('data-alumni.destroy');

            // Data Jurusan
            Route::get('/data-jurusan', [AdminJurusanController::class, 'index'])->name('data-jurusan.index');
            Route::get('/data-jurusan/create', [AdminJurusanController::class, 'create'])->name('data-jurusan.create');
            Route::post('/data-jurusan/store', [AdminJurusanController::class, 'store'])->name('data-jurusan.store');
            Route::get('/data-jurusan/edit/{id}', [AdminJurusanController::class, 'edit'])->name('data-jurusan.edit');
            Route::post('/data-jurusan/update/{id}', [AdminJurusanController::class, 'update'])->name('data-jurusan.update');
            Route::post('/data-jurusan/destroy/{id}', [AdminJurusanController::class, 'destroy'])->name('data-jurusan.destroy');

            // Berita
            Route::get('/data-berita', [AdminBeritaController::class, 'index'])->name('data-berita.index');
            Route::get('/data-berita/create', [AdminBeritaController::class, 'create'])->name('data-berita.create');
            Route::post('/data-berita/store', [AdminBeritaController::class, 'store'])->name('data-berita.store');
            Route::get('/data-berita/edit/{id}', [AdminBeritaController::class, 'edit'])->name('data-berita.edit');
            Route::post('/data-berita/update/{id}', [AdminBeritaController::class, 'update'])->name('data-berita.update');
            Route::post('/data-berita/destroy/{id}', [AdminBeritaController::class, 'destroy'])->name('data-berita.destroy');

            // Acara
            Route::get('/data-acara', [AdminAcaraController::class, 'index'])->name('data-acara.index');
            Route::get('/data-acara/create', [AdminAcaraController::class, 'create'])->name('data-acara.create');
            Route::post('/data-acara/store', [AdminAcaraController::class, 'store'])->name('data-acara.store');
            Route::get('/data-acara/edit/{id}', [AdminAcaraController::class, 'edit'])->name('data-acara.edit');
            Route::post('/data-acara/update/{id}', [AdminAcaraController::class, 'update'])->name('data-acara.update');
            Route::post('/data-acara/destroy/{id}', [AdminAcaraController::class, 'destroy'])->name('data-acara.destroy');

            // Pengurus
            Route::get('/data-pengurus', [AdminPengurusController::class, 'index'])->name('data-pengurus.index');
            Route::get('/data-pengurus/create', [AdminPengurusController::class, 'create'])->name('data-pengurus.create');
            Route::post('/data-pengurus/store', [AdminPengurusController::class, 'store'])->name('data-pengurus.store');
            Route::get('/data-pengurus/edit/{id}', [AdminPengurusController::class, 'edit'])->name('data-pengurus.edit');
            Route::post('/data-pengurus/update/{id}', [AdminPengurusController::class, 'update'])->name('data-pengurus.update');
            Route::post('/data-pengurus/destroy/{id}', [AdminPengurusController::class, 'destroy'])->name('data-pengurus.destroy');

            // Users Registrasi
            Route::get('/data-user', [AdminUserController::class, 'index'])->name('data-user.index');
            Route::get('/data-user/create', [AdminUserController::class, 'create'])->name('data-user.create');
            Route::post('/data-user/store', [AdminUserController::class, 'store'])->name('data-user.store');
            Route::get('/data-user/edit/{id}', [AdminUserController::class, 'edit'])->name('data-user.edit');
            Route::post('/data-user/update/{id}', [AdminUserController::class, 'update'])->name('data-user.update');
            Route::post('/data-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('data-user.destroy');

            // Level
            Route::get('/data-level', [AdminLevelController::class, 'index'])->name('data-level.index');
            Route::get('/data-level/create', [AdminLevelController::class, 'create'])->name('data-level.create');
            Route::post('/data-level/store', [AdminLevelController::class, 'store'])->name('data-level.store');
            Route::get('/data-level/edit/{id}', [AdminLevelController::class, 'edit'])->name('data-level.edit');
            Route::post('/data-level/update/{id}', [AdminLevelController::class, 'update'])->name('data-level.update');
            Route::post('/data-level/destroy/{id}', [AdminLevelController::class, 'destroy'])->name('data-level.destroy');
        }
    });

    // Pengurus
    Route::group(['middleware' => [CekLevel::class . ':2']], function () {{

        // Data Donasi
        Route::get('/pengurus-donasi', [PengurusDonasiController::class, 'index'])->name('pengurus-donasi.index');
        Route::get('/pengurus-donasi/create', [PengurusDonasiController::class, 'create'])->name('pengurus-donasi.create');
        Route::post('/pengurus-donasi/store', [PengurusDonasiController::class, 'store'])->name('pengurus-donasi.store');
        Route::get('/pengurus-donasi/edit/{id}', [PengurusDonasiController::class, 'edit'])->name('pengurus-donasi.edit');
        Route::post('/pengurus-donasi/update/{id}', [PengurusDonasiController::class, 'update'])->name('pengurus-donasi.update');
        Route::post('/pengurus-donasi/destroy/{id}', [PengurusDonasiController::class, 'destroy'])->name('pengurus-donasi.destroy');

        // Data Alumni
        Route::get('/pengurus-alumni', [PengurusAlumniController::class, 'index'])->name('pengurus-alumni.index');
        Route::get('/pengurus-alumni/alumni/{id}', [PengurusAlumniController::class, 'alumni'])->name('pengurus-alumni.alumni');
        Route::get('/pengurus-alumni/create/{id}', [PengurusAlumniController::class, 'create'])->name('pengurus-alumni.create');
        Route::get('/pengurus-alumni/edit/{id}', [PengurusAlumniController::class, 'edit'])->name('pengurus-alumni.edit');
        Route::post('/pengurus-alumni/store', [PengurusAlumniController::class, 'store'])->name('pengurus-alumni.store');
        Route::post('/pengurus-alumni/update/{id}', [PengurusAlumniController::class, 'update'])->name('pengurus-alumni.update');
        Route::post('/pengurus-alumni/destroy/{id}', [PengurusAlumniController::class, 'destroy'])->name('pengurus-alumni.destroy');

        // Berita
        Route::get('/pengurus-berita', [PengurusBeritaController::class, 'index'])->name('pengurus-berita.index');
        Route::get('/pengurus-berita/create', [PengurusBeritaController::class, 'create'])->name('pengurus-berita.create');
        Route::post('/pengurus-berita/store', [PengurusBeritaController::class, 'store'])->name('pengurus-berita.store');
        Route::get('/pengurus-berita/edit/{id}', [PengurusBeritaController::class, 'edit'])->name('pengurus-berita.edit');
        Route::post('/pengurus-berita/update/{id}', [PengurusBeritaController::class, 'update'])->name('pengurus-berita.update');
        Route::post('/pengurus-berita/destroy/{id}', [PengurusBeritaController::class, 'destroy'])->name('pengurus-berita.destroy');

        // Acara
        Route::get('/pengurus-acara', [PengurusAcaraController::class, 'index'])->name('pengurus-acara.index');
        Route::get('/pengurus-acara/create', [PengurusAcaraController::class, 'create'])->name('pengurus-acara.create');
        Route::post('/pengurus-acara/store', [PengurusAcaraController::class, 'store'])->name('pengurus-acara.store');
        Route::get('/pengurus-acara/edit/{id}', [PengurusAcaraController::class, 'edit'])->name('pengurus-acara.edit');
        Route::post('/pengurus-acara/update/{id}', [PengurusAcaraController::class, 'update'])->name('pengurus-acara.update');
        Route::post('/pengurus-acara/destroy/{id}', [PengurusAcaraController::class, 'destroy'])->name('pengurus-acara.destroy');
    }});

    // Alumni
    Route::group(['middleware' => [CekLevel::class . ':3']], function () { {
            // Acara
            Route::get('/alumni-acara', [AlumniAcaraController::class, 'index'])->name('alumni-acara.index');
            // Donasi
            Route::get('/alumni-donasi', [AlumniDonasiController::class, 'index'])->name('alumni-donasi.index');
        }
    });
});
