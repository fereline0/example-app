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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('work_schedule_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('work_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('experience_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('detail_experience')->nullable();
            $table->foreignId('background_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('detail_background')->nullable();
            $table->decimal('salary', 9, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
