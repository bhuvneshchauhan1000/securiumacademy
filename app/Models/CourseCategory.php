<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasHashIdRouteBinding;
use App\Models\Course;

class CourseCategory extends Model
{
    use HasHashIdRouteBinding;
    
    protected $table = "course_categories";

    protected $fillable = [
        "name",
        "slug",
        "description",
        "logo",
        "status"
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public static function active()
    {
        return static::where('status', 'active')->get();
    }


}
