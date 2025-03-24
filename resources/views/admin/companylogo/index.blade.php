@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Manage Company Logos</h1>
        <a href="{{ route('admin.companylogos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Logo
        </a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logos as $logo)
                <tr>
                    <td>{{ $logo->id }}</td>
                    <td>{{ trim($logo->name) }}</td> <!-- Trimming whitespace -->
                    <td>
                        <img src="{{ asset('storage/' . $logo->logo) }}" width="100" class="img-thumbnail">
                    </td>
                    <td>
                        <a href="{{ route('admin.companylogos.edit', $logo->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.companylogos.destroy', $logo->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
