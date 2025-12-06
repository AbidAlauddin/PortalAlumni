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
        Schema::create('jobseeks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();

            $table->string('title');
            $table->string('type'); // fulltime, parttime, magang, kontrak
            $table->string('location')->nullable();

            $table->string('salary_min')->nullable();
            $table->string('salary_max')->nullable();

            $table->text('description')->nullable();
            $table->text('requirement')->nullable();
            $table->text('responsibilities')->nullable();

            $table->string('category')->nullable(); // misal: IT, Finance, dll
            $table->string('major_preference')->nullable(); // jurusan terkait

            $table->boolean('is_active')->default(true);
            $table->date('deadline')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeks');
    }
};
