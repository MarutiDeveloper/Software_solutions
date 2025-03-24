@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Manage Services</h1>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New Service</a>
        </div>

        <table class="table table-bordered mt-3">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td><i class="{{ $service->icon }}"></i></td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="text-warning me-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('admin.services.delete', $service->id) }}" class="text-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
