<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'subject_id'=>1,
                'name'=>'Gade-01'
            ],
        ]);
        DB::table('grades')->insert([
            [
                'subject_id'=>1,
                'name'=>'Gade-02'
            ],
        ]);
        DB::table('grades')->insert([
            [
                'subject_id'=>1,
                'name'=>'Gade-03'
            ],
        ]);
        DB::table('grades')->insert([
            [
                'subject_id'=>1,
                'name'=>'Gade-04'
            ],
        ]);
    }
}
