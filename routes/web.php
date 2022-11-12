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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/','user\WelcomeController@index')->name('home');
//Route::get('/home', 'user\WelcomeController@index')->name('home2');
Route::get('/berita','user\BeritaController@index')->name('user.berita');
Route::get('/berita/beritadetail/{id}','user\BeritaController@detail')->name('user.berita.detail');
Route::get('/jurusan','user\JurusanController@index')->name('user.jurusan');
Route::get('/galeri','user\GaleriController@index')->name('user.galeri');
Route::get('/kontak','user\KontakController@index')->name('user.kontak');
Route::post('/kontak','user\KontakController@store')->name('user.kontak.store');
Route::get('/tentang','user\TentangController@index')->name('user.tentang');
Route::get('/kategori/{id}','KategoriController@beritaByKategori')->name('user.kategori');

//Auth::routes();
// 
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth','checkRole:admin']],function(){ 
Route::get('/admin','DashboardController@index')->name('admin.dashboard');
//admin data user admin
Route::get('/admin/data_admin/index','admin\AdminController@index')->name('admin.data_admin.index');
Route::get('/admin/data_admin/tambah','admin\AdminController@tambah')->name('admin.data_admin.tambah');
Route::post('/admin/data_admin/store','admin\AdminController@store')->name('admin.data_admin.store');
Route::get('/admin/data_admin/edit/{id}','admin\AdminController@edit')->name('admin.data_admin.edit');
Route::post('/admin/data_admin/update/{id}','admin\AdminController@update')->name('admin.data_admin.update');
Route::get('/admin/data_admin/delete/{id}','admin\AdminController@delete')->name('admin.data_admin.delete');

//admin data user panitia
Route::get('/admin/data_panitia/index','admin\PanitiaController@index')->name('admin.data_panitia.index');
Route::get('/admin/data_panitia/tambah','admin\PanitiaController@tambah')->name('admin.data_panitia.tambah');
Route::post('/admin/data_panitia/store','admin\PanitiaController@store')->name('admin.data_panitia.store');
Route::get('/admin/data_panitia/edit/{id}','admin\PanitiaController@edit')->name('admin.data_panitia.edit');
Route::post('/admin/data_panitia/update/{id}','admin\PanitiaController@update')->name('admin.data_panitia.update');
Route::get('/admin/data_panitia/delete/{id}','admin\PanitiaController@delete')->name('admin.data_panitia.delete');


Route::get('/admin/data_siswa/index','admin\SiswaController@index')->name('admin.data_siswa.index');
Route::get('/admin/data_siswa/reset/{id}','admin\SiswaController@reset')->name('admin.data_siswa.reset');
Route::post('/admin/data_siswa/update/{id}','admin\SiswaController@update')->name('admin.data_siswa.update');

//admin berita
Route::get('/admin/data_berita/index','admin\BeritaController@index')->name('admin.berita');
Route::get('/admin/data_berita/tambah','admin\BeritaController@tambah')->name('admin.tambah.berita');
Route::post('/admin/data_berita/store','admin\BeritaController@store')->name('admin.berita.store');
Route::get('/admin/data_berita/edit/{id}','admin\BeritaController@edit')->name('admin.berita.edit');
Route::post('/admin/data_berita/update/{id}','admin\BeritaController@update')->name('admin.berita.update');
Route::get('/admin/data_berita/delete/{id}','admin\BeritaController@delete')->name('admin.berita.delete');
Route::get('/admin/data_berita/detail/{id}','admin\BeritaController@detail')->name('admin.berita.detail');
//admin kategori berita
Route::get('/admin/data_kategori_berita/index','admin\KategoriberitaController@index')->name('admin.kategori');
Route::get('/admin/data_kategori_berita/tambah','admin\KategoriberitaController@tambah')->name('admin.tambah.kategori');
Route::post('/admin/data_kategori_berita/store','admin\KategoriberitaController@store')->name('admin.kategori.store');

Route::get('/admin/data_kategori_berita/edit/{id}','admin\BeritaController@edit')->name('admin.kategori.edit');
Route::post('/admin/data_kategori_berita/update/{id}','admin\BeritaController@update')->name('admin.kategori.update');
Route::get('/admin/data_kategori_berita/delete/{id}','admin\BeritaController@delete')->name('admin.kategori.delete');
Route::get('/admin/data_kategori_berita/detail/{id}','admin\BeritaController@detail')->name('admin.kategori.detail');

//admin jurusan
Route::get('/admin/data_jurusan/index','admin\JurusanController@index')->name('admin.jurusan');
Route::get('/admin/data_jurusan/tambah','admin\JurusanController@tambah')->name('admin.tambah.jurusan');
Route::post('/admin/data_jurusan/store','admin\JurusanController@store')->name('admin.jurusan.store');
Route::get('/admin/data_jurusan/edit/{id}','admin\JurusanController@edit')->name('admin.jurusan.edit');
Route::post('/admin/data_jurusan/update/{id}','admin\JurusanController@update')->name('admin.jurusan.update');
Route::get('/admin/data_jurusan/delete/{id}','admin\JurusanController@delete')->name('admin.jurusan.delete');

