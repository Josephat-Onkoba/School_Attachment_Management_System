<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->dropPrimary('email'); // Remove the primary key from the email column if it exists
        });

        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing id column and sets it as the primary key
            $table->string('email')->change(); // Ensure the email column is a regular string column
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->dropColumn('id'); // Remove the id column
        });

        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary()->change(); // Set the email column as the primary key again
        });
    }
};
