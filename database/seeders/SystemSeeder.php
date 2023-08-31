<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('truncate table system_data');

        DB::table('system_data')->insert([
            'site_name' => "Ferhat Motors",
            'site_url' => 'https://ferhatmotors.com.tr',
            'login_cover' =>  'profile/v8JXl9ZSdprsKebmfZrLpvtdP6LBRKFC6vDmLLZD.jpg',
            'site_status' => 1,
            'delivery_time' => date('Y-m-d'),
            'add_expense' => 0
        ]);

    }
}
