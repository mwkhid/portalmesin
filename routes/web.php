<?php

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

// Example Routes
// Route::view('/', 'landing');
// Route::match(['get', 'post'], '/dashboard', function(){
//     return view('dashboard');
// });
// Route::view('/pages/slick', 'pages.slick');
// Route::view('/pages/datatables', 'pages.datatables');
// Route::view('/pages/blank', 'pages.blank');
Route::get('/','DashController@dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password', 'HomeController@password')->name('password');
Route::post('/password/{id}', 'HomeController@passstore')->name('password.store');
Route::resource('/profil','ProfilController');
//Route Role Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::get('/users/import','UsersController@importuser')->name('importuser');
    Route::post('/users/import','UsersController@importuserstore')->name('importuserstore');
    Route::get('/users/download','UsersController@download')->name('downloaduser');
    Route::resource('/users','UsersController');
    //Route Admin
    Route::resource('/akademik','AkademikController',['except' => ['create','store']]);
    //Route Admin Dosen
    Route::resource('/dosen','DosenController');
    //Route Admin Mahasiswa
    Route::get('/mahasiswa/import','MahasiswaController@importview')->name('importmhs');
    Route::post('/mahasiswa/import','MahasiswaController@importstore')->name('importmhsstore');
    Route::get('/mahasiswa/download','MahasiswaController@download')->name('downloadmhs');
    Route::resource('/mahasiswa','MahasiswaController');
    //Route Admin Mata Kuliah
    Route::resource('/matkul','MatkulController');
    //Route Admin Peminatan
    Route::resource('/peminatan','PeminatanController');
    //Route Admin Ruang
    Route::resource('/ruang','RuangController');
    //Route Admin Jabatan
    Route::resource('/jabatan','JabatanController');
});

//Route Role Mahasiswa
Route::name('kp.')->middleware('can:mahasiswa')->group(function(){
    //Route Kerja Pratek
    Route::get('kp/pendaftaran/cetak_form','KpController@cetak_form')->name('cetak.konsul');
    Route::get('kp/pelaksanaan/cetak_form_nilai','KpController@cetak_form_nilai')->name('cetak.formnilai');
    Route::get('kp/pelaksanaan/cetak_lmbr_tugas','KpController@cetak_lmbr_tugas')->name('cetak.lmbrtugas');
    Route::get('kp/pendaftaran/{file}/download', 'KpController@viewFile')->name('pendaftaran.download');
    Route::post('kp/upload/{id}', 'KpController@StoreUpload')->name('pendaftaran.upload');
    Route::resource('kp/pendaftaran','KpController',['except' => ['create','show']]);
    //Route Selesai Kp
    Route::resource('kp/selesaikp', 'SelesaikpController',['only' => ['index','update']]);

    //Route Seminar Kerja Praktek
    Route::get('kp/seminar/cetak_pengajuansemkp','SemkpController@cetak_pengajuansemkp')->name('cetak.pengajuansemkp');
    Route::get('kp/seminar/cetak_daftarhadir','SemkpController@cetak_daftarhadir')->name('cetak.daftarhadir');
    Route::resource('kp/seminar','SemkpController',['except' => ['create','show']]);
    Route::resource('kp/laporan','LaporankpController',['only' => ['index','show','update']]);
});

Route::name('ta.')->middleware('can:mahasiswa')->group(function(){
    //Route Tugas Akhir
    Route::get('ta/pendaftaran/cetak_pendaftaran','TaController@cetak_pendaftaran')->name('cetak_pendaftaran');
    Route::resource('ta/pendaftaran','TaController',['only' => ['index', 'store', 'edit','update']]);
    Route::resource('ta/logbook','LogbooktaController');
    //Route Seminar Hasil TA
    Route::resource('ta/semhas','SemhasController',['only' => ['index', 'store', 'edit','update']]);
    //Route Pendadaran
    Route::resource('ta/pendadaran','PendadaranController',['only' => ['index', 'store', 'edit','update']]);
});

