@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Employee</h2>
    <form action="{{ route('admin.employee.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone:</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Position:</label>
            <input type="text" class="form-control" name="position" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status:</label>
            <select class="form-control" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save Employee</button>
    </form>
</div>
@endsection
