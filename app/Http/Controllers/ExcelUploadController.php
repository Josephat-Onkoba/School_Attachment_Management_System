<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;

class ExcelUploadController extends Controller
{
    //
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls',
        ]);

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

        return redirect()->back()->with('success', 'File uploaded and table created successfully!');
    }
}
