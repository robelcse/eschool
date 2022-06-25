<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;


class SubjectController extends Controller
{

    /**
     * get list of subject from subjects table
     * 
     * @return Array of Subject
     */
    public function getAllSubject()
    {
        $subjects = Subject::orderBy('subject_id', 'desc')->paginate(5);
        return view('Subject.adminSubjectList', compact('subjects'));
    }

    /**
     * return view page to create subject
     * 
     * @return \Illuminate\Http\View
     */

    public function getCreatePage()
    {
        return view('Subject.create');
    }

    /**
     * store subject into subjects table
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolean
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|max:100'
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->admin_approve = Auth::user()->role == 1 ? 1 : NULL;
        $subject->save();

        if (Auth::user()->role == 1) {
            return redirect('admin/subjects')->with('success', 'Subject Created Successfully');
        } elseif (Auth::user()->role == 2) {
            return redirect('teacher/subjects')->with('success', 'Subject Created Successfully');
        }
    }

    /**
     * get list of grade from grades table
     * 
     * @param \Illuminate\Http\Request
     * @param int $subject_id
     * 
     * @return Array of grade
     */

    public function getAllGradesOfSubjects(Request $request, Subject $subject)
    {
        $subject_id = $request->subject->subject_id;

        //find subject by $subject_id
        $subject = Subject::where('subject_id', $subject_id)->first();

        $teacher_approve = explode(",", $subject->teacher_approve);
        $admin_approve =  $subject->admin_approve;

        if ($admin_approve == NULL && count($teacher_approve) < 3) {
            return redirect()->back()->with('error', 'This subject is not activated,need to activate to crate chapter of this subject');
        }


        $grades = Grade::orderBy('grade_id', 'asc')->get();
        return view('Subject.grade-list', ['subject_id' => $subject_id, 'grades' => $grades]);
    }

    /**
     * show view to create grade
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\View
     */

    public function getCreateGradePage(Request $request, Subject $subject)
    {
        $subjects = Subject::all();
        $subject_id = $request->subject->subject_id;

        return view('Subject.subjectWiseGradeCreate', ['subject_id' => $subject_id]);
    }

    /**
     * store grade into the grades table
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolean
     */

    public function storeSubjectWiseGrade(Request $request, Subject $subject)
    {

        $this->validate($request, [
            'grade' => 'required|min:5|max:20'
        ]);

        $subject = new Grade();
        // $subject->subject_id = $request->subject->subject_id;
        $subject->name = $request->grade;
        $subject->save();
        if (Auth::user()->role == 1) {
            return redirect()->route('admin.subject-grades', $request->subject->subject_id)->with('success', 'Grade created successfully');
        } else {
            return redirect()->route('teacher.subject-grades', $request->subject->subject_id)->with('success', 'Grade created successfully');
        }
    }

    /**
     * get list of chapter by subject id from chapters table
     * 
     * @param \Illuminate\Http\Request 
     * @param int $subject_id
     * @param int $grade_id
     * 
     * @return Array of chapter
     */
    public function getAllChaptersOfGradeBySubject(Request $request, Subject $subject, Grade $grade)
    {
        $subject_id = $request->subject->subject_id;
        $grade_id = $request->grade->grade_id;
        $chapters = Chapter::orderBy('chapter_id', 'desc')->where('subject_id', $subject_id)->where('grade_id', $grade_id)->paginate(5);
        return view('Subject.adminGradeWiseChapterList', ['chapters' => $chapters, 'subject_id' => $subject_id, 'grade_id' => $grade_id]);
    }

    /**
     * chapter approve by admin 
     * 
     * @param int $chapter_id
     * 
     * @return Boolean
     */
    public function chapterApproveByAdmin($chapter_id)
    {
        $chapter = Chapter::where('chapter_id', $chapter_id)->first();
        $chapter->admin_approve = 1;
        $chapter->save();
        return redirect()->back()->with('success', 'Chapter approve successfully');
    }

    /**
     * chapter approve by teacher
     * 
     * @param int $chapter_id
     * 
     * @return Boolean
     */
    public function chapterApproveByTeacher($chapter_id)
    {
        $chapter = Chapter::where('chapter_id', $chapter_id)->first();
        $total_approve =  explode(",", $chapter->teacher_approve);

        if (is_null($chapter->teacher_approve)) {
            $chapter->teacher_approve = Auth::user()->id;
        } else {
            if (in_array(Auth::user()->id, $total_approve)) {
                return redirect()->back()->with('warning', 'You already approve this subject');
            } else {
                $chapter->teacher_approve = $chapter->teacher_approve . "," . Auth::user()->id;
            }
        }
        $chapter->save();
        return redirect()->back()->with('success', 'You successfully approve this chapter');
    }

