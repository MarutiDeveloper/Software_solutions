@extends('admin.layouts.app')

@section('content')
    <h1>Edit Hero Section Slide</h1>
    
    <form action="{{ route('admin.hero.update', $heroSection->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $heroSection->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $heroSection->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/'.$heroSection->image) }}" width="100">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
@endsection
