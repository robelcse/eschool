<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    /**
     * sent notification to student if he fail
     * 
     */
    public function showNotification()
    {
        $notifications = Notification::where('notify_to', Auth::user()->id)->get();
        return view('notification.index', compact('notifications'));
    }
}
