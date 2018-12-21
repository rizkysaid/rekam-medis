<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi pegawai
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_pegawai')->unsigned()->change();
            $table->foreign('id_pegawai')->references('id')->on('pegawai')
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_id_pegawai_foreign');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->dropIndex('users_id_pegawai_foreign');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->integer('id_pegawai')->change();
        });
    }
}
