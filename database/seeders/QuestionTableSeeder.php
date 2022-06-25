<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        //question for chapter one
        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'Study of the interaction of people with their environment',
            'type' => 'MCQ',
            'options' => 'ecology,psychology,philosophy,geography',
            'answer' => 'ecology',
            'unit_id' => 1,
            'grade_id' => 1,
        ]);
        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'A list of explanations of rare, technical or obsolete words',
            'type' => 'MCQ',
            'options' => 'dictionary,glossary,lexicon,catalogue',
            'answer' => 'lexicon',
            'unit_id' => 1,
            'grade_id' => 1,
        ]);
        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'Underground place for storing wine or other provisions',
            'type' => 'MCQ',
            'options' => 'garage,cellar,attic,hall',
            'answer' => 'cellar',
            'unit_id' => 1,
            'grade_id' => 1,
        ]);
        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'Free somebody from blame or guilt',
            'type' => 'MCQ',
            'options' => 'excuse,reprimand,exonerate,acquit',
            'answer' => 'exonerate',
            'unit_id' => 2,
            'grade_id' => 1,
        ]);
        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'One who plays for pleasure rather than as a profession',
            'type' => 'MCQ',
            'options' => 'player,amateur,performer,actor',
            'answer' => 'amateur',
            'unit_id' => 2,
            'grade_id' => 1,
        ]);

        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'Action that is likely to make people very angry',
            'type' => 'MCQ',
            'options' => 'inflationary,inflammable,commensurable,inflammatory',
            'answer' => 'inflammatory',
            'unit_id' => 3,
            'grade_id' => 1,
        ]);

        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'A humorous drawing dealing with current events or politics.',
            'type' => 'MCQ',
            'options' => 'sketch,illustration,cartoon,skit',
            'answer' => 'cartoon',
            'unit_id' => 3,
            'grade_id' => 1,
        ]);
        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'Act of mercy killing',
            'type' => 'MCQ',
            'options' => 'suicide,euthanasia,immolation,asphyxiation',
            'answer' => 'euthanasia',
            'unit_id' => 3,
            'grade_id' => 1,
        ]);
        DB::table('questions')->insert([
            'subject_id' => 1,
            'chapter_id' => 1,
            'user_id' => 1,
            'question' => 'Action that is likely to make people very angry',
            'type' => 'MCQ',
            'options' => 'inflationary,inflammable,commensurable,inflammatory',
            'answer' => 'inflammatory',
            'unit_id' => 3,
            'grade_id' => 1,
        ]);
        DB::table('questions')->insert([
            'subject_id' => 2,
            'chapter_id' => 3,
            'user_id' => 1,
            'question' => 'Bare minimum needed for survival',
            'type' => 'MCQ',
            'options' => 'sustenance,subsistence,sustainable,supplement',
            'answer' => 'subsistence',
            'unit_id' => 3,
            'grade_id' => 1,
        ]); 
    }
}
