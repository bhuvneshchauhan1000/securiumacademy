<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function job_posts(): HasMany
    {
        return $this->hasMany(JobPost::class, 'job_type_id');
    }
}
