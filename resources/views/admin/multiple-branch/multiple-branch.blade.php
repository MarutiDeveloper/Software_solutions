@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Multiple Branches</h2>

    <!-- Button to Open Add New Branch Modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBranchModal">
        Add New Branch
    </button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Branch Name</th>
                <th>Branch Code</th>
                <th>Manager Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $key => $branch)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $branch->branch_name }}</td>
                <td>{{ $branch->branch_code }}</td>
                <td>{{ $branch->manager_name }}</td>
                <td>{{ $branch->branch_email }}</td>
                <td>
                    <span class="badge bg-{{ $branch->status == 'Active' ? 'success' : 'danger' }}">
                        {{ $branch->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <form action="{{ route('admin.branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this branch?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<<!-- Add Branch Modal -->
<div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.branches.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Branch Name</label>
                        <input type="text" class="form-control" name="branch_name" required>
                    </div>
                    <div class="mb-3">
                        <label>Branch Code</label>
                        <input type="text" class="form-control" name="branch_code" required>
                    </div>
                    <div class="mb-3">
                        <label>Manager Name</label>
                        <input type="text" class="form-control" name="manager_name" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="branch_email" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Save Branch</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
