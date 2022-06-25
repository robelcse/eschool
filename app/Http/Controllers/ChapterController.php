<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudyMaterial;
use App\Models\Subject;
use App\Models\Quiz;
use Auth;

class ChapterController extends Controller
{
    /**
     * view page to create chapter
     * 
     */
    public function create(Request $request, User $user)
    {
        $subjects = Subject::all();
        return view('Chapter.create', compact('subjects'));
    }

    /**
     * store chapter
     */
    public function store(Request $request)
    {


        $this->validate($request, [

            'name' => 'required|min:3|max:40',
            'description' => 'required'
        ]);

        $chapter = new Chapter();
        $chapter->name = $request->name;
        $chapter->description = $request->description;
        $chapter->subject_id = $request->subject_id;
        $chapter->save();
        return redirect()->back();
    }

    /**
     * get list of chapters
     * 
     */
    public function chapters($subjectId)
    {

        //get chapter by subject id
        $subject_id = $subjectId;


        $check_if_subject_exist = Subject::where('subject_id', $subject_id)->get();

        if (count($check_if_subject_exist) != 0) {

            $subject = Subject::findOrfail($subject_id);
            $chapters = Chapter::where('subject_id', $subject_id)->get();
            return view('frontend.chapters', compact('chapters', 'subject', 'subject_id'));
        } else {

            return view('404');
        }
    }


    public function details(Request $request, User $user)
    {
        return view('Chapter.list');
    }


    public function createMaterial(Request $request, User $user)
    {
        return view('StudyMaterial.create');
    }

    /**
     * store unit metarials
     * 
     */
    public function storeMaterial(Request $request)
    {
        // $this->validate($request, [
        //         'filenames' => 'required',
        //         'filenames.*' => 'required'
        // ]); 

        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }

        $file = new StudyMaterial();
        $file->subject_id = 12838;
        $file->chapter_id = 8757;
        $file->unit_id = 5733;
        $file->user_id = $request->user()->id;
        $file->documents = implode(',', $files);
        $file->save();

        return back()->with('success', 'Data Your files has been successfully added');
    }


    public function createMaterialVideo(Request $request, User $user)
    {
        return view('StudyMaterial.create-video');
    }

    /**
     * store metarilas video
     * 
     */
    public function storeMaterialVideo(Request $request)
    {
        $this->validate($request, [
            'filenames' =>  'mimes:mp4,mov,ogg,qt | max:20000',
        ]);


        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }

        $file = new StudyMaterial();
        $file->subject_id = 12838;
        $file->chapter_id = 8757;
        $file->unit_id = 5733;
        $file->user_id = $request->user()->id;
        $file->video = implode(',', $files);
        $file->video_link = $request->video_link;
        $file->save();

        return back()->with('success', 'Data Your files has been successfully added');
    }
}
