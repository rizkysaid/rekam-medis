<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->integer('id_gender')->unsigned()->change();
            $table->foreign('id_gender')->references('id')->on('gender')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('dokter', function (Blueprint $table) {
            $table->integer('id_poli')->unsigned()->change();
            $table->foreign('id_poli')->references('id')->on('poli')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

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
        Schema::table('dokter', function(Blueprint $table) {
            $table->dropForeign('dokter_id_gender_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->dropIndex('dokter_id_gender_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->integer('id_gender')->change();
        });
        
        Schema::table('dokter', function(Blueprint $table) {
            $table->dropForeign('dokter_id_spesialis_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->dropIndex('dokter_id_spesialis_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->integer('id_spesialis')->change();
        });

        Schema::table('dokter', function(Blueprint $table) {
            $table->dropForeign('dokter_id_poli_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->dropIndex('dokter_id_poli_foreign');
        });
        Schema::table('dokter', function(Blueprint $table) {
            $table->integer('id_poli')->change();
        });
    }
}