//admin laporan
Route::get('/admin/laporan/lp_panitia','admin\LaporanController@index')->name('admin.laporan.panitia');
Route::get('/admin/laporan/lp_jurusan','admin\LaporanController@jurusan')->name('admin.laporan.jurusan');
Route::get('/admin/laporan/lp_berita','admin\LaporanController@berita')->name('admin.laporan.berita');
Route::get('/admin/laporan/lp_siswa','admin\LaporanController@siswa')->name('admin.laporan.siswa');
//admin kontak
Route::get('/admin/data_kontak/index','admin\KontakController@index')->name('admin.kontak');
Route::get('/admin/data_kontak/delete/{id}','admin\KontakController@delete')->name('admin.kontak.delete');
//admin tentang (Belum selesai)
Route::get('/admin/data_tentang/index','admin\TentangController@index')->name('admin.tentang');
//admin galeri
Route::get('/admin/data_galeri/index','admin\GaleriController@index')->name('admin.galeri');
Route::get('/admin/data_galeri/tambah','admin\GaleriController@tambah')->name('admin.tambah.galeri');
Route::post('/admin/data_galeri/store','admin\GaleriController@store')->name('admin.galeri.store');
Route::get('/admin/data_galeri/delete/{id}','admin\GaleriController@delete')->name('admin.galeri.delete');
});  




// Role Panitia
Route::group(['middleware' => ['auth','checkRole:panitia']],function(){ 
Route::get('/panitia','panitia\DashboardController@index')->name('panitia.dashboard');
//panitia pendaftaran 
Route::get('/panitia/data_calon/index','panitia\CalonsiswaController@index')->name('panitia.calon_siswa');
Route::get('/panitia/data_calon/konfirmasi/{id}','panitia\CalonsiswaController@konfirmasi')->name('panitia.konfirmasi');

//Panitia Pengumuman
Route::get('/panitia/data_pengumuman/index','panitia\PengumumanController@index')->name('panitia.pengumuman');
Route::get('/panitia/data_pengumuman/tambah','panitia\PengumumanController@tambah')->name('panitia.tambah.pengumuman');
Route::post('/panitia/data_pengumuman/store','panitia\PengumumanController@store')->name('panitia.pengumuman.store');
Route::get('/panitia/data_pengumuman/edit/{id}','panitia\PengumumanController@edit')->name('panitia.edit.pengumuman');
Route::post('/panitia/data_pengumuman/update/{id}','panitia\PengumumanController@update')->name('panitia.pengumuman.update');

//panitia pengumuman pesan
Route::get('/panitia/data_pengumuman/pesan/{id}','panitia\PengumumanController@pesan')->name('panitia.pesan');
Route::post('/panitia/data_pengumuman/pesan/{id}','panitia\PengumumanController@pesan')->name('panitia.pesan');
Route::post('/panitia/data_pengumuman/data_pesan','panitia\PengumumanController@data_pesan')->name('panitia.pesan.pengumuman');


//panitia Registrasi
Route::get('/panitia/data_registrasi/index','panitia\RegistrasiController@index')->name('panitia.registrasi');
//panitia laporan
Route::get('/panitia/data_laporan/laporan_csi','panitia\LaporancsiController@index')->name('panitia.laporancsi');
Route::get('/panitia/data_laporan/laporan_rus','panitia\LaporanrusController@index')->name('panitia.laporanrus');
Route::get('/panitia/data_laporan/laporan_pgn','panitia\LaporanpgnController@index')->name('panitia.laporanpgn');

});




// Role siswa
Route::group(['middleware' => ['auth','checkRole:siswa']],function(){ 
Route::get('/siswa','siswa\DashboardController@index')->name('siswa.dashboard');
Route::get('/siswa/jurusan','siswa\JurusanController@index')->name('siswa.jurusan');
Route::get('/siswa/berita','siswa\BeritaController@index')->name('siswa.berita');
Route::get('/siswa/berita/beritadetail/{id}','siswa\BeritaController@detail')->name('siswa.berita.detail');
Route::get('/siswa/galeri','siswa\GaleriController@index')->name('siswa.galeri');
Route::get('/siswa/kontak','siswa\KontakController@index')->name('siswa.kontak');
Route::post('/siswa/kontak','siswa\KontakController@store')->name('siswa.kontak.store');
Route::get('/siswa/tentang','siswa\TentangController@index')->name('siswa.tentang');
Route::get('/siswa/pendaftaran','siswa\PendaftaranController@index')->name('siswa.pendaftaran');

Route::post('/siswa/pendaftaran','siswa\PendaftaranController@store')->name('siswa.pendaftaran.store');
Route::get('/siswa/pengumuman','siswa\PengumumanController@index')->name('siswa.pengumuman');

Route::get('/siswa/registrasi','siswa\RegistrasiController@index')->name('siswa.registrasi');
Route::post('/siswa/registrasi','siswa\RegistrasiController@store')->name('siswa.registrasi.store');

Route::get('/siswa/profil','siswa\ProfilController@index')->name('siswa.profil');
//siswa profil edit pendaftaran
Route::get('/siswa/edit_pendaftaran/{id}','siswa\ProfilController@edit_pendaftaran')->name('siswa.edit_pendaftaran');
Route::post('/siswa/edit_pendaftaran/update/{id}','siswa\ProfilController@update')->name('siswa.edit_pendaftaran.update');
//siswa profil edit registrasi
Route::get('/siswa/edit_registrasi/{id}','siswa\ProfilController@edit_registrasi')->name('siswa.edit_registrasi');
Route::post('/siswa/edit_registrasi/update/{id}','siswa\ProfilController@update_registrasi')->name('siswa.edit_registrasi.update');
}); 