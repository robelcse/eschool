<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Chapter;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * show view page to create question
     */
    public function create(Request $request, Subject $subject, Grade $grade, Chapter $chapter, Unit $unit)
    {
        $subject_id = $request->subject->subject_id;
        $grade_id = $request->grade->grade_id;
        $chapter_id = $request->chapter->chapter_id;
        $unit_id = $request->unit->unit_id;
        return view('Question.create', compact('subject_id', 'grade_id', 'chapter_id', 'unit_id'));
    }

    /**
     * show list of question
     */
    public function showAll(Request $request, User $user)
    {
        $questions = Question::all();
        return view('Question.list', ['questions' => $questions]);
    }

    /**
     * store question
     * 
     */
    public function store(Request $request, Subject $subject, Grade $grade, Chapter $chapter, Unit $unit)
    {

        //return $request->all();
        $request->validate(
            [
                'question' => 'required|min:15',
                'answer'   => 'required',
            ],
        );

        $data['subject_id'] = $request->subject->subject_id;
        $data['grade_id'] = $request->grade->grade_id;
        $data['options'] =  json_encode($request->options);
        $data['chapter_id'] = $request->chapter->chapter_id;
        $data['user_id'] = $request->user()->id;
        $data['type'] = 'radio';
        $data['unit_id'] = $request->unit->unit_id;
        $data['question'] = $request->question;
        $data['answer'] = $request->options[$request->answer - 1];
        $data['admin_approve'] = Auth::user()->role == 1 ? 1 : NULL;

        Question::create($data);
        //session()->flash('toast', 'success');
        return redirect()->back()->with('success', 'Question Created Successfully');
    }
}
