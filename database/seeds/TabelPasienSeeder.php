<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TabelPasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('pasien')->truncate();
        DB::table('pasien')->delete();

        $faker = Faker::create('id_ID');
        foreach(range(0,15) as $i){
        	DB::table('pasien')->insert([
        		'no_rm' => $faker->unique()->numberBetween($min = 666000, $max = 666015),
        		'nama' => $faker->name,
        		'id_gender' => $faker->numberBetween($min=1, $max=2),
        		'tgl_lahir' => $faker->dateTimeThisCentury()->format('Y-m-d'),
        		'tgl_daftar' => $faker->dateTime($max = 'now', $timezone = null),
        		'usia' => $faker->numberBetween($min=10, $max=65),
        		'alamat' => $faker->address,
        		'no_telp' => $faker->phoneNumber,
        		'id_pekerjaan' => $faker->numberBetween($min=1, $max=6),
        		'id_pendidikan' => $faker->numberBetween($min=1, $max=7),
        		'id_status_kawin' => $faker->numberBetween($min=1, $max=3),
        		'id_gol_darah' => $faker->numberBetween($min=1, $max=4),
        		'id_pasien_tp' => $faker->numberBetween($min=1, $max=2),
        		'nm_wali' => $faker->name,
        		'no_ktp' => $faker->ean13,
        		'no_bpjs' => $faker->isbn13,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null)
        	]);
        }
    }
}
