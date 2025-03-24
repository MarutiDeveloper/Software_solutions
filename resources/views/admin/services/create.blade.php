@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Service</h1>
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>

            <label>Description:</label>
            <textarea name="description" class="form-control" required></textarea>

            <label>Icon (Bootstrap icon class):</label>
            <input type="text" name="icon" class="form-control" required>

            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
@endsection
