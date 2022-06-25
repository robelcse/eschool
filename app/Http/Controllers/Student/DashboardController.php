<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mysubject;
use App\Models\Subject;


class DashboardController extends Controller
{

    /**
     * show student dashboard
     * 
     * @return \Illuminate\View\view
     */

    public function dashboard()
    {
        $my_subjects = Mysubject::where('user_id', Auth::user()->id)->first();
        $my_subjects == NULL ? $selected_subjects = array() : $selected_subjects = explode(",", $my_subjects->subject_ids);
        $user = User::where('id', Auth::user()->id)->first();

        //get all quize of student
        $student_quizes = Attemp::where('user_id', Auth::user()->id)->get();

        $parcentage_of_quize_mark = [];
        $total_quize = 0;
        if (count($student_quizes) > 0) {
            //count total quize of student
            foreach ($student_quizes as $quize) {
                $total_quize += $quize->attemp;
            }

            //calcualte parcentage of quize mark
            foreach ($student_quizes as $quize) {
                $marks = json_decode($quize->mark);
                for ($i = 0; $i < count($marks); $i++) {
                    $parcentage_of_quize_mark[] = 100 * $marks[$i]->score / $marks[$i]->total_mark;
                }
            }
        }
        if (count($parcentage_of_quize_mark) > 0) {
            $quize_mark =  array_sum($parcentage_of_quize_mark) / count($parcentage_of_quize_mark);
        } else {
            $quize_mark = 0;
        }
        return view('frontend.dashboard', ['user' => $user, 'selected_subjects' => $selected_subjects, 'total_quize' => $total_quize, 'quize_mark' => $quize_mark]);
    }
}
