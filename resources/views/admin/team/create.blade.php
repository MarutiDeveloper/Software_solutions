@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Add New Team Member</h2>

    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Profile Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Member</button>
    </form>
</div>
@endsection
