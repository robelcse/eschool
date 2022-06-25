<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'email' => 'admin@eschool.com',
                'password' => bcrypt('1234567890'),
                'first_name' => 'Admin ',
                'last_name' => 'eschool',
                'address' => 'Dhaka, Banglades',
                'city' => 'Dhaka',
                'zip_code' => '1232',
                'role' => 1,
                'bio' => 'This is my bio',
                'status' => '1',
            ]
            );
    }
}
