<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelMedicalRecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //relasi pasien
        Schema::table('medical_recs', function (Blueprint $table) {
            $table->integer('id_pasien')->unsigned()->change();
            $table->foreign('id_pasien')->references('id')->on('pasien')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi diagnosa
        Schema::table('medical_recs', function (Blueprint $table) {
            $table->integer('id_diagnosa')->unsigned()->change();
            $table->foreign('id_diagnosa')->references('id')->on('detail_diagnosa')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi dokter
        Schema::table('medical_recs', function (Blueprint $table) {
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

        //diagnosa
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropForeign('medical_recs_id_pasien_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropIndex('medical_recs_id_pasien_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->integer('id_pasien')->change();
        });

        //diagnosa
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropForeign('medical_recs_id_diagnosa_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropIndex('medical_recs_id_diagnosa_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->integer('id_diagnosa')->change();
        });

        //dokter
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropForeign('medical_recs_id_dokter_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropIndex('medical_recs_id_dokter_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->integer('id_dokter')->change();
        });
    }
}
