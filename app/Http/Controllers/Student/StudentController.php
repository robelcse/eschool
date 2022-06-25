<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * get list of student who have register
     * 
     * @return Array of student
     */
    public function studentList()
    {
        $students = User::orderBy('id', 'desc')->where('role', 3)->paginate(10);
        return view('Student.student-list', ['title' => 'Student list', 'students' => $students]);
    }

    /**
     * approve student account by admin who is pending after registration
     * 
     * @param int $student_id
     * 
     * @return Boolean
     */
    public function approveStudent($student_id)
    {
        $user = User::where('id', $student_id)->first();
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'Student Profile Activated Successfully.');
    }

    /**
     * show view page for create student
     * 
     * @return \Illuminate\Http\View 
     */
    public function createStudentByAdmin()
    {
        return view('Student.create', ['title' => 'Create student']);
    }

    /**
     * save student into Database
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     */
    public function storeStudentByAdmin(Request $request)
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
        $user->status = Auth::user()->role == 1 ? 1 : 0;
        $user->role = 3;
        $user->save();
        if (Auth::user()->role == 1) {
            return redirect('admin/student/all')->with('success', 'Student Created Successfully');
        } elseif (Auth::user()->role == 2) {
            return redirect('teacher/student/all')->with('success', 'Student Created Successfully');
        }
    }

    /**
     * delete student from Database
     * 
     * @param int $student_id
     * 
     * @return Boolean
     */
    public function deleteStudent($student_id)
    {
        $user = User::find($student_id);
        $user->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully:)');
    }
}
