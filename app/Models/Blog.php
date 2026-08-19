<?php

namespace App\Models;

use App\Support\HasHashIdRouteBinding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use App\Models\User;

class Blog extends Model
{
    use HasHashIdRouteBinding;
    //
    protected $table = "blogs";
    protected $fillable = [
        "title",
        "slug",
        "short_description",
        "content",
        "feature_image",
        "tags",
        "guide",
        "press_release",
        "meta_title",
        "meta_description",
        "meta_script",
        "status",
        "published_at",
        "user_id",
        "blog_categories_id"
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'guide' => 'boolean',
        'press_release' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = static::generateUniqueSlug($blog->title);
        });

        static::updating(function ($blog) {
            if ($blog->isDirty("title")) {
                $blog->slug = static::generateUniqueSlug($blog->title, $blog->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_categories_id');
    }
}
