<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('gender')->truncate();
        DB::table('gender')->delete();

        $gender = array(
        	array('nama' => 'L', 'detail_gender' => 'Laki-laki', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'P', 'detail_gender' => 'Perempuan', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('gender')->insert($gender);
    }
}
