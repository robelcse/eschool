<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mysubject;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;

class MysubjectController extends Controller
{
    /**
     * enrolled subject
     * 
     */
    public function insertSubjects(Request $request)
    {

        $subjects = $request->except(['_token', 'submit']);

        if ($subjects == NULL) {

            return redirect()->back()->with('error', 'Please select subject');
        }

        $selected_subjec = (implode(',', $subjects['subject']));

        //check if exist subjects into mysubjects table, if exist then update else create one
        $findExistingUserSubjects = Mysubject::where('user_id', Auth::user()->id)->first();

        if ($findExistingUserSubjects) {
            $mysubject = Mysubject::where('user_id', Auth::user()->id)->first();
            $mysubject->user_id = Auth::user()->id;
            $mysubject->subject_ids = $selected_subjec;
            $mysubject->grade = $findExistingUserSubjects->grade;
            $mysubject->save();
        } else {
            $mysubject = new Mysubject();
            $mysubject->user_id = Auth::user()->id;
            $mysubject->subject_ids = $selected_subjec;
            $mysubject->grade = null;
            $mysubject->save();
        }

        return redirect()->route('selectGrade');
    }

    /**
     * 
     * grade selecttion
     * 
     */
    public function selectGrade(Request $request)
    {

        $grades = Mysubject::where('user_id', Auth::user()->id)->first();
        $grades == NULL ? $selected_grades = array() : $selected_grades = explode(",", $grades->grade);


        $subjects = $request->except(['_token', 'submit']);


        if ($grades == NULL) {
            return redirect()->back();
        } else {

            return view('frontend.grade', compact('selected_grades'));
        }
    }

    /**
     * update grade
     * 
     */
    public function updateGrade(Request $request)
    {


        $grades = $request->except(['_token', 'submit']);
        if (empty($grades)) {
            return redirect()->back()->with('error', 'Please select grade');
        } else {

            // return $request->all();
            $grades = $request->except(['_token', 'submit']);
            $selected_grade = (implode(',', $grades['grade']));
            $mysubject =  Mysubject::where('user_id', Auth::user()->id);
            $mysubject->update(
                [
                    'grade' => $selected_grade
                ]
            );
            return redirect()->route('mySubjects');
        }
    }

    /**
     * show list of enrolled subject of authenticaed student
     * 
     */
    public function mySubjects()
    {
        //find all subjectIds for a specific user(student)
        $mysubject = Mysubject::where('user_id', Auth::user()->id)->first();

        if ($mysubject == NULL) {
            $subjectIds = "0";
        } else {
            $subjectIds =  $mysubject->subject_ids . ",0";
        }


        //traverse string(subjectIds) and push all id into an array
        $subject_ids = array();
        $temp = '';
        for ($i = 0; $i < strlen($subjectIds); $i++) {

            if ($subjectIds[$i] != ',') {
                $temp .= $subjectIds[$i];
            } else {
                array_push($subject_ids, $temp);
                $temp = '';
            }
        }

        //retrive a specific subject by subject_id,it will traverse subject_ids arr
        $mySubjects = array();
        foreach ($subject_ids as $sub_id) {
            $subject = Subject::where('subject_id', $sub_id)->first();
            array_push($mySubjects, $subject);
        }
        return view('frontend.my-subjects', compact('mySubjects'));
    }
}//end class
