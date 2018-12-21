<?php

use Illuminate\Database\Seeder;
use App\Pasien_tp;

class JenisPasienSeeder extends Seeder
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
        DB::table('pasien_tp')->delete();

        $pasien_tp = array(
        	array('nama' => 'UMUM', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'BPJS', 'created_at'=>DB::raw('NOW()')),
        	array('nama' => 'Lain-lain', 'created_at'=>DB::raw('NOW()'))
        );

        DB::table('pasien_tp')->insert($pasien_tp);
    }
}
