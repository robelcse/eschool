<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index(Request $request, User $user)
    {
        $user = User::where('id', $request->user()->id)->first();
        return view('Profile.index', ['user' => $user]);
    }

    public function myProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.my-profile', ['user' => $user]);
    }

    public function store(Request $request, User $user)
    {

        $data = $request->only(['first_name', 'last_name', 'address', 'city', 'zip_code', 'role', 'bio']);

        User::where('id', $request->user()->id)
            ->update($data);

        session()->flash('toast', 'success');
        return redirect()->back();
    }

    public function updateProfile(Request $request, User $user)
    {

        //validation user profile before update
        $request->validate(
            [
                'first_name' => 'required|max:20',
                'last_name' => 'required|max:15',
                'email' => 'required|email|unique:users,email,' . $request->user()->id . ',id',
                'address' => 'required|max:30',
                'city' => 'required|max:20',
                'zip_code' => 'required|integer|min:2',
                'bio' => 'required|max:240',
                'image' => 'image|mimes:jpeg,jpg,bmp,png|max:10240',
            ],

        );

        $user = User::findOrfail($request->user()->id);
        $image = $request->file('image');
        $slug = Str::slug($request->first_name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('files/students')) {
                mkdir('files/students', 0777, true);
            }

            if ($user->image != NULL) {

                unlink('files/students/' . $user->image);
            }

            $image->move('files/students', $imagename);
        } else {
            $imagename = $user->image;
        }


        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        $user->bio = $request->bio;
        $user->image = $imagename;
        $user->save();

        session()->flash('toast', 'Profile Successfully Updated');
        return redirect()->back();
    }
}//end class
