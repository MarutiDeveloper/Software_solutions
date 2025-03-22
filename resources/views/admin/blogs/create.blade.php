
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Create Blog</h2>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary">Back</a>
    </div>
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" class="form-control" required>
        <label>Content:</label>
        <textarea name="content" class="form-control" required></textarea>
        <label>Author:</label>
        <input type="text" name="author" class="form-control" required>
        <label>Category:</label>
        <input type="text" name="category" class="form-control" required>
        <label>Image:</label>
        <input type="file" name="image" class="form-control">
        <label>Published Date:</label>
        <input type="date" name="published_date" class="form-control" required>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection

