<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilatController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\SertifikatController;

Route::get('/', function () {
    // return view('auth.login');
	return view('landingpage');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Backend Route
Route::group(['middleware' => 'auth'], function () {


	Route::group(['prefix' => 'q','middleware' => 'role:admin,instruktur'], function () {

		Route::get('/dash', [DashboardController::class, 'index'])->name('dash.index');
		Route::get('/profil', [DashboardController::class, 'profil'])->name('dash.profil');

		Route::post('/user/{user}/update', [UserController::class,'@update'])->name('user.update');

	});

	Route::group(['prefix' => 'q','middleware' => 'role:admin'], function () {

		Route::resource('/program', ProgramController::class);
		Route::resource('/materi', MateriController::class);

		Route::get('/user', [UserController::class,'index'])->name('user.index');
		Route::get('/user/create', [UserController::class,'create'])->name('user.create');
		Route::post('/user/store', [UserController::class,'store'])->name('user.store');
		Route::get('/user/{user}',[UserController::class,'show'] )->name('user.show');
		Route::get('/user/{user}/edit',[UserController::class,'edit'])->name('user.edit');
		Route::delete('/user/{user}',[UserController::class,'destroy'])->name('user.delete');

		Route::get('/instruktur/create', [InstrukturController::class,'create'])->name('instruktur.create');
		Route::get('/instruktur/{instruktur}/edit', [InstrukturController::class,'edit'])->name('instruktur.edit');
		Route::post('/instruktur/{instruktur}/update',[InstrukturController::class,'update'] )->name('instruktur.update');
		Route::post('/instruktur/store', [InstrukturController::class,'store'])->name('instruktur.store');

		Route::get('/peserta',[PesertaController::class,'index'] )->name('peserta.index');
		Route::get('/peserta/create',[PesertaController::class,'create'] )->name('peserta.create');
		Route::post('/peserta/store',[PesertaController::class,'store'])->name('peserta.store');
		Route::get('/peserta/{peserta}/edit',[PesertaController::class,'edit'] )->name('peserta.edit');
		Route::post('/peserta/{peserta}/update',[PesertaController::class,'update'] )->name('peserta.update');
		Route::delete('/peserta/{peserta}', [PesertaController::class,'destroy'] )->name('peserta.delete');
		Route::get('/peserta/{peserta}', [PesertaController::class,'show'])->name('peserta.show');

		Route::get('/kursus', [KursusController::class,'index'])->name('kursus.index');
		Route::get('/kursus/{peserta}/create', [KursusController::class,'create'])->name('kursus.create');
		Route::post('/kursus/store', [KursusController::class,'store'] )->name('kursus.store');
		Route::get('/kursus/{kursus}/edit', [KursusController::class,'edit'] )->name('kursus.edit');
		Route::post('/kursus/{kursus}/update', [KursusController::class,'update'] )->name('kursus.update');
		Route::delete('/kursus/{kursus}', [KursusController::class,'destroy'])->name('kursus.delete');

		Route::get('/absensi', [AbsensiController::class,'index'])->name('absensi.index');
		Route::get('/absensi/{kursus}/create', [AbsensiController::class,'create'])->name('absensi.create');
		Route::get('/absensi/{kursus}/show',[AbsensiController::class,'show'] )->name('absensi.show');
		Route::post('/absensi/store',[AbsensiController::class,'store'] )->name('absensi.store');
		Route::post('/absensi/{absensi}/update', [AbsensiController::class,'update'])->name('absensi.update');
		Route::get('/absensi/{absensi}/edit',[AbsensiController::class,'edit'] )->name('absensi.edit');
		Route::delete('/absensi/{absensi}',[AbsensiController::class,'destroy'] )->name('absensi.delete');

		Route::get('/sertifikat', [SertifikatController::class,'index'])->name('sertifikat.index');
		Route::get('/sertifikat/create', [SertifikatController::class,'create'])->name('sertifikat.create');
		Route::get('/sertifikat/{sertifikat}/show',[SertifikatController::class,'show'] )->name('sertifikat.show');
		Route::post('/sertifikat/store', [SertifikatController::class,'store'] )->name('sertifikat.store');
		Route::delete('/sertifikat/{sertifikat}',[SertifikatController::class,'destroy'] )->name('sertifikat.delete');

		Route::get('/laporan/instruktur', [LaporanController::class,'instruktur'])->name('laporan.instruktur');
		Route::post('/laporan/instruktur/export',[LaporanController::class,'exInstruktur'] )->name('laporan.exins');
		Route::get('/laporan/peserta', [LaporanController::class,'peserta'])->name('laporan.peserta');
		Route::post('/laporan/peserta/export', [LaporanController::class,'exPeserta'])->name('laporan.exper');


	});



	Route::group(['prefix' => 'q','middleware' => 'role:instruktur'], function () {

		Route::get('/nilai/teori', [NilatController::class,'index'])->name('nilat.index');
		Route::get('/nilai/teori/{kursus}/create',[NilatController::class,'create'] )->name('nilat.create');
		Route::post('/nilai/teori/{kursus}/update', [NilatController::class,'update'])->name('nilat.update');

		Route::get('/nilai/praktik', [NilaiController::class,'index'])->name('nilai.index');
		Route::get('/nilai/praktik/{kursus}/create',[NilaiController::class,'create'] )->name('nilai.create');
		Route::post('/nilai/praktik/{nilai}/update', [NilaiController::class,'update'] )->name('nilai.update');

	});

	Route::group(['middleware' => 'role:peserta'], function () {

		Route::get('/home', [HomeController::class, 'index'])->name('home');
		Route::get('/datadiri', [HomeController::class, 'profil'])->name('profil');
		Route::get('/kursus', [HomeController::class,'kursus'])->name('kursus');
		Route::get('/kursus/{sertifikat}',[HomeController::class,'sertifikat'])->name('sertifikat');

	});

});


