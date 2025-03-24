@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit About Section</h1>
        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $about->title }}" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required>{{ $about->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                @if ($about->image)
                    <img src="{{ asset($about->image) }}" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