    /**
     * delete chapter from chapter tbale
     * 
     * @param int $chapter_id
     * 
     * @return Boolean
     */
    public function deleteChapter($chapter_id)
    {
        $chapter = Chapter::where('chapter_id', $chapter_id)->first();
        $chapter->delete();
        return redirect()->back()->with('success', 'Chapter deleted successfully');
    }

    /**
     * delete subject by admin
     * 
     * @param int $subject_id
     * 
     * @return Boolean
     */
    public function subjectDelete($subject_id)
    {
        $subject = Subject::where('subject_id', $subject_id)->first();
        $subject->delete();
        return redirect()->back()->with('success', 'Subject Deleted Successfully');
    }

    /**
     * subect approve by admin
     * 
     * @param int $subject_id
     * 
     * @return Boolean
     */
    public function subjectApproveByAdmin($subject_id)
    {

        $subject = Subject::where('subject_id', $subject_id)->first();
        $subject->admin_approve = 1;
        $subject->save();
        return redirect()->back()->with('success', 'Subject approved successfully');
    }

    /**
     * subect approve by teacher
     * 
     * @param int $subject_id
     * 
     * @return Boolean
     */
    public function subjectApproveByTeacher($subject_id)
    {
        $subject = Subject::where('subject_id', $subject_id)->first();
        $total_approve =  explode(",", $subject->teacher_approve);

        if (is_null($subject->teacher_approve)) {
            $subject->teacher_approve = Auth::user()->id;
        } else {
            if (in_array(Auth::user()->id, $total_approve)) {
                return redirect()->back()->with('warning', 'You already approve this subject');
            } else {
                $subject->teacher_approve = $subject->teacher_approve . "," . Auth::user()->id;
            }
        }
        $subject->save();
        return redirect()->back()->with('success', 'You successfully approve this subject');
    }

    public function list(Request $request, User $user)
    {
        return view('Subject.list');
    }

    public function showMyList(Request $request, User $user)
    {
        $subjects = Subject::all();

        return view('Subject.mylist', ['subjects' => $subjects]);
    }

    public function subjectGrade(Request $request, User $user)
    {
        return view('Subject.grade');
    }


    public function course(Request $request, User $user)
    {
        return view('Subject.grade');
    }

    public function subjectChapter(Request $request, User $user)
    {
        return view('Subject.chapters');
    }


    public function chapterLesson(Request $request, User $user)
    {
        return view('Subject.chapterLesson');
    }

    /**
     * show view page to create chapter
     * 
     * @param \Illuminate\Http\Request
     * @param int $subject_id
     * @param int $grade_id
     * 
     * @return \Illuminate\Http\view
     */

    public function chapterCreatePage(Request $request,  Subject $subject, Grade $grade)
    {

        $subject_id = $request->subject->subject_id;

        $grade_id = $request->grade->grade_id;

        return view('Subject.GradeWiseChapterCreate', ['subject_id' => $subject_id, 'grade_id' => $grade_id]);
    }

    /**
     * store chapter grade wise
     * 
     */
    public function storeChapterByGradeWise(Request $request,  Subject $subject, Grade $grade)
    {

        $this->validate($request, [

            'name' => 'required|min:5|max:150',
            'description' => 'required|min:5|max:250'

        ]);

        $subject_id = $request->subject->subject_id;

        $grade_id = $request->grade->grade_id;

        $chapter = new Chapter();
        $chapter->subject_id = $subject_id;
        $chapter->grade_id     = $grade_id;
        $chapter->name = $request->name;
        $chapter->description = $request->description;
        $chapter->admin_approve = Auth::user()->role == 1 ? 1 : NULL;
        $chapter->save();
        if (Auth::user()->role == 1) {
            return redirect()->route('admin.subject-grade-chapter', [$subject_id, $grade_id])->with('success', 'Chapter created successfully');
        } else {
            return redirect()->route('teacher.subject-grade-chapter', [$subject_id, $grade_id])->with('success', 'Chapter created successfully');
        }
    }
}
