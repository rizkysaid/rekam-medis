<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalRecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_recs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pasien');
            $table->integer('no_rm');
            $table->text('keluhan');
            $table->integer('id_diagnosa');
            $table->text('keterangan');
            $table->date('tgl_periksa');
            $table->integer('id_dokter');
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
        Schema::dropIfExists('medical_recs');
    }
}
