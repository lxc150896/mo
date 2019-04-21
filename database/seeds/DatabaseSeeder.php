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
        $this->call(CcmBiNanDiLenSeeder::class);
        $this->call(CcmBiNanDiXuongSeeder::class);
        $this->call(CcmTrinhSatDiLenSeeder::class);
        $this->call(CcmTrinhSatDiXuongSeeder::class);
        $this->call(OxiBiNanDiLenSeeder::class);
        $this->call(OxiBiNanDiXuongSeeder::class);
        $this->call(OxiTrinhSatDiLenSeeder::class);
        $this->call(OxiTrinhSatDiXuongSeeder::class);
    }
}
