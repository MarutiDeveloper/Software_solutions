@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>About Section</h1>
        @if ($about)
            <h3>{{ $about->title }}</h3>
            <p>{{ $about->description }}</p>
            @if ($about->image)
                <img src="{{ asset($about->image) }}" width="200">
            @endif
            <br>
            <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-primary">Edit</a>
        @else
            <a href="{{ route('admin.about.create') }}" class="btn btn-success">Create About Section</a>
        @endif
    </div>
@endsection
