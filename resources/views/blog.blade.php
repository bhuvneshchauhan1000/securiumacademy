@extends('layouts.site')

@section('content')

    @php
        $blogs = \App\Models\Blog::with('blogCategory')
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();
    @endphp

    <style>
        .blog-section {
            padding: 50px 0;
        }

        .blog-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
            height: 100%;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .blog-card-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: #f8f8f8;
        }

        .blog-card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .blog-card-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.4;
            color: #222;
        }

        .blog-card-text {
            color: #555;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .blog-card-img-wrap {
            position: relative;
        }

        .blog-card-category {
            position: absolute;
            top: 5px;
            right: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            background: rgba(13, 110, 253, 0.9);
            color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .blog-card-action {
            margin-top: auto;
            padding-top: 8px;
        }

        .read-more-btn {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-top: 16px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .read-more-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .blog-card-footer {
            background: #fff;
            border-top: none;
            padding: 15px 20px;
            color: #777;
            font-size: 0.85rem;
        }

        .blog-card-wrapper {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .blog-card-wrapper:hover {
            text-decoration: none;
            color: inherit;
        }

        .no-blogs {
            padding: 50px 0;
            color: #777;
        }

        @media (max-width: 767px) {
            .blog-section {
                padding: 30px 0;
            }

            .blog-card-img {
                height: 180px;
            }

            .blog-card-title {
                font-size: 1rem;
            }

            .blog-card-text {
                font-size: 0.9rem;
            }
        }
    </style>
    <div class="container blog-section">
        <h2 class="text-center mb-5">
            📝 Latest Blogs
        </h2>

        <div class="row g-4">

            @forelse ($blogs as $blog)

                <div class="col-md-6 col-lg-4 d-flex">

                    <a href="{{ url('blog/' . $blog->slug) }}" class="blog-card-wrapper w-100">

                        <div class="blog-card">

                            {{-- Blog Image --}}
                            <div class="blog-card-img-wrap">
                                @if (!empty($blog->feature_image))

                                    <img src="{{ Storage::url($blog->feature_image) }}" class="blog-card-img"
                                        alt="{{ $blog->title }}" loading="lazy">

                                @else

                                    <img src="{{ asset('images/page-header-bg.jpg') }}" class="blog-card-img" alt="{{ $blog->title }}"
                                        loading="lazy">

                                @endif

                                {{-- Category --}}
                                @if ($blog->blogCategory)

                                    <span class="badge blog-card-category">{{ $blog->blogCategory->name }}</span>

                                @else

                                    <span class="badge blog-card-category">General</span>

                                @endif
                            </div>


                            {{-- Blog Content --}}
                            <div class="blog-card-body">

                                {{-- Blog Title --}}
                                <h5 class="blog-card-title">
                                    {{ $blog->title }}
                                </h5>


                                {{-- Short Description --}}
                                <p class="blog-card-text">
                                    {{ \Illuminate\Support\Str::limit($blog->short_description, 100) }}
                                </p>


                                {{-- Read More --}}
                                <div class="blog-card-action">
                                    <span class="read-more-btn">
                                        Read More
                                    </span>
                                </div>

                            </div>


                            {{-- Blog Date --}}
                            <div class="blog-card-footer">
                                {{ $blog->created_at->format('M d, Y') }}
                            </div>

                        </div>

                    </a>

                </div>

            @empty

                {{-- No Blogs --}}
                <div class="col-12 text-center no-blogs">

                    <p>
                        No published blogs found.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

@endsection