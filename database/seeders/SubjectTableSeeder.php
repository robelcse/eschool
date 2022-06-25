<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            [
                'name'=>'Bangla',
            ],
            [
                'name'=>'English',
            ],
            [
                'name'=>'Maths',
            ],
            [
                'name'=>'Physics',
            ],
            [
                'name'=>'Chemistry',
            ]
        ]);
    }
}
