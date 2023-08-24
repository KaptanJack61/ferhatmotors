<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gears = json_decode(file_get_contents(asset('vehicles/gear.json')))[0]->data;

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table gears');

        foreach ($gears as $gear) {
            DB::table('gears')->insert([
                'name' => $gear->name
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
