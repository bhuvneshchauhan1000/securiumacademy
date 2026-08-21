<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
class BlogCategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = BlogCategory::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));

                $query->where('name', 'like', "%{$search}%");
            })
            ->latest('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.blog-categories.index', compact('categories'));
    }
    public function create(Request $request)
    {
        return view('admin.blog-categories.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'feature_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:20480'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('feature_image')) {
            $validated['feature_image'] = $request->file('feature_image')->store('blog-categories', 'public');
        }
        BlogCategory::create($validated);

        return redirect()
            ->route('blog-categories.index')
            ->with('success', 'Blog category created successfully.');
    }
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'feature_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('feature_image')) {
            $validated['feature_image'] = $request
                ->file('feature_image')
                ->store('blog-categories', 'public');
        }

        $blogCategory->update($validated);

        return redirect()
            ->route('blog-categories.index')
            ->with('success', 'Blog category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return redirect()
            ->route('blog-categories.index')
            ->with('success', 'Blog category deleted successfully.');
    }
}
