<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Support\HasHashIdRouteBinding;
use App\Models\Blog;

class BlogCategory extends Model
{
    use HasHashIdRouteBinding;
    protected $table = 'blog_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'feature_image',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = static::generateUniqueSlug($category->name);
        });

        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = static::generateUniqueSlug(
                    $category->name,
                    $category->id
                );
            }
        });
    }

    protected static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}