<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi medical_recs
        Schema::table('tindakan', function (Blueprint $table) {
            $table->integer('id_medical_recs')->unsigned()->change();
            $table->foreign('id_medical_recs')->references('id')->on('medical_recs')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi detail_tindakan
        Schema::table('tindakan', function (Blueprint $table) {
            $table->integer('id_detail_tindakan')->unsigned()->change();
            $table->foreign('id_detail_tindakan')->references('id')->on('detail_tindakan')
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
        Schema::table('tindakan', function(Blueprint $table) {
            $table->dropForeign('tindakan_id_medical_recs_foreign');
        });
        Schema::table('tindakan', function(Blueprint $table) {
            $table->dropIndex('tindakan_id_medical_recs_foreign');
        });
        Schema::table('tindakan', function(Blueprint $table) {
            $table->integer('id_medical_recs')->change();
        });

        //detail_tindakan
        Schema::table('tindakan', function(Blueprint $table) {
            $table->dropForeign('tindakan_id_detail_tindakan_foreign');
        });
        Schema::table('tindakan', function(Blueprint $table) {
            $table->dropIndex('tindakan_id_detail_tindakan_foreign');
        });
        Schema::table('tindakan', function(Blueprint $table) {
            $table->integer('id_detail_tindakan')->change();
        });
    }
}
