<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
            [
                'subject_id'=>1,
                'grade_id'=>1,
                'name'=>'Chapter:1',
            ],
            [
                'subject_id'=>1,
                'grade_id'=>1,
                'name'=>'Chapter:2',
            ],
            [
                'subject_id'=>1,
                'grade_id'=>1,
                'name'=>'Chapter:3',
            ]
        ]);
    }
}
