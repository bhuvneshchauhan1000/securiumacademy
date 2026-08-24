<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasHashIdRouteBinding;

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

}
