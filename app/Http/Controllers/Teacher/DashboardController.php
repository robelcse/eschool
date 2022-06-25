<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * show teacher dashboard
     * 
     * @return \Illuminate\View\view
     */
    public function dashboard()
    {
        return view('Teacher.dashboard');
    }

    /**
     * teacher prifile
     * 
     */
    public function myProfile()
    {
        return view('Teacher.profile');
    }

    /**
     * update teacher profile
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:4', 'max:255'],
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id . ',id',
            'phone' => 'required|max:255|unique:users,phone,' . Auth::user()->id . ',id',
            'bio' => ['required', 'string', 'min:5', 'max:255'],
            'address' => ['required', 'string', 'min:5', 'max:255'],
            'city' => ['required', 'string', 'min:5', 'max:255'],
            'zip_code' => ['required', 'numeric']
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    /**
     * 
     * show view page to change student password
     */
    public function changePassword()
    {
        return view('Teacher.change-password');
    }

    /**
     * update student password
     * 
     */
    public function UpdatePassword(Request $request)
    {

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                //Toastr::success('Password Successfully Changed','Success');
                Session::flash('error', 'Password Successfully Changed!');
                Auth::logout();
                return redirect()->back();
            } else {
                //Toastr::error('New password cannot be the same as old password.','Error');
                Session::flash('error', 'New password cannot be the same as old password!');
                return redirect()->back();
            }
        } else {
            //Toastr::error('Current password not match.','Error');
            Session::flash('error', 'Current password not match!');
            return redirect()->back();
        }
    }
}
