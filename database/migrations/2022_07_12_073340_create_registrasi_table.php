<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rus');
            $table->unsignedBigInteger('calon_siswa_id')->unique();
            $table->string('nis');
            $table->biginteger('no_seri_ijazah');
            $table->text('file_skhun');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_ortu');
            $table->string('nama_wali');
            $table->string('alamat_wali');
            $table->string('tinggal_bersama');
            $table->string('asal_kelurahan');
            $table->string('asal_kecematan');
            $table->string('asal_kabupaten');
            $table->string('asal_provinsi');
            $table->biginteger('rt');
            $table->biginteger('rw');
            $table->string('golongan_darah');
            $table->date('tgl_registrasi');
            $table->biginteger('jmlh_saudara_kandung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrasi');
    }
}
