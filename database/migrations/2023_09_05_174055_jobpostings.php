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
         Schema::create('JobPostings', function (Blueprint $table) { 
            $table->string('JobId')->primary();
            $table->string('CompanyId');
            $table->string('Position');
            $table->string('Field');
            $table->string('Description');
            $table->integer('Salary');
            $table->string('Requirement');
            $table->string('ApplicationDeadline');
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
