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
            $table->integer('id_kunjungan');
            $table->text('anamnesa');
            $table->float('tinggi_badan', 8,2);
            $table->float('berat_badan', 8,2);
            $table->float('suhu_badan', 8,2);
            $table->string('tekanan_darah');
            $table->string('diagnosa_1');
            $table->string('diagnosa_2')->nullable();
            $table->string('icd_1')->nullable();
            $table->string('icd_2')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tgl_periksa');
            $table->integer('id_dokter')->nullable();
            $table->integer('id_user')->nullable();
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
