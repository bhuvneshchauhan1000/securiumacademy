<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasHashIdRouteBinding;

class Academy extends Model
{
    use HasHashIdRouteBinding;
    //
    protected $table = "academies";
    protected $fillable = [
        "name",
        "slug",
        "logo",
        "country",
        "description",
        "website_url",
        "status",
    ];
}
