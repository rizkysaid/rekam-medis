<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelJabatanPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi jabatan
        Schema::table('pegawai', function (Blueprint $table) {
            $table->integer('id_jabatan')->unsigned()->change();
            $table->foreign('id_jabatan')->references('id')->on('jabatan')
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
        //jabatan
        Schema::table('pegawai', function(Blueprint $table) {
            $table->dropForeign('pegawai_id_jabatan_foreign');
        });
        Schema::table('pegawai', function(Blueprint $table) {
            $table->dropIndex('pegawai_id_jabatan_foreign');
        });
        Schema::table('pegawai', function(Blueprint $table) {
            $table->integer('id_jabatan')->change();
        });
    }
}
