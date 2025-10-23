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
        Schema::create('violation', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('severity');
            $table->string('status');
            $table->string('evidence')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('violation_type_id');
            
            $table->foreign('student_id')->references('id')->on('student')->onDelete('no action');
            $table->foreign('violation_type_id')->references('id')->on('violation_type')->onDelete('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation');
    }
};
