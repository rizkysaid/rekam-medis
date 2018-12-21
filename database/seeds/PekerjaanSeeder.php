<?php

use Illuminate\Database\Seeder;
use App\Pekerjaan;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('pekerjaan')->truncate();
        DB::table('pekerjaan')->delete();

        $pekerjaan = array(
        	array('nama' => 'PNS', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'TNI/POLRI', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'KARYAWAN SWASTA', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'PETANI', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'PEDAGANG', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'WIRASWASTA', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'LAIN-LAIN', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('pekerjaan')->insert($pekerjaan);
    }
}
