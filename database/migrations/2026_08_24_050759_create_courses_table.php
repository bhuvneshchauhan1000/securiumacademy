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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description', 500)->nullable();
            $table->longText('content')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('duration')->nullable();
            $table->decimal('fee', 10, 2)->nullable();
            $table->decimal('discount_fee', 10, 2)->nullable();
            $table->enum('course_level', ['beginner', 'intermediate', 'advanced', 'expert'])->default('beginner');
            $table->string('certification')->nullable();
            $table->string('certificate_image')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('meta_script')->nullable();
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->boolean('is_featured')->default(false);
            $table->foreignId('university_id')->nullable()->constrained('universities')->nullOnDelete();
            $table->foreignId('academy_id')->nullable()->constrained('academies')->nullOnDelete();
            $table->foreignId('course_category_id')->constrained('course_categories')->cascadeOnDelete();
            $table->timestamps();
            $table->index('name', 'courses_name_index');
            $table->index(['university_id', 'academy_id'], 'course_source_index');
            $table->index(['course_category_id', 'status'], 'courses_category_status_index');
            $table->index(['course_level', 'status'], 'courses_level_status_index');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
