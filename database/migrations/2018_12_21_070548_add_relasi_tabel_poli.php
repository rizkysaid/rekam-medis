<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelPoli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->integer('id_poli')->unsigned()->change();
            $table->foreign('id_poli')->references('id')->on('poli')
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
