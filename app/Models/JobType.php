<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasHashIdRouteBinding;

    //
    protected $table = 'job_types';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];
}
