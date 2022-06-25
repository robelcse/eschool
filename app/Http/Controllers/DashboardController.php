<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * show admin dashboard
     */
    public function index()
    {
        return view('adminStaffs.dashboard');
    }

    public function myProfile()
    {

        return view('AdminStaffs.profile');
    }


    /**
     * profile update
     * 
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
}
