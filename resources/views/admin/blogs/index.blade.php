@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Manage Blogs</h2>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create New Blog</a>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->author }}</td>
                <td>{{ $blog->category }}</td>
                <td><img src="{{ asset('uploads/blogs/'.$blog->image) }}" width="50"></td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="text-warning me-2">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
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
