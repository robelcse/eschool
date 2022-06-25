<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        $this->call(UsersTableSeeder::class);

        // $this->call(SubjectTableSeeder::class);

        // $this->call(GradeTableSeeder::class);

        // $this->call(ChapterTableSeeder::class);

        // $this->call(UnitTableSeeder::class);

        // $this->call(StudymetarialSeeder::class);

        // $this->call(QuestionTableSeeder::class);
    }
}
