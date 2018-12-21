<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_rm')->unique();
            $table->string('nama')->nullable();
            $table->integer('id_sex')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->integer('usia')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->integer('id_pekerjaan')->nullable();
            $table->integer('id_pendidikan')->nullable();
            $table->integer('id_status_kawin')->nullable();
            $table->integer('id_gol_darah')->nullable();
            $table->integer('id_pasien_tp')->nullable();
            $table->string('nm_wali')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('no_bpjs')->nullable();
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
        Schema::dropIfExists('pasien');
    }
}
