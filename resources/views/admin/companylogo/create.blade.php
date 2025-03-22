@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Company Logo</h1>

    <div class="card p-4">
        <form action="{{ route('admin.companylogos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control w-50" placeholder="Enter Company Name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Logo:</label>
                <input type="file" name="logo" class="form-control w-50" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save
            </button>
        </form>
    </div>
</div>
@endsection
