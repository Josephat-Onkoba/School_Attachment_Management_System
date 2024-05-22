<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()->user_type == 1)
        {
            return view('HOD.dashboard.dashboard');
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('staff.dashboard.dashboard');
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.dashboard.dashboard');
        }
    }
}
