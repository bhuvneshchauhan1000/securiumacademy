<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPost extends Model
{
    use HasHashIdRouteBinding;

    protected $table = 'job_posts';

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',

        'job_type_id',
        'job_category_id',

        'status',
        'is_featured',
        'is_urgent',
        'is_remote',
        'work_mode',

        'experience_level',
        'min_experience',
        'max_experience',
        'education_level',

        'salary_min',
        'salary_max',
        'salary_currency',
        'salary_period',
        'hide_salary',
        'salary_description',

        'country',
        'state',
        'city',
        'address',
        'postal_code',
        'latitude',
        'longitude',

        'company_name',
        'company_email',
        'company_phone',
        'company_website',
        'company_logo',

        'application_method',
        'application_url',
        'application_email',
        'application_limit',
        'application_count',
        'allow_applications',

        'published_at',
        'application_start_at',
        'application_deadline',
        'expires_at',

        'requirements',
        'responsibilities',
        'qualifications',
        'preferred_qualifications',
        'benefits',

        'department',
        'job_code',
        'reference_number',
        'vacancies',

        'shift',
        'working_hours',

        'industry',
        'career_level',

        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_script',

        'views_count',
        'shares_count',
        'bookmarks_count',

        'is_verified',
        'is_approved',
        'approved_by',
        'approved_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_urgent' => 'boolean',
        'is_remote' => 'boolean',
        'hide_salary' => 'boolean',
        'allow_applications' => 'boolean',
        'is_verified' => 'boolean',
        'is_approved' => 'boolean',

        'min_experience' => 'integer',
        'max_experience' => 'integer',
        'application_limit' => 'integer',
        'application_count' => 'integer',
        'vacancies' => 'integer',

        'views_count' => 'integer',
        'shares_count' => 'integer',
        'bookmarks_count' => 'integer',

        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',

        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',

        'published_at' => 'datetime',
        'application_start_at' => 'datetime',
        'application_deadline' => 'datetime',
        'expires_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function jobType(): BelongsTo
    {
        return $this->belongsTo(JobType::class);
    }

    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
