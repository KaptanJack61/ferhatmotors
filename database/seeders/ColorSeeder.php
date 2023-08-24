<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = json_decode(file_get_contents(asset('vehicles/color.json')));

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table colors');

        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'name' => $color->name,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
