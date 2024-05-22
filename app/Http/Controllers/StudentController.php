<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //

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
                // Redirect to a page where they can set their password
                return redirect()->route('setPasswordForm')->with('success', 'Student information verified, set your password.');
            } else {
                // Information does not exist
                return redirect()->back()->with('error', 'Student information not found.');
            }
        } else {
            // Invalid activation code
            return redirect()->back()->with('error', 'Invalid activation code.');
        }
    }

    public function showSetPasswordForm()
    {
        return view('auth.setpassword');
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Implement the logic to set the password for the student

        return redirect()->route('login')->with('success', 'Password set successfully, you can now login.');
    }
}
