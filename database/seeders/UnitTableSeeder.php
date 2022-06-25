<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'subject_id'=>1,
                'chapter_id'=>1,
                'name'=>'Unit: 1',
                'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting',
            ], 
            [
                'subject_id'=>1,
                'chapter_id'=>1,
                'name'=>'Unit: 2',
                'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting',
            ], 
            [
                'subject_id'=>1,
                'chapter_id'=>1,
                'name'=>'Unit: 3',
                'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting',
            ],
        ]);
    }
}
