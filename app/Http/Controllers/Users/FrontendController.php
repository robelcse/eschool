<?php

namespace App\Http\Controllers\users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attemp;
use App\Models\Mysubject;
use Illuminate\Support\Facades\Input;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * show application index page
     * 
     */
    public function index()
    {
        return view('frontend.landing');
    }

    /**
     * list of subject page
     * 
     */
    public function chooseSubject()
    {

        $subjects = Subject::orderBy('subject_id', 'ASC')->where('admin_approve', '!=', null)->orWhere('teacher_approve', '!=', null)->get();
        $my_subjects = Mysubject::where('user_id', Auth::user()->id)->first();

        $my_subjects == NULL ? $selected_subjects = array() : $selected_subjects = explode(",", $my_subjects->subject_ids);
        return view('frontend.subject', compact('subjects', 'selected_subjects'));
    }

    /**
     * chapter lessage 
     * 
     */
    public function chapterLesson()
    {
        return view('frontend.chapter-lesson');
    }

    /**
     * get authenticaed student marks
     */
    public function myMarks()
    {

        $arr_of_subject_id = [];
        $subjects = [];
        $chapters = [];
        $subject_ids = Attemp::select(['subject_id'])->distinct()->where('user_id', Auth::user()->id)->get();
        foreach ($subject_ids as $subject_id) {
            $subjects[] = Subject::with('chapters.units.marks')->where('subject_id', $subject_id->subject_id)->first();
        }
        // return $subjects;
        return view('frontend.my-marks', compact('subjects'));
    }
}
