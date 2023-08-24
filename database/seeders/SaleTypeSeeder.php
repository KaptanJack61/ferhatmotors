<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table sale_types');


            DB::table('sale_types')->insert([
                'name' => 'Sahiplik',
                'profit' => false
            ]);

        DB::table('sale_types')->insert([
            'name' => 'Komisyon',
            'profit' => true
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
