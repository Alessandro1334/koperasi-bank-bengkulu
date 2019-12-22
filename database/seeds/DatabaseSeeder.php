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
        $this->call(SahamInvestorsTableSeeder::class);
        $this->call(InvestorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PekerjaanInvestorsTableSeeder::class);
        $this->call(DataPasanganOrangTuaInvestorsTableSeeder::class);
        $this->call(AhliWarisInvestorsTableSeeder::class);
        $this->call(DokumenPendukungInvestorsTableSeeder::class);
        $this->call(PersetujuansTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(AgenPemasaransTableSeeder::class);
        $this->call(PejabatBerwenangsTableSeeder::class);
        $this->call(BarcodesTableSeeder::class);
    }
}
