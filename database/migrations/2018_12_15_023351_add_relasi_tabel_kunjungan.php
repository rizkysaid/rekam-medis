<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelKunjungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi pasien
        Schema::table('kunjungan', function (Blueprint $table) {
            $table->integer('id_pasien')->unsigned()->change();
            $table->foreign('id_pasien')->references('id')->on('pasien')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi poli
        Schema::table('kunjungan', function (Blueprint $table) {
            $table->integer('id_poli')->unsigned()->change();
            $table->foreign('id_poli')->references('id')->on('poli')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi pasien_tp
        Schema::table('kunjungan', function (Blueprint $table) {
            $table->integer('id_pasien_tp')->unsigned()->change();
            $table->foreign('id_pasien_tp')->references('id')->on('pasien_tp')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi status
        Schema::table('kunjungan', function (Blueprint $table) {
            $table->integer('id_status')->unsigned()->change();
            $table->foreign('id_status')->references('id')->on('status_proses')
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
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropForeign('kunjungan_id_pasien_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropIndex('kunjungan_id_pasien_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->integer('id_pasien')->change();
        });

        //poli
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropForeign('kunjungan_id_poli_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropIndex('kunjungan_id_poli_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->integer('id_poli')->change();
        });

        //pasien_tp
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropForeign('kunjungan_id_pasien_tp_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropIndex('kunjungan_id_pasien_tp_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->integer('id_pasien_tp')->change();
        });

        //status
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropForeign('kunjungan_id_status_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->dropIndex('kunjungan_id_status_foreign');
        });
        Schema::table('kunjungan', function(Blueprint $table) {
            $table->integer('id_status')->change();
        });
    }
}
