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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('fullname');
            $table->string('nim')->nullable();
            $table->string('program_study')->nullable(); // prodi
            $table->string('faculty')->nullable();
            $table->year('graduation_year')->nullable();

            // informasi kontak
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('portfolio_url')->nullable();

            // dokumen
            $table->string('cv_path')->nullable();
            $table->string('profile_photo')->nullable();

            $table->text('bio')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
