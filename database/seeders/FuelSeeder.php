<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fuels = json_decode(file_get_contents(asset('vehicles/fuel.json')))[0]->data;

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table fuels');

        foreach ($fuels as $fuel) {
            DB::table('fuels')->insert([
                'name' => $fuel->name
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
