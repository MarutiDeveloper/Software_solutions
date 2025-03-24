@extends('frontend.layouts.main')

@section('main-container')

<main class="main">
    <div class="page-title accent-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Blog</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Blog</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="blog-posts" class="blog-posts section">
        <div class="container">
            <div class="row gy-4">
                @foreach($blogs as $blog)
                <div class="col-lg-4">
                    <article class="position-relative h-100">
                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ asset('uploads/blogs/'.$blog->image) }}" class="img-fluid" alt="{{ $blog->title }}">
                            <span class="post-date">{{ \Carbon\Carbon::parse($blog->published_date)->format('F d') }}</span>
                        </div>
                        <div class="post-content d-flex flex-column">
                            <h3 class="post-title">{{ $blog->title }}</h3>
                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">{{ $blog->author }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">{{ $blog->category }}</span>
                                </div>
                            </div>
                            <p>{{ Str::limit($blog->content, 150, '...') }}</p>
                            <hr>
                            <a href="{{ url('blog-details/'.$blog->id) }}" class="readmore stretched-link">
                                <span>Read More</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection
