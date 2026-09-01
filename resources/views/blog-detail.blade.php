@extends('layouts.site')

@section('content')

    @php
        $blog = \App\Models\Blog::with('blogCategory')
            ->where('slug', $slug)
            ->where('status', 'Published')
            ->first();
    @endphp

    <style>
        .blog-detail-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            display: block;
        }

        .blog-content {
            line-height: 1.7;
            font-size: 1.05rem;
            color: #333;
        }

        .blog-content p {
            line-height: 1.7;
            font-size: 1.05rem;
            margin-bottom: 20px;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .blog-content h2,
        .blog-content h3,
        .blog-content h4 {
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .blog-meta {
            margin-bottom: 30px;
        }

        .blog-title {
            font-weight: 700;
            line-height: 1.3;
        }

        .blog-not-found {
            padding: 80px 20px;
            text-align: center;
        }
    </style>
    <div class="container py-5">
        {{-- Check if blog exists --}}
        @if ($blog)

            <div class="row">

                <div class="col-md-8 offset-md-2">

                    {{-- Blog Title --}}
                    <h1 class="text-center mb-3 blog-title">
                        {{ $blog->title }}
                    </h1>


                    {{-- Category & Date --}}
                    <p class="text-center text-muted blog-meta">

                        <span class="badge bg-secondary">
                            {{ $blog->blogCategory->name ?? '---' }}
                        </span>

                        &nbsp;

                        {{ $blog->created_at->format('M d, Y') }}

                    </p>


                    {{-- Featured Image --}}
                    @if (!empty($blog->feature_image))

                        <img src="{{ Storage::url($blog->feature_image) }}" alt="{{ $blog->title }}"
                            class="blog-detail-image img-fluid mb-4" loading="lazy">

                    @else

                        <img src="{{ asset('images/page-header-bg.jpg') }}" alt="{{ $blog->title }}"
                            class="blog-detail-image img-fluid mb-4" loading="lazy">

                    @endif


                    {{-- Blog Content --}}
                    <div class="blog-content">

                        {!! $blog->content !!}

                    </div>

                </div>

            </div>

        @else

            {{-- Blog Not Found --}}
            <div class="blog-not-found">

                <h2>Blog Not Found</h2>

                <p class="text-muted">
                    The blog you are looking for does not exist or is no longer available.
                </p>

                <a href="{{ url('/blogs') }}" class="btn btn-primary">
                    Back to Blogs
                </a>

            </div>

        @endif

    </div>

@endsection