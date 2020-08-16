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
Route::resource('/usermanual','UsermanualController');
Route::resource('/signature','SignatureController');
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
    Route::get('kp/seminar/cetak_nilaipembimbing','SemkpController@cetak_nilai_pembimbing')->name('cetak.nilaipembimbing');
    Route::resource('kp/seminar','SemkpController',['except' => ['create','show']]);
    Route::resource('kp/laporan','LaporankpController',['only' => ['index','show','update']]);
});

Route::name('ta.')->middleware('can:mahasiswa')->group(function(){
    //Route Tugas Akhir
    Route::get('ta/pendaftaran/cetak_pendaftaran','TaController@cetak_pendaftaran')->name('cetak_pendaftaran');
    Route::resource('ta/pengajuan/pendaftaran','TaController',['only' => ['index', 'store', 'edit','update']]);
    Route::resource('ta/logbook','LogbooktaController');
    //Route Seminar Hasil TA
    Route::resource('ta/semhas','SemhasController',['only' => ['index', 'store', 'edit','update']]);
    //Route Pendadaran
    Route::resource('ta/pendadaran','PendadaranController',['only' => ['index', 'store', 'edit','update']]);
    //Route Kelengkapan Wisuda
    Route::resource('ta/wisuda','TadraftController',['only' => ['index', 'store', 'edit','update']]);
    Route::get('ta/wisuda/bebaslab/{id}','TadraftController@bebaslab')->name('bebaslab');
    Route::get('ta/wisuda/halpengesahan/{id}','TadraftController@halpengesahan')->name('halpengesahan');
    //Route Biodata Alumni
    Route::resource('ta/wisuda/alumni','BiodataalumniController');
    //Route Biodata Alumni
    Route::resource('ta/wisuda/exitsurvey','ExitsurveyController');
    //Route Perubahan Judul
    Route::resource('ta/pengajuan/judul','TajudulController');
    //Route Perubahan Pembimbing
    Route::resource('ta/pengajuan/pembimbing','TapembimbingController');
    //Route Perpanjangan TA
    Route::resource('ta/pengajuan/perpanjangan','TaperpanjanganController');
    //Route Perpanjangan TA
    Route::resource('ta/pengajuan/pembatalan','TapembatalanController');
});

//Route Role Koordinator KP
Route::namespace('Admin')->prefix('koordinator')->name('admin.')->middleware('can:koordinatorkp')->group(function(){
    //Kerja Praktek
    Route::resource('/kp/pembimbing','Kp\PembimbingkpController',['except' => ['create','store']]);
    Route::resource('/kp/pengajuan','Kp\PengajuanController',['except' => ['create','store']]);
    Route::resource('/kp/permohonan','Kp\PermohonanController',['only' => ['index','show']]);
    Route::get('/kp/lihatproposal/{id}','Kp\PermohonanController@proposal')->name('permohonan.proposal');
    Route::resource('/kp/balasan','Kp\BalasanController',['except' => ['create','store']]);
    Route::get('/kp/lihatpermohonan/{id}','Kp\BalasanController@lihatpermohonan')->name('balasan.permohonan');
    Route::get('/kp/lihatpenugasan/{id}','Kp\BalasanController@lihatpenugasan')->name('balasan.penugasan');
    Route::resource('/kp/penugasan','Kp\PenugasanController',['except' => ['create','store']]);
    Route::resource('/kp/selesaikp','Kp\SelesaikpController',['only' => ['index','show','edit']]);
    Route::get('/kp/lihatsurattugas/{id}','Kp\SelesaikpController@lihatsurattugas')->name('selesaikp.surattugas');

    //Seminar KP
    Route::resource('/kp/listsemkp','Seminarkp\ListController',['only' => ['index','show']]);
    Route::get('kp/seminarkp/getpresensi/{id}','Seminarkp\SeminarkpController@getpresensi')->name('seminarkp.presensi');
    Route::get('kp/seminarkp/update-status','Seminarkp\SeminarkpController@updateStatus')->name('update.status');
    Route::resource('/kp/seminarkp','Seminarkp\SeminarkpController',['only' => ['index','edit','update','show']]);
    Route::resource('/kp/presensi','Seminarkp\PresensiController',['only' => ['index','show']]);
    Route::get('/kp/nilai/{id}','Seminarkp\LaporanController@nilai')->name('laporan.nilai');
    Route::get('/kp/nilaipembimbing/{id}','Seminarkp\LaporanController@cetak_nilai_pembimbing')->name('nilai.pembimbing');
    Route::resource('/kp/laporan','Seminarkp\LaporanController',['only' => ['index','show','edit','update']]);
    Route::resource('/kp/nilaikp','Seminarkp\NilaikpController',['only' => ['index','show']]);

    //Report KP
    Route::resource('/reportpenugasan','Reportkp\ReportpenugasanController');
    Route::resource('/reportpermohonan','Reportkp\ReportpermohonanController');
    Route::resource('/reportbalasan','Reportkp\ReportbalasanController');
});

