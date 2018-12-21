<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelasiTabelRujukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi pasien
        Schema::table('rujukan', function (Blueprint $table) {
            $table->integer('id_pasien')->unsigned()->change();
            $table->foreign('id_pasien')->references('id')->on('pasien')
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
        Schema::table('rujukan', function(Blueprint $table) {
            $table->dropForeign('rujukan_id_pasien_foreign');
        });
        Schema::table('rujukan', function(Blueprint $table) {
            $table->dropIndex('rujukan_id_pasien_foreign');
        });
        Schema::table('rujukan', function(Blueprint $table) {
            $table->integer('id_pasien')->change();
        });
    }
}
