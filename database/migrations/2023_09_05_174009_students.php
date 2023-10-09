<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('Students', function (Blueprint $table) {
            $table->string('StudentId')->primary();
            $table->string('UserType');
            $table->string('Name');
            $table->string('Program');
            $table->bigInteger('Mobile');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->integer('OTP');
            $table->string('Resume_Path');
            $table->rememberToken();
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
