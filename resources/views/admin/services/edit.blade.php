@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Service</h1>
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
            @csrf
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>

            <label>Description:</label>
            <textarea name="description" class="form-control" required>{{ $service->description }}</textarea>

            <label>Icon (Bootstrap icon class):</label>
            <input type="text" name="icon" class="form-control" value="{{ $service->icon }}" required>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection
