<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
/*        $this->call(JabatanSeeder::class);
        $this->call(GolDarahSeeder::class);
        $this->call(JenisPasienSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(PendidikanTableSeeder::class);
        $this->call(PoliSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(SpesialisSeeder::class);
        $this->call(StatusKawinSeeder::class);
        $this->call(TabelPasienSeeder::class);
        $this->call(DokterSeeder::class);*/
        $this->call(TabelPasienSeeder::class);
        $this->call(DokterSeeder::class);
    }
}
