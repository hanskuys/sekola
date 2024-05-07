<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\GuruMatpelController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\KategoriKelasController as AdminKategoriKelasController;
use App\Http\Controllers\Admin\PelajaranController as AdminPelajaranController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\TahunAjaranController as AdminTahunAjaranController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\NilaiController as AdminNilaiController;
use App\Http\Controllers\Admin\PendaftaranController as AdminPendaftaranController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Guru\AbsenController as GuruAbsenController;
use App\Http\Controllers\Guru\SiswaController as GuruSiswaController;

use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;

use App\Http\Controllers\CalonSiswa\DataSiswaController as DataSiswaController;
use App\Http\Controllers\CalonSiswa\DataLengkapSiswaController as SiswaLengkapController;

use App\Http\Controllers\AuthController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/','LandingController@index')->name('home');

    
    Route::get('/login','AuthController@index')->name('login');
    Route::post('/login','AuthController@login');
    
    Route::get('/daftar','AuthController@register')->name('daftar');
    Route::post('/daftar','AuthController@store');
    
    
    // Route::get('/admin','AuthController@admin')->name('admin');
    // Route::post('/login-admin','AuthController@loginAdmin')->name('loginAdmin');
});


// Route::middleware(['auth'])->get('logout', [AuthController::class, 'logout']);

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    
    Route::get('/','AuthController@index')->name('login');
    Route::post('/','AuthController@login');
    Route::middleware(['auth:web'])->group(function () {

        Route::get('/beranda', 'DashboardController@index');

        Route::prefix('/ppdb')->name('ppdb.')->group(function () {
            Route::get('/','PPDBController@index')->name('index');
            Route::get('/{id}','PPDBController@show')->name('show');
            Route::get('/{id}/edit','PPDBController@edit')->name('edit');
            Route::post('{id}/update','PPDBController@update')->name('update');
            Route::delete('/{id}/delete','PPDBController@destroy')->name('delete');
        });

        
        Route::prefix('/master')->group(function () {
            
            Route::prefix('/kelas')->name('kelas.')->group(function () {
                Route::get('/','KelasController@index')->name('index');
                Route::get('/create','KelasController@create')->name('create');
                Route::post('/store','KelasController@store')->name('store');
                Route::get('/{id}','KelasController@show')->name('show');
                Route::get('/{id}/edit','KelasController@edit')->name('edit');
                Route::post('{id}/update','KelasController@update')->name('update');
                Route::delete('/{id}/delete','KelasController@destroy')->name('delete');
            });
            
            Route::prefix('/tahun-ajaran')->name('tahun.')->group(function () {
                Route::get('/','TahunController@index')->name('index');
                Route::get('/create','TahunController@create')->name('create');
                Route::post('/store','TahunController@store')->name('store');
                Route::get('/{id}','TahunController@show')->name('show');
                Route::get('/{id}/edit','TahunController@edit')->name('edit');
                Route::post('{id}/update','TahunController@update')->name('update');
                Route::delete('/{id}/delete','TahunController@destroy')->name('delete');
            });

            Route::prefix('/pelajaran')->name('pelajaran.')->group(function () {
                Route::get('/','PelajaranController@index')->name('index');
                Route::get('/create','PelajaranController@create')->name('create');
                Route::post('/store','PelajaranController@store')->name('store');
                Route::get('/guru','PelajaranController@guru')->name('guru');
                Route::post('/guru/store','PelajaranController@guruStore')->name('guru.store');
                Route::post('/guru/update','PelajaranController@guruUpdate')->name('guru.update');
                Route::delete('/guru/{id}/delete','PelajaranController@gurudestroy')->name('delete');
                Route::get('/{id}','PelajaranController@show')->name('show');
                Route::get('/{id}/edit','PelajaranController@edit')->name('edit');
                Route::post('{id}/update','PelajaranController@update')->name('update');
                Route::delete('/{id}/delete','PelajaranController@destroy')->name('delete');
            });

        });
        
        Route::prefix('/guru')->name('guru.')->group(function () {
            Route::get('/','GuruController@index')->name('index');
            Route::get('/create','GuruController@create')->name('create');
            Route::post('/store','GuruController@store')->name('store');
            Route::get('/{id}','GuruController@show')->name('show');
            Route::get('/{id}/edit','GuruController@edit')->name('edit');
            Route::post('{id}/update','GuruController@update')->name('update');
            Route::delete('/{id}/delete','GuruController@destroy')->name('delete');
        });
        
        Route::prefix('/jadwal')->name('jadwal.')->group(function () {
            Route::get('/','JadwalController@index')->name('index');
            Route::get('/create','JadwalController@create')->name('create');
            Route::post('/store','JadwalController@store')->name('store');
            Route::get('/{id}','JadwalController@show')->name('show');
            Route::get('/{id}/edit','JadwalController@edit')->name('edit');
            Route::post('{id}/update','JadwalController@update')->name('update');
            Route::delete('/{id}/delete','JadwalController@destroy')->name('delete');
        });

        Route::prefix('/siswa')->name('siswa.')->group(function () {
            Route::get('/','SiswaController@index')->name('index');
            Route::get('/create','SiswaController@create')->name('create');
            Route::post('/store','SiswaController@store')->name('store');
            Route::get('/{id}','SiswaController@show')->name('show');
            Route::get('/{id}/edit','SiswaController@edit')->name('edit');
            Route::post('{id}/update','SiswaController@update')->name('update');
            Route::delete('/{id}/delete','SiswaController@destroy')->name('delete');
        });

        Route::get('/logout','AuthController@logout')->name('logout');
    });
});

