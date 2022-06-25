<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Unit;

class ChapterlessionController extends Controller
{

    /**
     * Get list of unit of chapter
     * 
     */
    public function chapter_lessions($subject_id, $chapter_id)
    {

        $units = Unit::where('subject_id', $subject_id)->Where('chapter_id', $chapter_id)->get();
        $subject = Subject::where('subject_id',$subject_id)->first();
        $chapter = Chapter::where('chapter_id', $chapter_id)->first();
       
        return view('lession.index', compact('units','subject','chapter','subject_id'));
    }
}//end class
