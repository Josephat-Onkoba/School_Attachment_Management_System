<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   //
   public function login()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnUserType();
        }
        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            return $this->redirectBasedOnUserType();
        }

        return redirect()->back()->with('error', 'Please enter correct email and password.');
    }

    private function redirectBasedOnUserType()
    {
        $user = Auth::user();

        if ($user->user_type == 1) {
            return redirect()->route('hod.dashboard');
        } elseif ($user->user_type == 2) {
            return redirect()->route('staff.dashboard');
        } elseif ($user->user_type == 3) {
            return redirect()->route('student.dashboard');
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/auth/login'));
    }
}
