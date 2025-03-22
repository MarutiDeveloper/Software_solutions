@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Testimonials</h4>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size: 16px;">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 15%;">Name</th>
                                    <th style="width: 15%;">Designation</th>
                                    <th style="width: 30%;">Message</th>
                                    <th style="width: 10%;">Image</th>
                                    <th style="width: 10%;">Rating</th>
                                    <th style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->id }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->designation }}</td>
                                        <td>{{ $testimonial->message }}</td>
                                        <td class="text-center">
                                            @if($testimonial->image)
                                                <img src="{{ asset('storage/' . $testimonial->image) }}" width="60" height="60" class="rounded" alt="Image">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $testimonial->rating }}</td>
                                        <td>
                                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($testimonials->isEmpty())
                        <p class="text-center">No testimonials found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