//Route Role Koordinator TA
Route::namespace('Admin')->prefix('koordinator')->name('admin.')->middleware('can:koordinatorta')->group(function(){
    //Tugas Akhir
    Route::resource('/ta/listta','Ta\ListController');
    Route::get('ta/downloaddraft/{id}','Ta\ListController@downloaddraft')->name('downloaddraft');
    Route::get('ta/downloadsourcecode/{id}','Ta\ListController@downloadsourcecode')->name('downloadsourcecode');
    Route::get('ta/halpengesahan/{id}','Ta\ListController@halpengesahan')->name('halpengesahan');
    Route::resource('/ta/pendaftaran','Ta\PendaftaranController',['except' => ['create','store','show']]);
    Route::resource('/ta/surattugas','Ta\SurattugasController',['except' => ['create','store']]);

    //Seminar Hasil Tugas Akhir
    Route::resource('/ta/semhas','Semhas\SemhasController',['except' => ['create','store']]);
    Route::resource('/ta/listsemhas','Semhas\ListController',['except' => ['create','store']]);
    Route::resource('/ta/listsemhas/rekapsemhas','Semhas\RekapController',['except' => ['create','store']]);

    //Pendadaran Tugas Akhir
    Route::resource('/ta/pendadaran','Pendadaran\PendadaranController',['except' => ['create','store']]);
    Route::resource('/ta/listpendadaran','Pendadaran\ListController',['except' => ['create','store']]);
    Route::resource('/ta/listpendadaran/rekappendadaran','Pendadaran\RekapController',['except' => ['create','store']]);

    //Perubahan Judul TA
    Route::resource('/logbookta','Logbookta\LogbooktaController');
    //Perubahan Judul TA
    Route::resource('/perubahanjudul','Judulta\TajudulController');
    //Perubahan Pembimbing TA
    Route::resource('/pembimbingta','Pembimbingta\TapembimbingController');
    //Perpenjangan TA
    Route::resource('/perpanjanganta','Perpanjanganta\TaperpanjanganController');
    //Perpenjangan TA
    Route::resource('/pembatalanta','Pembatalanta\TapembatalanController');
    //Exit Survey Mahasiswa
    Route::resource('/halpengesahan','Ta\HalpengesahanController');
    //Exit Survey Mahasiswa
    Route::resource('/exitsurvey','Ta\ExitsurveyController');

});

