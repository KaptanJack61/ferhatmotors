<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('truncate table users');

        DB::table('users')->insert([
            'firstname' => 'Hamdi',
            'lastname' => 'Kalaycı',
            'email' => 'hamdikalayci@gmail.com',
            'phone' => '5616111154',
            'photo' => 'storage/profile/nzbS3i9czCpF3oItvCYnlGPU2zRnK6eBceZKLaGY.jpg',
            'password' => Hash::make('54Kaptan.')
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');



    }
}
