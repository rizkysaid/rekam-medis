<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('dokter')->truncate();
        DB::table('dokter')->delete();

        $faker = Faker::create('id_ID');
        foreach(range(0,15) as $i){
        	DB::table('dokter')->insert([
        		'nama' => $faker->name,
                'id_gender' => $faker->numberBetween($min=1, $max=2),
        		'alamat' => $faker->address,
                'tgl_lahir' => $faker->dateTimeThisCentury()->format('Y-m-d'),
                'usia' => $faker->numberBetween($min=25, $max=65),
        		'no_telp' => $faker->phoneNumber,
        		'id_poli' => $faker->numberBetween($min=1, $max=5),
        		'id_spesialis' => $faker->numberBetween($min=1, $max=15),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null)
        	]);
        }
    }
}
