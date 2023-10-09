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
        Schema::create('Administrator', function (Blueprint $table) {
            $table->string('AdminId')->primary();
            $table->string('UserType');
            $table->string('Email')->unique();
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
