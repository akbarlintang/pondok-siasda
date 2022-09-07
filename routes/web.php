<?php

use App\Http\Controllers\SiswaControllers;
use App\Http\Controllers\HapalanControllers;
use App\Http\Controllers\SPPControllers;
use App\Http\Controllers\EvaluasiControllers;
use App\Http\Controllers\EkstraSiswaControllers;
use App\Http\Controllers\PresensiEkstraControllers;
use App\Http\Controllers\GuruControllers;
use App\Http\Controllers\PenilaianControllers;
use App\Http\Controllers\MataPelajaranControllers;
use App\Http\Controllers\PresensiKbmControllers;
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
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/siswas/index', 'App\Http\Controllers\SiswaControllers@index2')->name('siswas.index2');
    Route::post('/siswas/add', 'App\Http\Controllers\SiswaControllers@add')->name('siswas.add');
    Route::get('/siswas/hapus/{id}', 'App\Http\Controllers\SiswaControllers@hapus')->name('siswas.hapus');
    Route::post('/presensiekstras/updateAll', 'App\Http\Controllers\PresensiEkstraControllers@updateAll')->name('presensiekstras.updateAll');
    Route::resource('siswas',SiswaControllers::class);
    Route::resource('hapalans',HapalanControllers::class);
    Route::resource('spps',SPPControllers::class);
    Route::resource('evaluasis',EvaluasiControllers::class);
    Route::resource('ekstrasiswas',EkstraSiswaControllers::class);
    Route::get('ekstrasiswas/ubah/{id}', 'App\Http\Controllers\EkstraSiswaControllers@ubah')->name('ekstrasiswas.ubah');
    Route::resource('presensiekstras',PresensiEkstraControllers::class);

    Route::resource('gurus',GuruControllers::class);
    Route::get('gurus/delete/{id}', 'App\Http\Controllers\GuruControllers@delete')->name('gurus.delete');

    Route::resource('mapels',MataPelajaranControllers::class);

    Route::resource('penilaians',PenilaianControllers::class);
    Route::get('penilaians/list/{id}/{semester}', 'App\Http\Controllers\PenilaianControllers@list')->name('penilaians.list');
    Route::get('penilaians/buat/{id}/{semester}', 'App\Http\Controllers\PenilaianControllers@buat')->name('penilaians.buat');
    Route::post('penilaians/tambah/{id}/{semester}', 'App\Http\Controllers\PenilaianControllers@tambah')->name('penilaians.tambah');
    Route::get('penilaians/ubah/{id}/{semester}', 'App\Http\Controllers\PenilaianControllers@ubah')->name('penilaians.ubah');
    Route::patch('penilaians/simpan/{id}/{semester}', 'App\Http\Controllers\PenilaianControllers@simpan')->name('penilaians.simpan');

    Route::resource('presensikbms',PresensiKbmControllers::class);
    Route::get('presensikbms/list/guru', 'App\Http\Controllers\PresensiKbmControllers@list')->name('presensikbms.list');
    Route::get('presensikbms/list/guru/{id}', 'App\Http\Controllers\PresensiKbmControllers@listGuru')->name('presensikbms.list-guru');
    Route::get('presensikbms/list/semester/{jenjang}-{tingkat}{kelas}/{mapel}/{guru}', 'App\Http\Controllers\PresensiKbmControllers@semester')->name('presensikbms.semester');
    Route::get('presensikbms/list/tanggal/{jenjang}-{tingkat}{kelas}/{mapel}/{semester}/{guru}', 'App\Http\Controllers\PresensiKbmControllers@tanggal')->name('presensikbms.tanggal');
    Route::get('presensikbms/buat/tanggal/{jenjang}-{tingkat}{kelas}/{mapel}/{semester}/{guru}', 'App\Http\Controllers\PresensiKbmControllers@buat')->name('presensikbms.buat');
    Route::post('presensikbms/buat/tanggal', 'App\Http\Controllers\PresensiKbmControllers@tambah')->name('presensikbms.tambah');
    Route::get('presensikbms/input/tanggal/{jenjang}-{tingkat}{kelas}/{mapel}/{semester}/{guru}/{tanggal}', 'App\Http\Controllers\PresensiKbmControllers@input')->name('presensikbms.input');
    Route::post('presensikbms/updateAll', 'App\Http\Controllers\PresensiKbmControllers@updateAll')->name('presensikbms.update-all');

    Route::get('rekap-kbm/{id}', 'App\Http\Controllers\RekapKbmControllers@index')->name('rekap-kbm.index');
    Route::get('rekap-kbm/{semester}/{tingkat}', 'App\Http\Controllers\RekapKbmControllers@show')->name('rekap-kbm.show');
    Route::get('rekap-kbm/{semester}/{tingkat}/{mapel}', 'App\Http\Controllers\RekapKbmControllers@rekap')->name('rekap-kbm.rekap');

    Route::get('rekap-ekstra/show/{id}', 'App\Http\Controllers\RekapEkstraControllers@show')->name('rekap-ekstra.show');

    Route::get('rekap-nilai/index/{id}', 'App\Http\Controllers\RekapNilaiControllers@index')->name('rekap-nilai.index');
    Route::get('rekap-nilai/show/{id}/{semester}/{tingkat}', 'App\Http\Controllers\RekapNilaiControllers@show')->name('rekap-nilai.show');

    Route::get('/permissions/user-roles', 'App\Http\Controllers\UserRolesControllers@index')->name('user-roles.index');
    Route::post('/permissions/user-roles', 'App\Http\Controllers\UserRolesControllers@store')->name('user-roles.store');
    Route::get('/permissions/get/{id}', 'App\Http\Controllers\UserRolesControllers@get')->name('user-roles.get');

    Route::get('pengumuman', 'App\Http\Controllers\PengumumanControllers@index')->name('pengumuman.index');
    Route::get('pengumuman/create', 'App\Http\Controllers\PengumumanControllers@create')->name('pengumuman.create');
    Route::post('pengumuman/store', 'App\Http\Controllers\PengumumanControllers@store')->name('pengumuman.store');
    Route::get('pengumuman/download/{file}', 'App\Http\Controllers\PengumumanControllers@download')->name('pengumuman.download');

    Route::get('kotak-saran', 'App\Http\Controllers\KotakSaranControllers@index')->name('kotak-saran.index');
    Route::get('kotak-saran/create', 'App\Http\Controllers\KotakSaranControllers@create')->name('kotak-saran.create');
    Route::post('kotak-saran/store', 'App\Http\Controllers\KotakSaranControllers@store')->name('kotak-saran.store');
    Route::get('kotak-saran/balas/{id}', 'App\Http\Controllers\KotakSaranControllers@balas')->name('kotak-saran.balas');
    Route::post('kotak-saran/kirim', 'App\Http\Controllers\KotakSaranControllers@kirim')->name('kotak-saran.kirim');

    Route::get('/siswa/cetak/{id}', 'App\Http\Controllers\SiswaControllers@cetak')->name('siswa.cetak');
});

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

