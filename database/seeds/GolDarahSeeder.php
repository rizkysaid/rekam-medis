<?php

use Illuminate\Database\Seeder;

class GolDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('gol_darah')->truncate();
        DB::table('gol_darah')->delete();

        $gol_darah = array(
        	array('nama' => 'A', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'B', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'O', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'AB', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Lain-lain', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('gol_darah')->insert($gol_darah);
    }
}
