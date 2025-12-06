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
        Schema::create('matching_jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('alumni_id')->constrained('alumni')->onDelete('cascade');
            $table->foreignId('jobseek_id')->constrained('jobseeks')->onDelete('cascade');

            $table->integer('score')->default(0); 
            // contoh: nilai kecocokan berdasarkan jurusan, skills, lokasi, dll

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matching_jobs');
    }
};
