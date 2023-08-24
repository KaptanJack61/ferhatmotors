<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SystemSeeder::class,
            VehicleTypeSeeder::class,
            VehicleBrandSeeder::class,
            VehicleModelSeeder::class,
            ColorSeeder::class,
            GearSeeder::class,
            FuelSeeder::class,
            CaseTypeSeeder::class,
            SaleTypeSeeder::class,
            StatusSeeder::class,
        ]);

        $this->command->info("| Sistem bilgileri güncellendi |");
        $this->command->info("+-------------------------------+");
    }
}
