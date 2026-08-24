<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasHashIdRouteBinding;

    //
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'content',
        'featured_image',
        'duration',
        'fee',
        'discount_fee',
        'course_level',
        'certification',
        'certificate_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_script',
        'status',
        'is_featured',
        'academy_id',
        'university_id',
        'course_category_id',
    ];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
