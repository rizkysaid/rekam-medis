<?php

use Illuminate\Database\Seeder;
use App\Status_kawin;

class StatusKawinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('status_kawin')->truncate();
        DB::table('status_kawin')->delete();

        $status_kawin = array(
        	array('nama' => 'BELUM MENIKAH', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'MENIKAH', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'JANDA/DUDA', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'LAIN-LAIN', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('status_kawin')->insert($status_kawin);
    }
}
