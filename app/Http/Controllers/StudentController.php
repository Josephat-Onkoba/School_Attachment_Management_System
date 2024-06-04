<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SetPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StudentController extends Controller
{
    public function activateform()
    {
        return view('auth.activate');
    }

    public function activate(Request $request)
    {
        $request->validate([
            'admission_number' => 'required|string',
            'email' => 'required|email',
            'activation_code' => 'required|string',
        ]);

        $admissionNumber = $request->input('admission_number');
        $email = $request->input('email');
        $activationCode = $request->input('activation_code');

        // Retrieve the table name associated with the activation code
        $record = DB::table('activation_codes')->where('activation_code', $activationCode)->first();

        if ($record) {
            $tableName = $record->table_name;

            // Check if the student's information exists in the table
            $student = DB::table($tableName)
                ->where('email', $email)
                ->where('admission_number', $admissionNumber)
                ->first();

            if ($student) {
                $token = Str::random(60);
                DB::table('password_reset_tokens')->insert([
                    'email' => $email,
                    'token' => $token,
                    'created_at' => now(),
                ]);

                Mail::to($email)->send(new SetPasswordMail($token));

                // Redirect to a page where they can set their password
                return redirect()->route('check_email')->with('success', 'Student information verified. Check your email to set your password.');
            } else {
                // Information does not exist
                return redirect()->back()->with('error', 'Student information not found.');
            }
        } else {
            // Invalid activation code
            return redirect()->back()->with('error', 'Invalid activation code.');
        }
    }

    public function checkemail()
    {
        return view('emails.emailverify');
    }

    public function showSetPasswordForm(Request $request)
    {
        $token = $request->query('token');
        return view('auth.setpassword', ['token' => $token]);
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $token = $request->input('token');
        $password = $request->input('password');

        $record = DB::table('password_reset_tokens')->where('token', $token)->first();

        if ($record) {
            $email = $record->email;

            // Update the user's password in the users table
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->password = Hash::make($password);
                $user->save();
            } else {
                // Create a new user if not found
                $user = User::create([
                    'email' => $email,
                    'password' => Hash::make($password),
                    'user_type' => 3, // Default user type
                ]);
            }

            // Delete the token as it's no longer needed
            DB::table('password_reset_tokens')->where('token', $token)->delete();

            return redirect()->route('login')->with('success', 'Password set successfully, you can now login.');
        } else {
            return redirect()->route('password.set')->with('error', 'Invalid or expired token.');
        }
    }
}
