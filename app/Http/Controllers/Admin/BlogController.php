<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Services\BlogService;

class BlogController extends Controller
{
    protected BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function index(Request $request)
    {
        $this->authorize("viewAny", Blog::class);
        $blogs = Blog::with(['user', 'blogCategory'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));

                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();
        return view("admin.blogs.index", compact("blogs"));
    }
    public function create()
    {
        $this->authorize("create", Blog::class);
        $categories = BlogCategory::where('status', 'published')
            ->orderBy('name')
            ->get();

        return view('admin.blogs.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->authorize('create', Blog::class);

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
            ],

            'content' => [
                'required',
                'string',
            ],

            'blog_categories_id' => [
                'required',
                'exists:blog_categories,id',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],

            'feature_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:20480',
            ],

            'tags' => [
                'nullable',
                'string',
            ],

            'guide' => [
                'nullable',
                'boolean',
            ],

            'press_release' => [
                'nullable',
                'boolean',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
            ],

            'meta_script' => [
                'nullable',
                'string',
            ],

        ]);

        $this->blogService->create($validated, $request->file('feature_image'));

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                __('Blog post created successfully.')
            );
    }
    public function edit(Blog $blog)
    {
        $this->authorize('edit', Blog::class);
        $categories = BlogCategory::where('status', 'published')
            ->orderBy('name')
            ->get();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update blog post.
     */
    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
            ],

            'content' => [
                'required',
                'string',
            ],

            'blog_categories_id' => [
                'required',
                'exists:blog_categories,id',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],

            'feature_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'tags' => [
                'nullable',
                'string',
            ],

            'guide' => [
                'nullable',
                'boolean',
            ],

            'press_release' => [
                'nullable',
                'boolean',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
            ],

            'meta_script' => [
                'nullable',
                'string',
            ],

        ]);

        $this->blogService->update(
            $blog,
            $validated,
            $request->file('feature_image')
        );

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                __('Blog post updated successfully.')
            );
    }

    /**
     * Delete blog post.
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);

        $this->blogService->delete($blog);

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                __('Blog post deleted successfully.')
            );
    }

}
