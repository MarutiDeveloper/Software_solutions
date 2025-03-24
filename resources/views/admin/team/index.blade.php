@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Manage Team</h2>
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">Add New Member</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teamMembers as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->position }}</td>
                <td>
                    @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.team.edit', $member->id) }}" class="text-warning me-2">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-danger border-0 bg-transparent" onclick="return confirm('Are you sure?')">
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
