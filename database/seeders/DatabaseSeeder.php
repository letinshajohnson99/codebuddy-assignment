<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'is_admin' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        DB::table('users')->insert([
            'username' => 'user',
            'firstname' => 'User',
            'lastname' => '01',
            'is_admin' => 0,
            'email' => 'user@gmail.com',
            'password' => bcrypt('user')
        ]);
    }
}
