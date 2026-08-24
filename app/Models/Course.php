<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseCategory;
use App\Support\HasHashIdRouteBinding;
class Course extends Model
{
    use HasHashIdRouteBinding;
    //
    protected $fillable = [
        "name",
        "slug",
        "short_description",
        "content",
        "featured_image",
        "duration",
        "fee",
        "discount_fee",
        "course_level",
        "certification",
        "certificate_image",
        "meta_title",
        "meta_description",
        "meta_keywords",
        "meta_script",
        "status",
        "is_featured",
        "course_category_id",
    ];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }
}
