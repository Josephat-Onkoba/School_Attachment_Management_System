<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('users')->insert([
            [
                'name' => 'HOD User',
                'email' => 'hod@example.com',
                'password' => Hash::make('password'),
                'user_type' => \App\Models\User::TYPE_HOD,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => Hash::make('password'),
                'user_type' => \App\Models\User::TYPE_STAFF,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student User',
                'email' => 'student@example.com',
                'password' => Hash::make('password'),
                'user_type' => \App\Models\User::TYPE_STUDENT,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
