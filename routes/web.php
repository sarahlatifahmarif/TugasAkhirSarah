<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JurusanSekolahController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\TabelPilihanController;
use App\Http\Controllers\MetodaController;
Use App\Http\Controllers\ResultController;
Use App\Http\Controllers\PertanyaanController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('jurusan/create', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('jurusan/update/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::patch('jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('jurusan/delete/{id}', [JurusanController::class, 'delete'])->name('jurusan.delete');

    Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('kriteria/create', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('kriteria/update/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::patch('kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('kriteria/delete/{id}', [KriteriaController::class, 'delete'])->name('kriteria.delete');

    Route::get('jurusansekolah', [JurusanSekolahController::class, 'index'])->name('jurusansekolah.index');
    Route::get('jurusansekolah/create', [JurusanSekolahController::class, 'create'])->name('jurusansekolah.create');
    Route::post('jurusansekolah/create', [JurusanSekolahController::class, 'store'])->name('jurusansekolah.store');
    Route::get('jurusansekolah/update/{id}', [JurusanSekolahController::class, 'edit'])->name('jurusansekolah.edit');
    Route::patch('jurusansekolah/update/{id}', [JurusanSekolahController::class, 'update'])->name('jurusansekolah.update');
    Route::delete('jurusansekolah/delete/{id}', [JurusanSekolahController::class, 'delete'])->name('jurusansekolah.delete');

    Route::get('jurusansekolah/prodi/{id}', [TabelPilihanController::class, 'create'])->name('jurusansekolah.add.prodi');
    Route::post('jurusansekolah/prodi/{id}', [TabelPilihanController::class, 'store'])->name('jurusansekolah.store.prodi');

    Route::get('prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::get('prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
    Route::post('prodi/create', [ProdiController::class, 'store'])->name('prodi.store');
    Route::get('prodi/update/{id}', [ProdiController::class, 'edit'])->name('prodi.edit');
    Route::patch('prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('prodi/delete/{id}', [ProdiController::class, 'delete'])->name('prodi.delete');

});

Route::get('', [ResultController::class, 'index'])->name('index');
Route::post('', [ResultController::class, 'store']);
Route::get('select', [ResultController::class, 'select'])->name('select');
Route::post('select', [ResultController::class, 'storeSelect']);
Route::get('criteria', [ResultController::class, 'criteria'])->name('criteria');
Route::post('criteria', [ResultController::class, 'storeCriteria']);
Route::get('result', [ResultController::class, 'result'])->name('result');



Route::get('Pertanyaan', [PertanyaanController::class, 'index'])->name('Pertanyaan.index');
Route::get('Pertanyaan/create', [PertanyaanController::class, 'create'])->name('Pertanyaan.create');
Route::post('Pertanyaan/create', [PertanyaanController::class, 'store'])->name('Pertanyaan.store');
Route::get('Pertanyaan/update/{id}', [PertanyaanController::class, 'edit'])->name('Pertanyaan.edit');
Route::patch('Pertanyaan/update/{id}', [PertanyaanController::class, 'update'])->name('Pertanyaan.update');
Route::delete('Pertanyaan/delete/{id}', [PertanyaanController::class, 'delete'])->name('Pertanyaan.delete');
