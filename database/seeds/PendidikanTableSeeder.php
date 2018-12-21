<?php

use Illuminate\Database\Seeder;
use App\Pendidikan;

class PendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('pendidikan')->truncate();
        DB::table('pendidikan')->delete();

        $pendidikan = array(
        	array('nama' => 'SD', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'SMP', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'SMA', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'D3', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'S1', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'S2', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Tidak Sekolah', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('pendidikan')->insert($pendidikan);
    }
}
