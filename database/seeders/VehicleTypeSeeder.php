<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle_types = json_decode(file_get_contents(asset('vehicles/type.json')))[0]->data;

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table vehicle_types');

        foreach ($vehicle_types as $vehicle) {
            DB::table('vehicle_types')->insert([
                'name' => $vehicle->name
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
