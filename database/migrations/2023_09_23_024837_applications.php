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
        Schema::create('Applications', function (Blueprint $table) {
            $table->integer('ApplicationId')->primary();
            $table->string('StudentId');
            $table->string('JobId');
            $table->date('ApplicationDate');
            $table->string('Status');
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
