<?php

use App\Http\Controllers\SiswaControllers;
use App\Http\Controllers\HapalanControllers;
use App\Http\Controllers\SPPControllers;
use App\Http\Controllers\EvaluasiControllers;
use App\Http\Controllers\EkstraSiswaControllers;
use Illuminate\Support\Facades\Route;

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



/*
|--------------------------------------------------------------------------
| Route Sikeswan
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('siswas',SiswaControllers::class);
Route::resource('hapalans',HapalanControllers::class);
Route::resource('spps',SPPControllers::class);
Route::resource('evaluasis',EvaluasiControllers::class);
Route::resource('ekstrasiswas',EkstraSiswaControllers::class);

Route::get('/profil', function () {
    return view('berita');
});

// Route::get('/berita', function () {
//     return view('tes');
// });

// Route::get('/detail', function () {
//     return view('detail');
// });

// Route::get('/layanan1', 'App\Http\Controllers\GuestController@index')->name('layanan1');
// Route::get('/layanan2', 'App\Http\Controllers\GuestController@index2')->name('layanan2');
// Route::get('/profil', 'App\Http\Controllers\GuestController@profil')->name('profil');

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/faq', function () {
//     return view('faq');
// });

// Route::get('/daftar',function(){
//     return view('daftar');
// })->name('daftar');

// Route::get('/daftarAktif', 'App\Http\Controllers\GuestController@show')->name('daftarAktif');


// Route::get('/daftars/showall', 'App\Http\Controllers\DaftarController@lihatsemua')->name('daftars.showall');
// Route::resource('daftars', DaftarController::class);
// Route::get('daftars/destroy/{daftar}', 'App\Http\Controllers\DaftarController@destroy');
// Route::get('/kuotas/showall', 'App\Http\Controllers\KuotaController@lihatsemua')->name('kuotas.showall');
// Route::resource('kuotas', KuotaController::class);
// Route::resource('obats', ObatController::class);
// Route::resource('golongans', GolonganController::class);
// Route::post('/obats/index', 'App\Http\Controllers\GolonganController@store')->name('store');
// Route::get('/golongandelete/{id_golongan}', 'App\Http\Controllers\GolonganController@destroy');
// Route::resource('rekamaktifs', RekamAktifController::class);
// Route::resource('rekampasifs', RekamPasifController::class);
// Route::get('rekampasifs/destroy/{rekampasif}', 'App\Http\Controllers\RekamPasifController@destroy');
// Route::resource('tenagamediks', TenagaMedikController::class);
// Route::get('tenagamediks/destroy/{tenagamedik}', 'App\Http\Controllers\TenagaMedikController@destroy');
// Route::resource('diagnosasementaras', DiagnosaSementaraController::class);
// Route::get('diagnosasementaras/destroy/{diagnosasementara}', 'App\Http\Controllers\DiagnosaSementaraController@destroy');
// Route::resource('penunjangs', PenunjangController::class);
// Route::resource('tambahans', TerapiTambahanController::class);
// Route::resource('listpenunjangs', ListPenunjangController::class);
// Route::get('getKelurahan','App\Http\Controllers\GuestController@getKelurahan')->name('getKelurahan');
// Route::get('/daftaraktifs/showall', 'App\Http\Controllers\DaftarAktifController@lihatsemua')->name('daftaraktifs.showall');
// Route::resource('daftaraktifs', DaftarAktifController::class);

