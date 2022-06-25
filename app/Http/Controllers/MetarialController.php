<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\Chapter;
use App\Models\StudyMaterial;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MetarialController extends Controller
{

    /**
     * get all study metarials
     * 
     */
    public function index(Request $request, Subject $subject, Grade $grade, Chapter $chapter, Unit $unit)
    {

        $subject_id = $request->subject->subject_id;
        $grade_id = $request->grade->grade_id;
        $chapter_id = $request->chapter->chapter_id;
        $unit_id = $request->unit->unit_id;

        $questions = Question::where('subject_id', $subject_id)->where('grade_id', $grade_id)->where('unit_id', $unit_id)->Where('chapter_id', $chapter_id)->get();

        $study_metarials = StudyMaterial::where('subject_id', $subject_id)->where('grade_id', $grade_id)->where('chapter_id', $chapter_id)->get();
        return view('StudyMaterial.index', compact('subject_id', 'grade_id', 'chapter_id', 'unit_id', 'study_metarials', 'questions'));
    }

    /**
     * show view page to create study metarils
     * 
     */
    public function createMaterial(Request $request, Subject $subject, Grade $grade, Chapter $chapter, $unit_id)
    {

        $subject_id = $request->subject->subject_id;
        $grade_id = $request->grade->grade_id;
        $chapter_id = $request->chapter->chapter_id;
        return view('StudyMaterial.create', compact('subject_id', 'grade_id', 'chapter_id', 'unit_id'));
    }

    /**
     * store chapterwise study metarials
     * 
     */
    public function storeChapterWiseMetarial(Request $request)
    {

        $request->validate(
            [
                'document_title' => 'required|min:5',
                'documents' => 'required|mimes:pdf|max:10240',
                'video_title' => 'required|min:5',
                'video_link' => 'required|url',
            ],

        );

        $document = $request->file('documents');
        $slug = Str::slug($request->document_title);

        if (isset($document)) {
            $currentDate = Carbon::now()->toDateString();
            $document_name = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $document->getClientOriginalExtension();
            if (!file_exists('files')) {
                mkdir('files', 0777, true);
            }

            $document->move('files', $document_name);
        }



        $subject_id = $request->subject_id;
        $grade_id = $request->grade_id;
        $chapter_id = $request->chapter_id;
        $unit_id = $request->unit_id;

        $study_metarial = new StudyMaterial();
        $study_metarial->user_id = Auth::user()->id;
        $study_metarial->subject_id = $subject_id;
        $study_metarial->grade_id = $grade_id;
        $study_metarial->chapter_id = $chapter_id;
        $study_metarial->unit_id = $unit_id;
        $study_metarial->document_title = $request->document_title;
        $study_metarial->documents = $document_name;
        $study_metarial->video_title = $request->video_title;
        $study_metarial->video_link = $request->video_link;
        $study_metarial->save();

        if (Auth::user()->role == 1) {
            return redirect()->route('admin.metarial.index', [$subject_id, $grade_id, $chapter_id, $unit_id])->with('success', 'Metarial created successfully');
        } else {
            return redirect()->route('teacher.metarial.index', [$subject_id, $grade_id, $chapter_id, $unit_id])->with('success', 'Metarial created successfully');
        }
    }
}//end class
