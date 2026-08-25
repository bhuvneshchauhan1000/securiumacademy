<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasHashIdRouteBinding;

class Testimonial extends Model
{
    use HasHashIdRouteBinding;
    protected $fillable = [
        'name',
        'designation',
        'company',
        'image',
        'rating',
        'content',
        'status',
        'sort_order',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->orderBy('sort_order');
    }
}
