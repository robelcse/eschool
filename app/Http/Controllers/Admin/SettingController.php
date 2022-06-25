<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    /**
     * show view page to change admin password
     */
    public function changePassword()
    {
        return view('AdminStaffs.change-password');
    }

    /**
     * update admin password
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
}//end class
