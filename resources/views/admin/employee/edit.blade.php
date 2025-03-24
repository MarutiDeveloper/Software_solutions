@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Employee</h2>
    <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $employee->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone:</label>
            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Position:</label>
            <input type="text" class="form-control" name="position" value="{{ $employee->position }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status:</label>
            <select class="form-control" name="status">
                <option value="1" {{ $employee->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$employee->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
@endsection
