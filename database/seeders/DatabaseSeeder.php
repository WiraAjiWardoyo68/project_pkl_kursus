<?php

use UserTableSeeder;
use NilaiTableSeeder;
use KursusTableSeeder;
use MateriTableSeeder;
use AbsensiTableSeeder;
use PesertaTableSeeder;
use ProgramTableSeeder;
use InstrukturTableSeeder;
use SertifikatTableSeeder;
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
        $this->call(UserTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(MateriTableSeeder::class);
        $this->call(InstrukturTableSeeder::class);
        $this->call(PesertaTableSeeder::class);
        $this->call(KursusTableSeeder::class);
        $this->call(AbsensiTableSeeder::class);
        $this->call(NilaiTableSeeder::class);
        $this->call(SertifikatTableSeeder::class);
    }
}
