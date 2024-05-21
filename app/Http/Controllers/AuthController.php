<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;

class AuthController extends Controller
{
    //
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        // Check if the file is an Excel file
        if ($request->hasFile('excel') && $request->file('excel')->isValid() && in_array($request->file('excel')->extension(), ['xlsx', 'xls'])) {
            $file = $request->file('excel');
            $data = Excel::toArray(new \stdClass(), $file)[0];

            // Define the table name with a prefix
            $tableName = 'attachment_batches_' . Str::random(10);

            // Create the table
            Schema::create($tableName, function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('admission_number');
                $table->string('email');
                $table->timestamps();
            });

            // Insert data into the new table
            foreach ($data as $row) {
                DB::table($tableName)->insert([
                    'first_name' => $row[0] ?? null,
                    'last_name' => $row[1] ?? null,
                    'admission_number' => $row[2] ?? null,
                    'email' => $row[3] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Generate an activation code
            $activationCode = Str::random(10);

            // Store the activation code and table name in the activation_codes table
            DB::table('activation_codes')->insert([
                'table_name' => $tableName,
                'activation_code' => $activationCode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'File uploaded, table created, and activation code generated: ' . $activationCode);
        } else {
            // If the file is not an Excel file, redirect back with an error message
            return redirect()->back()->with('error', 'The uploaded file is not a valid Excel document. Please upload a .xlsx or .xls file.');
        }
    }
}
