<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->string('tingkatan');
            $table->string('semester');
            $table->float('tugas_1')->nullable();
            $table->float('tugas_2')->nullable();
            $table->float('tugas_3')->nullable();
            $table->float('uts')->nullable();
            $table->float('uas')->nullable();
            $table->float('nilai_akhir')->nullable();
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
        Schema::dropIfExists('penilaians');
    }
}
