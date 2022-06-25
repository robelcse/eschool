<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AdminStaffsController extends Controller
{
    public function index(Request $request, User $user){
        return view('AdminStaffs.create');
    }
}
