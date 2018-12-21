<?php

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('jabatan')->truncate();
        DB::table('jabatan')->delete();

        $jabatan = array(
        	array('nama' => 'KEPALA PUSKESMAS', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'REKAM MEDIS', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'STAF', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'KEUANGAN', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'DOKTER UMUM', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'PERAWAT UMUM', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'BIDAN', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'LAIN-LAIN', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('jabatan')->insert($jabatan);
    }
}
