<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Carbon\Carbon;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('kunjungan')->truncate();
        DB::table('kunjungan')->delete();

        $faker = Faker::create('id_ID');
        foreach(range(1, 100) as $i){
        	DB::table('kunjungan')->insert([
                'tgl_daftar' => $faker->dateTimeThisMonth($max = 'now')->format('Y-m-d'),
                'id_pasien' => $faker->numberBetween($min=1, $max=100),
        		'id_poli' => $faker->numberBetween($min=1, $max=5),
        		'id_pasien_tp' => $faker->numberBetween($min=1, $max=2),
        		'id_status' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
        	]);
        }
    }
}
