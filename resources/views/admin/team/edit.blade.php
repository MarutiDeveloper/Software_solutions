@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Team Member</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ $teamMember->name }}" required>
        </div>

        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" value="{{ $teamMember->position }}" required>
        </div>

        <div class="form-group">
            <label>Current Profile Image</label><br>
            @if($teamMember->image)
                <img src="{{ asset('storage/' . $teamMember->image) }}" width="100">
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        <div class="form-group">
            <label>Change Profile Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Member</button>
    </form>
</div>
@endsection
