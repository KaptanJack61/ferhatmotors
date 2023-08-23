<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle_models = json_decode(file_get_contents(asset('vehicles/model.json')))[2]->data;

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table vehicle_models');

        foreach ($vehicle_models as $model) {
            DB::table('vehicle_models')->insert([
                'name' => $model->name,
                'vehicle_brand_id' => $model->marka
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
