<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelResep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi pasien
        Schema::table('resep', function (Blueprint $table) {
            $table->integer('id_pasien')->unsigned()->change();
            $table->foreign('id_pasien')->references('id')->on('pasien')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        //relasi obat
        Schema::table('resep', function (Blueprint $table) {
            $table->integer('id_obat')->unsigned()->change();
            $table->foreign('id_obat')->references('id')->on('obat')
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
        Schema::table('resep', function(Blueprint $table) {
            $table->dropForeign('resep_id_pasien_foreign');
        });
        Schema::table('resep', function(Blueprint $table) {
            $table->dropIndex('resep_id_pasien_foreign');
        });
        Schema::table('resep', function(Blueprint $table) {
            $table->integer('id_pasien')->change();
        });

        //obat
        Schema::table('resep', function(Blueprint $table) {
            $table->dropForeign('resep_id_obat_foreign');
        });
        Schema::table('resep', function(Blueprint $table) {
            $table->dropIndex('resep_id_obat_foreign');
        });
        Schema::table('resep', function(Blueprint $table) {
            $table->integer('id_obat')->change();
        });
    }
}
