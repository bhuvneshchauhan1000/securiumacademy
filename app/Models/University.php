<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasHashIdRouteBinding;

    //
    protected $table = 'universities';

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'country',
        'description',
        'website_url',
        'status',
        'sort_order',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
