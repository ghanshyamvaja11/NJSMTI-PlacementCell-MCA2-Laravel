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
        Schema::create('Placements', function (Blueprint $table) {
            $table->string('PlacementId');
            $table->string('StudentId');
            $table->string('JobId');
            $table->date('DatePlaced');
            $table->integer('SalaryOffered');
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