Route::get('/admin/logout','AuthController@logoutAdmin')->middleware(['auth:web'])->name('admin.logout');


Route::prefix('guru')->name('guru.')->namespace('Guru')->group(function () {


    Route::get('/','AuthController@index')->name('index');
    Route::post('/login','AuthController@login')->name('login');

    Route::middleware(['auth:karyawan'])->group(function () {

        Route::get('/beranda','DashboardController@index')->name('dashboard');
        Route::get('/profil','DashboardController@profil')->name('profil');
        Route::get('/profil/update','DashboardController@update')->name('update');

        Route::prefix('/nilai')->name('nilai.')->group(function () {
            Route::get('/','NilaiController@index')->name('index');
            Route::get('/create','NilaiController@create')->name('create');
            Route::post('/store','NilaiController@store')->name('store');
            Route::get('/{id}','NilaiController@show')->name('show');
            Route::get('/{id}/edit','NilaiController@edit')->name('edit');
            Route::post('{id}/update','NilaiController@update')->name('update');
            Route::delete('/{id}/delete','NilaiController@destroy')->name('delete');
        });
        
        Route::prefix('/absen')->name('absen.')->group(function () {
            Route::get('/','AbsenController@index')->name('index');
            Route::get('/create','AbsenController@create')->name('create');
            Route::post('/store','AbsenController@store')->name('store');
            Route::get('/{id}','AbsenController@show')->name('show');
            Route::get('/{id}/edit','AbsenController@edit')->name('edit');
            Route::post('{id}/update','AbsenController@update')->name('update');
            Route::delete('/{id}/delete','AbsenController@destroy')->name('delete');
        });

        Route::prefix('/siswa')->name('siswa.')->group(function () {
            Route::get('/','SiswaController@index')->name('index');
            Route::get('/create','SiswaController@create')->name('create');
            Route::post('/store','SiswaController@store')->name('store');
            Route::get('/data','SiswaController@data')->name('data');
            Route::get('/{id}','SiswaController@show')->name('show');
            Route::get('/{id}/edit','SiswaController@edit')->name('edit');
            Route::post('{id}/update','SiswaController@update')->name('update');
            Route::delete('/{id}/delete','SiswaController@destroy')->name('delete');
        });

        Route::get('/logout','AuthController@logout')->name('logout');
    });
});


Route::middleware(['auth:siswa'])->namespace('Siswa')->prefix('siswa')->name('siswa.')->group(function () {
    
    Route::get('/', 'DashboardController@index')->name('index');
    // Route::get('/profile', 'DashboardController@profile')->name('profile');
    // Route::put('/profile/{id}', 'DashboardController@update')->name('profile.update');


    Route::prefix('/profil')->name('profil.')->group(function () {
        Route::get('/','ProfilController@index')->name('index');
        Route::post('/','ProfilController@store');

        Route::get('/detail','ProfilController@detail')->name('detail');
        Route::post('/detail','ProfilController@detailStore');

        
        Route::get('/ortu','ProfilController@ortu')->name('ortu');
        Route::post('/ortu','ProfilController@ortuStore');
    });
    // Route::get('/ppdb', 'PPBDController@index')->name('index');
    // Route::store('/profile', 'PPBDController@update')->name('profile.update');

    // Route::get('/data-ortu', [SiswaLengkapController::class, 'ortu']);
    // Route::match(['post', 'put'],'/data-ortu/update/{id}', [SiswaLengkapController::class, 'update_ortu']);

    // Route::get('/data-tambahan', [SiswaLengkapController::class, 'tambahan']);
    // Route::match(['post', 'put'],'/data-tambahan/update/{id}', [SiswaLengkapController::class, 'update_tambahan']);

    // Route::get('/data-lengkap', [SiswaLengkapController::class, 'lengkap']);
    // Route::match(['post', 'put'],'/data-lengkap/update/{id}', [SiswaLengkapController::class, 'update_lengkap']);

    // Route::resource('nilais', SiswaNilaiController::class);

    
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

