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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description', 500)->nullable();
            $table->longText('description');
            $table->foreignId('job_type_id')->constrained('job_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('job_category_id')->constrained('job_categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('status', ['draft', 'published', 'paused', 'closed', 'expired'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_urgent')->default(false);
            $table->boolean('is_remote')->default(false);

            $table->enum('work_mode', ['on_site', 'remote', 'hybrid'])->nullable();

            $table->string('experience_level')->nullable();

            $table->unsignedSmallInteger('min_experience')->nullable();
            $table->unsignedSmallInteger('max_experience')->nullable();
            $table->string('education_level')->nullable();

            $table->string('department')->nullable();
            $table->string('job_code')->nullable();
            $table->string('reference_number')->nullable();

            $table->unsignedInteger('vacancies')->nullable();

            $table->string('industry')->nullable();
            $table->string('career_level')->nullable();

            $table->string('shift')->nullable();
            $table->string('working_hours')->nullable();

            $table->decimal('salary_min', 15, 2)->nullable();
            $table->decimal('salary_max', 15, 2)->nullable();

            $table->string('salary_currency', 3)->nullable();

            $table->enum('salary_period', ['hourly', 'daily', 'weekly', 'monthly', 'yearly'])->nullable();

            $table->boolean('hide_salary')->default(false);
            $table->string('salary_description')->nullable();

            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_logo')->nullable();

            $table->enum('application_method', ['internal', 'external', 'email'])->default('internal');

            $table->string('application_url')->nullable();
            $table->string('application_email')->nullable();

            $table->unsignedInteger('application_limit')->nullable();
            $table->unsignedInteger('application_count')->default(0);

            $table->boolean('allow_applications')->default(true);

            $table->timestamp('published_at')->nullable();
            $table->timestamp('application_start_at')->nullable();
            $table->timestamp('application_deadline')->nullable();
            $table->timestamp('expires_at')->nullable();

            $table->text('requirements')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('preferred_qualifications')->nullable();

            $table->text('benefits')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_script')->nullable();

            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedBigInteger('shares_count')->default(0);
            $table->unsignedBigInteger('bookmarks_count')->default(0);

            $table->boolean('is_verified')->default(false);
            $table->boolean('is_approved')->default(false);

            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

            $table->index('name', 'jobs_name_index');
            $table->index('status', 'jobs_status_index');
            $table->index('work_mode', 'jobs_work_mode_index');
            $table->index('country', 'jobs_country_index');
            $table->index('state', 'jobs_state_index');
            $table->index('city', 'jobs_city_index');
            $table->index('is_featured', 'jobs_is_featured_index');
            $table->index('is_remote', 'jobs_is_remote_index');
            $table->index('published_at', 'jobs_published_at_index');
            $table->index('expires_at', 'jobs_expires_at_index');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
