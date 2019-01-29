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
       //relasi kunjungan
       /* Schema::table('medical_recs', function (Blueprint $table) {
            $table->integer('id_kunjungan')->unsigned()->change();
            $table->foreign('id_kunjungan')->references('id')->on('kunjungan')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi dokter
        Schema::table('medical_recs', function (Blueprint $table) {
            $table->integer('id_dokter')->unsigned()->change();
            $table->foreign('id_dokter')->references('id')->on('dokter')
                    ->onUpdate('cascade')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //kunjungan
        /*Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropForeign('medical_recs_id_kunjungan_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->dropIndex('medical_recs_id_kunjungan_foreign');
        });
        Schema::table('medical_recs', function(Blueprint $table) {
            $table->integer('id_kunjungan')->change();
        });*/

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
