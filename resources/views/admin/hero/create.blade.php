@extends('admin.layouts.app')

@section('content')
    <h1>Add Hero Section Slide</h1>
    
    <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
