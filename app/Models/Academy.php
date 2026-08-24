<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasHashIdRouteBinding;

    //
    protected $table = 'academies';

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'country',
        'description',
        'website_url',
        'status',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
