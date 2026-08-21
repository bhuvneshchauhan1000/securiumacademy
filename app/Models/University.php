<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Support\HasHashIdRouteBinding;

class University extends Model
{
    use HasHashIdRouteBinding;
    //
    protected $table = "universities";
    protected $fillable = [
        "name",
        "slug",
        "logo",
        "country",
        "description",
        "website_url",
        "status",
        "sort_order",
    ];

}