//Route Role Dosen
Route::namespace('Dosen')->prefix('dosen')->name('dosen.')->middleware('can:dosen')->group(function(){
    //Akademik
    Route::resource('/akademik','AkademikController',['only' => ['index']]);

    //Kerja Praktek
    Route::resource('/kp','KpController',['only' => ['index','show','update']]);
    Route::get('/kp/tempatkp/status','KpController@updateTempatkp')->name('tempatkp.update');
    Route::get('/kp/proposalkp/status','KpController@updateProposalkp')->name('proposalkp.update');
    Route::patch('/kp/penugasankp/status','KpController@updatePenugasankp')->name('penugasankp.update');
    Route::get('/kp/seminarkp/status','KpController@updateSeminarkp')->name('seminarkp.update');
    Route::get('/kp/laporankp/status','KpController@updateLaporankp')->name('laporankp.update');
    Route::get('/kp/lihatproposal/{id}','KpController@lihatproposal')->name('lihatproposal');
    Route::get('/kp/lihatnilai/{id}','KpController@lihatnilai')->name('lihatnilai');
    Route::get('/kp/lihatlaporan/{id}','KpController@lihatlaporan')->name('lihatlaporan');
    Route::get('/kp/resetkp/status','KpController@kpreset')->name('kpreset.update');

    //Tugas Akhir
    Route::resource('/ta','TaController',['only' => ['index','edit','update','show']]);
    Route::get('/ta/surattugas/{id}','TaController@surattugas')->name('surattugas.ta');
    Route::get('/ta/detailsta/{id}','TaController@detailsta')->name('details.ta');

    //Seminar Hasil Tugas Akhir
    Route::resource('/semhas','SemhasController',['only' => ['index','edit','update','show']]);
    Route::get('/semhas/undangan/{id}','SemhasController@undangan')->name('undangan.semhas');
    Route::resource('/semhas/nilai_semhas','Pembimbing\NilaisemhasController');
    Route::patch('/semhas/nilai_semhas/validasi/{id}','Pembimbing\NilaisemhasController@validasi')->name('nilai_semhas.validasi');
    Route::get('/semhas/nilai_semhas/update/status','Pembimbing\NilaisemhasController@updateStatus')->name('nilai_semhas.updatestatus');
    Route::resource('/semhas/rekap_semhas','Pembimbing\RekapsemhasController');
    Route::resource('/semhas/penguji_semhas','Penguji\SemhasController');
    Route::patch('/penguji_semhas/validasi/{id}','Penguji\SemhasController@validasi')->name('penguji_semhas.validasi');
    Route::get('/penguji_semhas/update/status','Penguji\SemhasController@updateStatus')->name('penguji_semhas.updatestatus');

    //Pendadaran Tugas Akhir
    Route::resource('/pendadaran','PendadaranController',['only' => ['index','edit','update','show']]);
    Route::get('/pendadaran/undangan/{id}','PendadaranController@undangan')->name('undangan.pendadaran');
    Route::resource('/pendadaran/pembimbing_pendadaran','Pembimbing\NilaipendadaranController');
    Route::patch('/pendadaran/pembimbing_pendadaran/finalisasi/{id}','Pembimbing\NilaipendadaranController@finalisasi')->name('pembimbing_pendadaran.finalisasi');
    Route::get('/pendadaran/pembimbing_pendadaran/update/status','Pembimbing\NilaipendadaranController@updateStatus')->name('pembimbing_pendadaran.updatestatus');
    Route::resource('/pendadaran/rekap_pendadaran','Pembimbing\RekappendadaranController');
    Route::resource('/pendadaran/penguji_pendadaran','Penguji\PendadaranController');
    Route::patch('/penguji_pendadaran/finalisasi/{id}','Penguji\PendadaranController@finalisasi')->name('penguji_pendadaran.finalisasi');
    Route::get('/penguji_pendadaran/update/status','Penguji\PendadaranController@updateStatus')->name('penguji_pendadaran.updatestatus');

    //Tawaran Topik Ta
    Route::resource('/tawaran','TawaranController');

    //Logbook TA
    Route::resource('/logbookta','LogbooktaController');
    Route::get('/logbookta/{id}/details','LogbooktaController@details')->name('logbookta.details');
    Route::get('/update/statuslog','LogbooktaController@updateStatus')->name('update.statuslog');
    Route::get('/update/statuslog2','LogbooktaController@updateStatus2')->name('update.statuslog2');

    //Ganti Judul TA
    Route::resource('/judulta','TajudulController');
    //Ganti Pembimbing TA
    Route::resource('/pembimbingta','TapembimbingController');
    Route::patch('/pembimbingta/updatelama/{id}','TapembimbingController@updatelama')->name('pembimbingta.updatelama');
    //Ganti Perpanjangan
    Route::resource('/perpanjanganta','TaperpanjanganController');
});
//Route Role Dosen
Route::namespace('Dosen')->name('dosen.')->middleware('can:dosen')->group(function(){
    //Persetujuan PA
    Route::resource('kelengkapanta/persetujuanpa','PersetujuanpaController');
    Route::get('kelengkapanta/persetujuanpa/biodata/{id}','PersetujuanpaController@lihatbiodata')->name('biodata.show');
    Route::get('kelengkapanta/persetujuanpa/bebaslab/{id}','PersetujuanpaController@lihatbebaslab')->name('bebaslab.show');
    //Persetujuan Pembimbing
    Route::resource('kelengkapanta/persetujuandraft','Pembimbing\DraftController');
    Route::get('kelengkapanta/downloaddraft/{id}','Pembimbing\DraftController@downloaddraft')->name('downloaddraft');
    //Persetujuan Penguji
    Route::resource('kelengkapanta/draftpenguji','Penguji\DraftController');
});

//Route Kaprodi
Route::namespace('Kaprodi')->prefix('kaprodi')->name('kaprodi.')->middleware('can:kaprodi')->group(function(){
    //Mahasiswa
    Route::resource('listmahasiswa','MahasiswaController',['except' => ['create','store']]);
    //Kerja Praktek
    Route::resource('kerjapraktek','KpController',['except' => ['create','store']]);
    //Tugas Akhir
    Route::resource('tugasakhir','TaController',['except' => ['create','store']]);
    //Hal Pengesahan
    Route::resource('halpengesahan','HalpengesahanController',['except' => ['create','store']]);

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
    Route::get('opta/semhas/rekap/{id}','Opta\SemhasController@showRekapsemhas')->name('semhas.rekap');
    //Pendadaran Tugas Akhir
    Route::resource('opta/pendadaran','Opta\PendadaranController',['except' => ['create','store']]);
    Route::get('opta/pendadaran/rekap/{id}','Opta\PendadaranController@showRekappendadaran')->name('pendadaran.rekap');

});

//Route Kalab
Route::namespace('Admin')->name('kalab.')->middleware('can:kalab')->group(function(){
    //Bebas Lab
    Route::resource('bebaslab','Kalab\KalabController');
});
