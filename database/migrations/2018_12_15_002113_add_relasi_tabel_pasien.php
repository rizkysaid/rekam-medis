<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi jenis kelamin
        Schema::table('pasien', function (Blueprint $table) {
            $table->integer('id_gender')->unsigned()->change();
            $table->foreign('id_gender')->references('id')->on('gender')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi pekerjaan
        Schema::table('pasien', function (Blueprint $table) {
            $table->integer('id_pekerjaan')->unsigned()->change();
            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaan')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi pendidikan
        Schema::table('pasien', function (Blueprint $table) {
            $table->integer('id_pendidikan')->unsigned()->change();
            $table->foreign('id_pendidikan')->references('id')->on('pendidikan')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi gol_darah
        Schema::table('pasien', function (Blueprint $table) {
            $table->integer('id_gol_darah')->unsigned()->change();
            $table->foreign('id_gol_darah')->references('id')->on('gol_darah')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi status_kawin
        Schema::table('pasien', function (Blueprint $table) {
            $table->integer('id_status_kawin')->unsigned()->change();
            $table->foreign('id_status_kawin')->references('id')->on('status_kawin')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi pasien_tp
        Schema::table('pasien', function (Blueprint $table) {
            $table->integer('id_pasien_tp')->unsigned()->change();
            $table->foreign('id_pasien_tp')->references('id')->on('pasien_tp')
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
        //jenis kelamin
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropForeign('pasien_id_gender_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropIndex('pasien_id_gender_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->integer('id_gender')->change();
        });

        //pekerjaan
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropForeign('pasien_id_pekerjaan_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropIndex('pasien_id_pekerjaan_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->integer('id_pekerjaan')->change();
        });

        //pendidikan
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropForeign('pasien_id_pendidikan_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropIndex('pasien_id_pendidikan_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->integer('id_pendidikan')->change();
        });

        //gol_darah
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropForeign('pasien_id_gol_darah_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropIndex('pasien_id_gol_darah_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->integer('id_gol_darah')->change();
        });

        //status_kawin
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropForeign('pasien_id_status_kawin_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropIndex('pasien_id_status_kawin_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->integer('id_status_kawin')->change();
        });

        //pasien_tp
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropForeign('pasien_id_pasien_tp_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->dropIndex('pasien_id_pasien_tp_foreign');
        });
        Schema::table('pasien', function(Blueprint $table) {
            $table->integer('id_pasien_tp')->change();
        });

    }
}
