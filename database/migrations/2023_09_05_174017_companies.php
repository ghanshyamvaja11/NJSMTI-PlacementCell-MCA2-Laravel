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
        Schema::create('Companies', function (Blueprint $table) {
            $table->string('CompanyId')->primary();
            $table->string('UserType');
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('Industry');
            $table->string('Location');
            $table->string('Password');
            $table->integer('OTP');
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
