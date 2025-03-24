@extends('admin.layouts.app')

@section('content')
    <h1>Manage Hero Section</h1>
    <a href="{{ route('admin.hero.create') }}" class="btn btn-primary">Add New Slide</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($heroSections as $hero)
                <tr>
                    <td>{{ $hero->title }}</td>
                    <td>{{ $hero->description }}</td>
                    <td><img src="{{ asset('storage/'.$hero->image) }}" width="100"></td>
                    <td>
                        <a href="{{ route('admin.hero.edit', $hero->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.hero.destroy', $hero->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
