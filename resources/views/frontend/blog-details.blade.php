@extends('frontend.layouts.main')

@section('main-container')

<main class="main">
    <div class="container">
        <h1 class="mb-4">{{ $blog->title }}</h1>
        <img src="{{ asset('uploads/blogs/'.$blog->image) }}" class="img-fluid" alt="{{ $blog->title }}">
        <p class="mt-3 text-muted">By {{ $blog->author }} | {{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}</p>
        <p>{{ $blog->content }}</p>
    </div>
</main>

@endsection
