<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi detail_obat
        Schema::table('obat', function (Blueprint $table) {
            $table->integer('id_detail_obat')->unsigned()->change();
            $table->foreign('id_detail_obat')->references('id')->on('detail_obat')
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
        //detail_obat
        Schema::table('obat', function(Blueprint $table) {
            $table->dropForeign('obat_id_detail_obat_foreign');
        });
        Schema::table('obat', function(Blueprint $table) {
            $table->dropIndex('obat_id_detail_obat_foreign');
        });
        Schema::table('obat', function(Blueprint $table) {
            $table->integer('id_detail_obat')->change();
        });
    }
}
