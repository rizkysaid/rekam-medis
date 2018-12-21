<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelSpesialis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->integer('id_spesialis')->unsigned()->change();
            $table->foreign('id_spesialis')->references('id')->on('spesialis')
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
        //pegawai
        Schema::table('dokter', function(Blueprint $table) {
            $table->dropForeign('dokter_id_spesialis_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->dropIndex('dokter_id_spesialis_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->integer('id_spesialis')->change();
        });
    }
}
