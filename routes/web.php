<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendahuluanController;
use App\Http\Controllers\JobSheetController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\BacaJobSheetController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Helpers\DateHelpers;

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

Route::get('/buat_storage', function () {
    Artisan::call('storage:link');
    dd("Storage Berhasil Di Buat");
});

Route::get('/petunjuk_penggunaan', function () {
    return view('admin.pengaturan.petunjuk_penggunaan');
});

Route::get('/tata_tertib', function () {
    return view('admin.pengaturan.tata_tertib');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [HomeController::class, 'index']);

## Pegawai
Route::get('/metode_pelaksanaan', [MetodePelaksanaanController::class, 'index']);
Route::get('/metode_pelaksanaan/search', [MetodePelaksanaanController::class, 'search']);
Route::get('/metode_pelaksanaan/create', [MetodePelaksanaanController::class, 'create']);
Route::post('/metode_pelaksanaan', [MetodePelaksanaanController::class, 'store']);
Route::get('/metode_pelaksanaan/edit/{metode_pelaksanaan}', [MetodePelaksanaanController::class, 'edit']);
Route::put('/metode_pelaksanaan/edit/{metode_pelaksanaan}', [MetodePelaksanaanController::class, 'update']);
Route::get('/metode_pelaksanaan/hapus/{metode_pelaksanaan}',[MetodePelaksanaanController::class, 'delete']);

## Pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'index']);
Route::get('/pengaturan/search', [PengaturanController::class, 'search']);
Route::get('/pengaturan/edit/{pengaturan}', [PengaturanController::class, 'edit']);
Route::put('/pengaturan/edit/{pengaturan}', [PengaturanController::class, 'update']);

## Pendahuluan
Route::get('/pendahuluan', [PendahuluanController::class, 'index']);
Route::get('/pendahuluan/edit/{pendahuluan}', [PendahuluanController::class, 'edit']);
Route::put('/pendahuluan/edit/{pendahuluan}', [PendahuluanController::class, 'update']);
Route::get('/pendahuluan/detail/{pendahuluan}', [PendahuluanController::class, 'detail']);

## Job Sheet
Route::get('/job_sheet', [JobSheetController::class, 'index']);
Route::get('/job_sheet/search', [JobSheetController::class, 'search']);
Route::get('/job_sheet/create', [JobSheetController::class, 'create']);
Route::post('/job_sheet', [JobSheetController::class, 'store']);
Route::get('/job_sheet/edit/{job_sheet}', [JobSheetController::class, 'edit']);
Route::put('/job_sheet/edit/{job_sheet}', [JobSheetController::class, 'update']);
Route::get('/job_sheet/hapus/{job_sheet}',[JobSheetController::class, 'delete']);

Route::get('/lihat_job_sheet', [JobSheetController::class, 'index']);
Route::get('/lihat_job_sheet/search', [JobSheetController::class, 'search']);

## Modul
Route::get('/modul/{job_sheet}', [ModulController::class, 'index']);
Route::get('/modul/search/{job_sheet}', [ModulController::class, 'search']);
Route::get('/modul/create/{job_sheet}', [ModulController::class, 'create']);
Route::post('/modul/{job_sheet}', [ModulController::class, 'store']);
Route::get('/modul/edit/{job_sheet}/{modul}', [ModulController::class, 'edit']);
Route::put('/modul/edit/{job_sheet}/{modul}', [ModulController::class, 'update']);
Route::get('/modul/detail/{job_sheet}/{modul}', [ModulController::class, 'detail']);
Route::get('/modul/hapus/{job_sheet}/{modul}',[ModulController::class, 'delete']);
Route::get('/get_modul/{job_sheet}',[ModulController::class, 'get_modul']);

## Baca Job Sheet
Route::get('/baca_job_sheet/{modul}', [BacaJobSheetController::class, 'store']);

## Kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/search', [KelasController::class, 'search']);
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::get('/kelas/edit/{kelas}', [KelasController::class, 'edit']);
Route::put('/kelas/edit/{kelas}', [KelasController::class, 'update']);
Route::get('/kelas/hapus/{kelas}',[KelasController::class, 'delete']);

## Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/search', [MahasiswaController::class, 'search']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/edit/{mahasiswa}', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/edit/{mahasiswa}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/hapus/{mahasiswa}',[MahasiswaController::class, 'delete']);

Route::get('/lihat_mahasiswa/{kelas}', [MahasiswaController::class, 'lihat_mahasiswa']);
Route::get('/lihat_mahasiswa/{kelas}/search', [MahasiswaController::class, 'lihat_mahasiswa_search']);
Route::get('/lihat_job_sheet/{mahasiswa}', [MahasiswaController::class, 'lihat_job_sheet']);
Route::get('/lihat_job_sheet/{mahasiswa}/search', [MahasiswaController::class, 'lihat_job_sheet_search']);

## Kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index']);
Route::get('/kecamatan/search', [KecamatanController::class, 'search']);
Route::get('/kecamatan/create', [KecamatanController::class, 'create']);
Route::post('/kecamatan', [KecamatanController::class, 'store']);
Route::get('/kecamatan/edit/{kecamatan}', [KecamatanController::class, 'edit']);
Route::put('/kecamatan/edit/{kecamatan}', [KecamatanController::class, 'update']);
Route::get('/kecamatan/hapus/{kecamatan}',[KecamatanController::class, 'delete']);

## Desa
Route::get('/desa/{kecamatan}', [DesaController::class, 'index']);
Route::get('/desa/search/{kecamatan}', [DesaController::class, 'search']);
Route::get('/desa/create/{kecamatan}', [DesaController::class, 'create']);
Route::post('/desa/{kecamatan}', [DesaController::class, 'store']);
Route::get('/desa/edit/{kecamatan}/{desa}', [DesaController::class, 'edit']);
Route::put('/desa/edit/{kecamatan}/{desa}', [DesaController::class, 'update']);
Route::get('/desa/hapus/{kecamatan}/{desa}',[DesaController::class, 'delete']);
Route::get('/get_desa/{kecamatan}',[DesaController::class, 'get_desa']);

## Kegiatan
Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::get('/kegiatan/search', [KegiatanController::class, 'search']);
Route::get('/kegiatan/create', [KegiatanController::class, 'create']);
Route::post('/kegiatan', [KegiatanController::class, 'store']);
Route::get('/kegiatan/edit/{kegiatan}', [KegiatanController::class, 'edit']);
Route::put('/kegiatan/edit/{kegiatan}', [KegiatanController::class, 'update']);
Route::get('/kegiatan/hapus/{kegiatan}',[KegiatanController::class, 'delete']);

## Video
Route::get('/video', [VideoController::class, 'index']);
Route::get('/video/search', [VideoController::class, 'search']);
Route::get('/video/create', [VideoController::class, 'create']);
Route::post('/video', [VideoController::class, 'store']);
Route::get('/video/edit/{video}', [VideoController::class, 'edit']);
Route::put('/video/edit/{video}', [VideoController::class, 'update']);
Route::get('/video/hapus/{video}',[VideoController::class, 'delete']);

## Post Test
Route::get('/post_test', [PostTestController::class, 'index']);
Route::get('/post_test/search', [PostTestController::class, 'search']);
Route::get('/post_test/create', [PostTestController::class, 'create']);
Route::post('/post_test', [PostTestController::class, 'store']);
Route::get('/post_test/edit/{post_test}', [PostTestController::class, 'edit']);
Route::put('/post_test/edit/{post_test}', [PostTestController::class, 'update']);
Route::get('/post_test/hapus/{post_test}',[PostTestController::class, 'delete']);

## User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/search', [UserController::class, 'search']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/edit/{user}', [UserController::class, 'edit']);
Route::put('/user/edit/{user}', [UserController::class, 'update']);
Route::get('/user/hapus/{user}',[UserController::class, 'delete']);

## Password
Route::group(['middleware' => 'auth'], function () {
    Route::get('password', [PasswordController::class, 'edit'])
        ->name('user.password.edit');
     Route::patch('password', [PasswordController::class, 'update'])
        ->name('user.password.update');
});
