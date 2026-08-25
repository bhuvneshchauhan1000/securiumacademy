<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasHashIdRouteBinding;

    protected $table = 'job_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];
}
