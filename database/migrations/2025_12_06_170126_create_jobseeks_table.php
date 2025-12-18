<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jobseeks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description');

            $table->string('location');
            $table->enum('job_type', ['full-time', 'part-time', 'internship']);
            $table->enum('work_system', ['WFO', 'WFH', 'Hybrid']);

            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();

            $table->string('experience_level')->nullable();
            $table->string('education_level')->nullable();

            $table->integer('quota')->default(1);

            $table->enum('status', ['open', 'closed', 'expired'])->default('open');
            $table->date('deadline')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobseeks');
    }
};
