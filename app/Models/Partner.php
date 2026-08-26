<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasHashIdRouteBinding;

class Partner extends Model
{
    use HasHashIdRouteBinding;
    //
    protected $table = "partners";
    protected $fillable = [
        "name",
        "slug",
        "logo",
    ];
}
