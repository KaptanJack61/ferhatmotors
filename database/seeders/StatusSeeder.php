<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = json_decode(file_get_contents(asset('vehicles/status.json')))[0]->data;

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table statuses');

        foreach ($statuses as $status) {
            DB::table('statuses')->insert([
                'name' => $status->name,
                'sold' => $status->sold
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
