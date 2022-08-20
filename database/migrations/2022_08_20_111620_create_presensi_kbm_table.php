<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiKbmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi_kbms', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->date('tanggal');
            $table->integer('mapel_id');
            $table->string('jenjang');
            $table->string('tingkatan');
            $table->string('kelas');
            $table->string('semester');
            $table->string('status');
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
        Schema::dropIfExists('presensi_kbms');
    }
}
