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
            'firstname' => "Super",
            'lastname' => "Admin",
            'fullname' => "superadmin",
            'email' => 'superadmin@gmail.com',
            'gender' => 0,
            'phone' => "123456789",
            'address' => "hanoi",
            'password' => Hash::make('superadmin'),
            'role' => 2
        ]);
    }
}
