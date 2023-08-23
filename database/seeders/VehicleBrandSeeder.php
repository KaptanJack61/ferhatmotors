<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle_brands = json_decode(file_get_contents(asset('vehicles/brand.json')))[2]->data;

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table vehicle_brands');

        foreach ($vehicle_brands as $brand) {
            DB::table('vehicle_brands')->insert([
                'name' => $brand->name,
                'vehicle_type_id' => $brand->tip
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
