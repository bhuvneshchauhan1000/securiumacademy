<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function job_posts(): HasMany
    {
        return $this->hasMany(JobPost::class, 'job_category_id');
    }
}
