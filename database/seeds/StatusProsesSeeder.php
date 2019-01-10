<?php

use Illuminate\Database\Seeder;
use App\Status_proses;

class StatusProsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('status_proses')->truncate();
        DB::table('status_proses')->delete();

        $status_proses = array(
        	array('nama' => 'Close', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Proses', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Invoice', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Lain-lain', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('status_proses')->insert($status_proses);
    }
}
