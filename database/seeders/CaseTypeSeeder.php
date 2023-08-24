<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $case_types = json_decode(file_get_contents(asset('vehicles/case_type.json')))[0]->data;

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table case_types');

        foreach ($case_types as $case_type) {
            DB::table('case_types')->insert([
                'name' => $case_type->name
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
