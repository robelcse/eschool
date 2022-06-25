<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudymetarialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_materials')->insert([
            'user_id' => 1,
            'subject_id' => 1,
            'chapter_id' => 1,
            'unit_id' => 1,
            'grade_id' => 1,
            'documents' => 'https://pdfjs-express.s3-us-west-2.amazonaws.com/docs/choosing-a-pdf-viewer.pdf',
            'video' => null,
            'video_link' => 'https://www.youtube.com/embed/qZXt1Aom3Cs',
            'video_title' =>'Vue js crush course',
            'document_title'=>'Vue js PDF Book' 
        ]);
        DB::table('study_materials')->insert([
            'user_id' => 1,
            'subject_id' => 1,
            'chapter_id' => 1,
            'unit_id' => 2,
            'grade_id' => 1,
            'documents' => 'https://pdfjs-express.s3-us-west-2.amazonaws.com/docs/choosing-a-pdf-viewer.pdf',
            'video' => null,
            'video_link' => 'https://www.youtube.com/embed/w7ejDZ8SWv8',
            'video_title' =>'React js crush course',
            'document_title'=>'React js PDF Book' 
        ]);
        DB::table('study_materials')->insert([
            'user_id' => 1,
            'subject_id' => 1,
            'chapter_id' => 1,
            'unit_id' => 3,
            'grade_id' => 1,
            'documents' => 'https://pdfjs-express.s3-us-west-2.amazonaws.com/docs/choosing-a-pdf-viewer.pdf',
            'video' => null,
            'video_link' => 'https://www.youtube.com/embed/3dHNOWTI7H8',
            'video_title' =>'Angular js crush course',
            'document_title'=>'Angular js PDF Book' 
        ]);
        
    }
}
