<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->char('nik');
            $table->string('nama');
            $table->enum('jenjang', ['smk', 'ma', 'mts']);
            $table->enum('tingkatan', ['1', '2', '3']);
            $table->text('kelas');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('tahun_masuk');
            $table->integer('users_id');
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
        Schema::dropIfExists('gurus');
    }
}
