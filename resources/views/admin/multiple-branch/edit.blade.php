@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Branch</h2>
        <a href="{{ route('admin.branches.index') }}" class="btn btn-primary">Back</a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('POST') <!-- No need to use AJAX, so using POST -->

        <div class="mb-3">
            <label>Branch Name</label>
            <input type="text" name="branch_name" class="form-control" value="{{ $branch->branch_name }}" required>
        </div>
        <div class="mb-3">
            <label>Branch Code</label>
            <input type="text" name="branch_code" class="form-control" value="{{ $branch->branch_code }}" required>
        </div>
        <div class="mb-3">
            <label>Manager Name</label>
            <input type="text" name="manager_name" class="form-control" value="{{ $branch->manager_name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="branch_email" class="form-control" value="{{ $branch->branch_email }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Active" {{ $branch->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $branch->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Branch</button>
        <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
