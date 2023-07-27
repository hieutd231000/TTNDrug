<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => "Mai Hoang",
            'lastname' => "Minh",
            'fullname' => "Mai Hoang Minh",
            'email' => 'minh@gmail.com',
            'gender' => 0,
            'phone' => "123456",
            'address' => "haibatrung",
            'password' => Hash::make('123456'),
            'role' => 1
        ]);
    }
}
