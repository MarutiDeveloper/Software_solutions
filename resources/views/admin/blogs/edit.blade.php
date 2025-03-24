@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Blog</h2>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary">Back</a>
    </div>
    
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $blog->author }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="{{ $blog->category }}" required>
        </div>

        <div class="mb-3">
            <label for="published_date" class="form-label">Published Date</label>
            <input type="date" name="published_date" class="form-control" value="{{ $blog->published_date }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" class="form-control">
            @if($blog->image)
                <img src="{{ asset('uploads/blogs/'.$blog->image) }}" width="100px" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $blog->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</div>
@endsection
