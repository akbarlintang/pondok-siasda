<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBiodataOnSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->text('alamat')->after('tanggal_lahir');
            $table->string('jenis_kelamin')->after('alamat');
            $table->string('agama')->after('jenis_kelamin');
            $table->string('asal_sekolah')->after('nomor_wali');
            $table->text('alamat_asal_sekolah')->after('asal_sekolah');
            $table->integer('tahun_lulus')->after('alamat_asal_sekolah');
            $table->string('no_surat_lulus')->after('tahun_lulus');
            $table->string('nama_ayah')->after('no_surat_lulus')->nullable();
            $table->string('nama_ibu')->after('nama_ayah');
            $table->string('email_ortu')->after('nama_ibu');
            $table->text('foto')->after('email_ortu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            //
        });
    }
}
