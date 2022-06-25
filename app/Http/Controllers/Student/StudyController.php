<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    /**
     * list of endroled subject of authenticated student
     */
    public function myCourse()
    {
        $subjects = Subject::all();
        return view('frontend.my-subjects', ['subjects' => $subjects]);
    }
}
