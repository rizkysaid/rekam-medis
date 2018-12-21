<?php

use Illuminate\Database\Seeder;
use App\Sex;

class SexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('sex')->truncate();
        DB::table('sex')->delete();

        $sex = array(
        	array('nama' => 'L', 'detail_sex' => 'Laki-laki', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'P', 'detail_sex' => 'Perempuan', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('sex')->insert($sex);
    }
}
