<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\KuotaProdiController;
use App\Http\Controllers\MahasiswaKipController;
use App\Http\Controllers\BackEnd\JurusanController;
use App\Http\Controllers\FrontEnd\DaftarController;
use App\Http\Controllers\FrontEnd\BerandaController;
use App\Http\Controllers\BackEnd\CalonSiswaController;
use App\Http\Controllers\BackEnd\PengumumanController;
use App\Http\Controllers\DataSatuanPendidikanController;
use App\Http\Controllers\FrontEnd\SiswaTerimaController;
use App\Http\Controllers\FrontEnd\HasilPendaftaranController;
use App\Http\Controllers\BackEnd\SiswaTidakLolosBerkasController;
use App\Http\Controllers\FrontEnd\PengumumanPendaftaranController;

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
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
Route::resource('daftar-calon-siswa', DaftarController::class);
Route::resource('hasil-pendaftaran', HasilPendaftaranController::class);
Route::resource('pengumuman-pendaftaran', PengumumanPendaftaranController::class);
// Route::prefix('pengumuman-pendaftaran')->group(function () {
//     Route::get('/', [PengumumanPendaftaranController::class, 'index'])->name('pengumuman.index');
//     Route::get('/{uuid}', [PengumumanPendaftaranController::class, 'show'])->name('pengumuman.show');
// });
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('dataMahasiswa', MahasiswaKipController::class);
    Route::post('delete-mahasiswa', [MahasiswaKipController::class,'destroy']);

    Route::post('dataMahasiswa-import', [MahasiswaKipController::class, 'import'])->name('dataMahasiswa.import');
    Route::get('dataMahasiswa-export', [MahasiswaKipController::class, 'export'])->name('dataMahasiswa.export');

    // Route::resource('universitas', DataSatuanPendidikanController::class);
    Route::resource('dataSatuanPendidikan', DataSatuanPendidikanController::class);
    Route::post('delete-universitas', [DataSatuanPendidikanController::class,'destroy']);

    Route::resource('dataKuota', KuotaProdiController::class);
    Route::post('delete-kuotaProdi', [KuotaProdiController::class,'destroy']);

    Route::resource('dataAkun', DataAkunController::class);

    Route::resource('jurusan', JurusanController::class);
    Route::post('delete-jurusan', [JurusanController::class,'destroy']);

    Route::resource('calon-siswa', CalonSiswaController::class);
    Route::post('delete-calon-siswa', [CalonSiswaController::class,'destroy']);

    Route::resource('pengumuman', PengumumanController::class);
    Route::delete('/pengumuman/{uuid}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    Route::patch('/pengumuman/{uuid}/turunkan-tayang', [PengumumanController::class, 'turunkanTayang'])->name('pengumuman.turunkanTayang');
    Route::patch('/pengumuman/{uuid}/tayangkan-pengumuman', [PengumumanController::class, 'tayangkanPengumuman'])->name('pengumuman.tayangkanPengumuman');

    Route::get('calon-siswa-approve', [CalonSiswaController::class, 'CalonSiswaApprove'])->name('calon-siswa-approve');

    Route::delete('/calon-siswa/{uuid}/handle-spam', [CalonSiswaController::class, 'handleSpamData'])
    ->name('calon-siswa.handleSpam');

    Route::put('/calon-siswa/tolak-berkas/{uuid}', [CalonSiswaController::class, 'tolakBerkas'])
    ->name('calon-siswa.tolakBerkas');

    Route::put('/calon-siswa/unapprove/{uuid}', [CalonSiswaController::class, 'unapprove'])
    ->name('calon-siswa.unapprove');

    Route::get('siswa-tidak-lolos-dokumen', [SiswaTidakLolosBerkasController::class, 'index'])
    ->name('siswa-tidak-lolos-dokumen');

    Route::get('siswa-tidak-lolos-dokumen/{uuid}', [SiswaTidakLolosBerkasController::class, 'show'])->name('siswa-tidak-lolos.show');
});