//Route Role Koordinator KP
Route::namespace('Admin')->prefix('koordinator')->name('admin.')->middleware('can:koordinatorkp')->group(function(){
    //Kerja Praktek
    Route::resource('/kp/pembimbing','Kp\PembimbingkpController',['except' => ['create','store']]);
    Route::resource('/kp/pengajuan','Kp\PengajuanController',['except' => ['create','store']]);
    Route::resource('/kp/permohonan','Kp\PermohonanController',['only' => ['index','show']]);
    Route::resource('/kp/balasan','Kp\BalasanController',['except' => ['create','store']]);
    Route::resource('/kp/penugasan','Kp\PenugasanController',['except' => ['create','store']]);
    Route::resource('/kp/selesaikp','Kp\SelesaikpController',['only' => ['index','show','edit']]);

    //Seminar KP
    Route::resource('/kp/listsemkp','Seminarkp\ListController',['only' => ['index','show']]);
    Route::resource('/kp/seminarkp','Seminarkp\SeminarkpController',['only' => ['index','edit','update','show']]);
    Route::resource('/kp/presensi','Seminarkp\PresensiController',['only' => ['index','show']]);
    Route::get('/kp/nilai/{id}','Seminarkp\LaporanController@nilai')->name('laporan.nilai');
    Route::resource('/kp/laporan','Seminarkp\LaporanController',['only' => ['index','show','edit','update']]);
    Route::resource('/kp/nilaikp','Seminarkp\NilaikpController',['only' => ['index','show']]);

});

//Route Role Koordinator TA
Route::namespace('Admin')->prefix('koordinator')->name('admin.')->middleware('can:koordinatorta')->group(function(){
    //Tugas Akhir
    Route::get('/ta/listta','Ta\PendaftaranController@listta')->name('listta');
    Route::resource('/ta/pendaftaran','Ta\PendaftaranController',['except' => ['create','store','show']]);
    Route::resource('/ta/surattugas','Ta\SurattugasController',['except' => ['create','store']]);

    //Seminar Hasil Tugas Akhir
    Route::resource('/ta/semhas','Semhas\SemhasController',['except' => ['create','store']]);
    Route::resource('/ta/listsemhas','Semhas\ListController',['except' => ['create','store']]);

    //Seminar Hasil Tugas Akhir
    Route::resource('/ta/pendadaran','Pendadaran\PendadaranController',['except' => ['create','store']]);
    Route::resource('/ta/listpendadaran','Pendadaran\ListController',['except' => ['create','store']]);

});

//Route Role Dosen
Route::namespace('Dosen')->prefix('dosen')->name('dosen.')->middleware('can:dosen')->group(function(){
    //Akademik
    Route::resource('/akademik','AkademikController',['only' => ['index']]);

    //Kerja Praktek
    Route::resource('/kp','KpController',['only' => ['index']]);

    //Tugas Akhir
    Route::resource('/ta','TaController',['only' => ['index','edit','update','show']]);

    //Seminar Hasil Tugas Akhir
    Route::resource('/semhas','SemhasController',['only' => ['index','edit','update','show']]);

    //Seminar Hasil Tugas Akhir
    Route::resource('/pendadaran','PendadaranController',['only' => ['index','edit','update','show']]);

    //Tawaran Topik Ta
    Route::resource('/tawaran','TawaranController');

});

//Route Koordinator KBK Sel
Route::namespace('Admin')->name('admin.')->middleware('can:koordinatorsel')->group(function(){
    //Tugas Akhir
    Route::resource('sel','Sel\SelController',['except' => ['create','store']]);

});

//Route Koordinator KBK Meka
Route::namespace('Admin')->name('admin.')->middleware('can:koordinatorsm')->group(function(){
    //Tugas Akhir
    Route::resource('meka','Meka\MekaController',['except' => ['create','store']]);

});

//Route Koordinator KBK ICT
Route::namespace('Admin')->name('admin.')->middleware('can:koordinatorict')->group(function(){
    //Tugas Akhir
    Route::resource('ict','Ict\IctController',['except' => ['create','store']]);

});

//Route Operator TA
Route::namespace('Admin')->name('opta.')->middleware('can:operatorta')->group(function(){
    //Tugas Akhir
    Route::resource('opta/ta','Opta\TaController',['except' => ['create','store']]);
    //Seminar Hasil Tugas Akhir
    Route::resource('opta/semhas','Opta\SemhasController',['except' => ['create','store']]);
    //Pendadaran Tugas Akhir
    Route::resource('opta/pendadaran','Opta\PendadaranController',['except' => ['create','store']]);

});
