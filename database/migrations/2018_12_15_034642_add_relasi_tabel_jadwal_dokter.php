<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelJadwalDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi pasien
        Schema::table('jadwal_dokter', function (Blueprint $table) {
            $table->integer('id_dokter')->unsigned()->change();
            $table->foreign('id_dokter')->references('id')->on('dokter')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //pasien
        Schema::table('jadwal_dokter', function(Blueprint $table) {
            $table->dropForeign('jadwal_dokter_id_dokter_foreign');
        });
        Schema::table('jadwal_dokter', function(Blueprint $table) {
            $table->dropIndex('jadwal_dokter_id_dokter_foreign');
        });
        Schema::table('jadwal_dokter', function(Blueprint $table) {
            $table->integer('id_dokter')->change();
        });
    }
}
