<?php

use Illuminate\Database\Seeder;
use App\Spesialis;
class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('spesialis')->truncate();
        DB::table('spesialis')->delete();

        $spesialis = array(
        	array('nama' => 'Anak', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Mata', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'THT', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Penyakit Dalam', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Kebidanan & Kandungan', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Kulit & Kelamin', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Jantung & Pembuluh Darah', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Bedah', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Anastesiologi', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Saraf', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Patologi Anatomi', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Radiologi', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Jiwa', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Orthopaedi & Traumatologi', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Andrologi', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('spesialis')->insert($spesialis);
    }
}
