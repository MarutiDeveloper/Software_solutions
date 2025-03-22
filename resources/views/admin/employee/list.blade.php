@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Employee List</h2>
    <a href="{{ route('admin.employee.create') }}" class="btn btn-primary mb-3">Add New Employee</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.employee.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
