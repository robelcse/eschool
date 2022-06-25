<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    /**
     * get list of teacher who have register 
     * 
     * @return Array of teacher
     */
    public function teacherList()
    {
        $teachers = User::orderBy('id', 'desc')->where('role', 2)->paginate(10);
        return view('Teacher.teacher-list', ['title' => 'Teacher list', 'teachers' => $teachers]);
    }

    /**
     * approve teacher account by admin who is pending after registration/created
     * 
     * @param int $teacher_id
     * 
     * @return Boolean
     */
    public function approveTeacherbyAdmin($teacher_id)
    {
        $user = User::where('id', $teacher_id)->first();
        $user->status = 3;
        $user->save();
        return redirect()->back()->with('success', 'Teacher Profile Activated Successfully.');
    }

    /**
     * approve teacher by teacher
     * 
     * @param int $teacher_id
     * 
     * @return Boolean
     */
    public function approveTeacherbyTeacher($teacher_id)
    {
        $user = User::where('id', $teacher_id)->first();
        $approveby =  explode(",", $user->approve);

        if (is_null($user->approve)) {
            $user->approve = Auth::user()->id;
        } else {
            if (in_array(Auth::user()->id, $approveby)) {
                return redirect()->back()->with('warning', 'You already approve this teacher');
            } else {
                $user->approve = $user->approve . "," . Auth::user()->id;
            }
        }
        $user->save();
        return redirect()->back()->with('success', 'You successfully approve this teacher');
    }

    /**
     * show view page for create teacher
     * 
     * @return \Illuminate\Http\View
     */

    public function createTeacherByAdmin()
    {
        return view('Teacher.create', ['title' => 'Create Teacher']);
    }

    /**
     * save teacher into Database
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     */

    public function storeTeacherByAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'city'       => 'required',
            'zipcode'   => 'required|numeric',
            'address'    => 'required',
        ]);

        //return $request->all();
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->zip_code = $request->zipcode;
        $user->address = $request->address;
        $user->password = Hash::make('12345678');
        $user->bio = '';
        $user->status = Auth::user()->role == 1 ? 3 : 0;
        $user->role = 2;
        $user->save();
        if (Auth::user()->role == 1) {
            return redirect('admin/teacher/all')->with('success', 'Teacher Created Successfully');
        } elseif (Auth::user()->role == 2) {
            return redirect('teacher/teacher/all')->with('success', 'Teacher Created Successfully');
        }
    }

    /**
     * delete teacher from Database
     * 
     * @param int $teacher_id
     * 
     * @return Boolean
     */
    public function deleteStudent($teacher_id)
    {
        $user = User::find($teacher_id);
        $user->delete();
        return redirect()->back()->with('success', 'Teacher Deleted Successfully:)');
    }

    /**
     * Unit list
     * 
     * @return Array of unit
     */
    public function unitList()
    {
        $units = Unit::orderBy('unit_id', 'desc')->paginate(5);
        return view('Student.units', compact('units'));
    }

    /**
     * Block student of quiz
     * 
     * @param int $subject_id
     * @param int $chapter_id
     * @param int $unit_id
     * 
     * @return Array of user list
     * 
     */
    public function blockStudentOfQuiz($subject_id, $chapter_id, $unit_id)
    {
        $blocked_students = Setting::where('subject_id', $subject_id)->where('chapter_id', $chapter_id)->where('unit_id', $unit_id)->orderBy('unit_id', 'desc')->paginate(5);
        return view('Student.block_studdent_of_quize', compact('blocked_students'));
    }

    /**
     * Unblock student fro specific quiz
     */
    public function unblockStudent($id)
    {
        $block_student = Setting::find($id);
        $block_student->status = 0;
        $block_student->save();
        return redirect()->back()->with('success', 'Student Unblock');
    }
}
