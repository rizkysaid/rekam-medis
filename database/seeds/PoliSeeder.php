<?php

use Illuminate\Database\Seeder;
use App\Poli;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('poli')->truncate();
        DB::table('poli')->delete();

        $poli = array(
        	array('nama' => 'Umum', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Gigi', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'KIA-KB', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Gizi', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'UGD', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Lain-lain', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('poli')->insert($poli);
    }
}
