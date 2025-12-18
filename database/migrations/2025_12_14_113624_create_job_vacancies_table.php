<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('jobseek_id')
                ->constrained('jobseeks')
                ->cascadeOnDelete();

            $table->foreignId('alumni_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->enum('status', [
                'applied',
                'reviewed',
                'interview',
                'accepted',
                'rejected'
            ])->default('applied');

            $table->string('cv_file')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->text('cover_letter')->nullable();

            $table->timestamp('applied_at')->useCurrent();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
