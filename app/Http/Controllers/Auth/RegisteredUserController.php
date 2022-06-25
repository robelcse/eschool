<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string','max:255', 'unique:users'],
            'role'=>'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            // 'name' => $request->name,
            'first_name'=> $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'address' => '',
            'city'	=>'',
            'zip_code' => '',
            'role' =>$request->role,
            'bio'=>'',
            'password' => Hash::make($request->password),
        ]);

        return redirect('register')->with('success', 'Registration Successful, It will take 2/3 business day to active your account. We will let you know via email after activating your account.');

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect()->route('student.dashboard');
    }
}
