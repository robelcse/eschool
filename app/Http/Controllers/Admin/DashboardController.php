<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * show admin dashboard
     * 
     * @return \Illuminate\View\view
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
